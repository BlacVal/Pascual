<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

include './conexion_be.php'; // Asegúrate de ajustar la ruta según la estructura de tu proyecto

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conexion->prepare("SELECT titulo, pdf, mime_type FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($titulo, $pdf, $mime_type);
    $stmt->fetch();
    
    $base64_pdf = base64_encode($pdf); // Codificar PDF en base64 para enviarlo a JavaScript

    $stmt->close();
    $conexion->close();
} else {
    echo "ID de libro no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visor de PDF</title>
    <link rel="stylesheet" href="/assets/css/visualizador.css">
</head>
<body class="day-mode">
    <nav>
        <div class="nav-logo">
            <a href="/php/Acercade.php"><h1>Nosotros</h1></a>
        </div>
        <ul class="nav-links">
            <li class="link"><a href="/inicio.php">Home</a></li>
            <li id="link1" class="link"><a href="/php/buscar_libros.php">Books</a></li>
            <li id="link2" class="link"><a href="/php/libro.php">Loans</a></li>
            <li id="link3" class="link"><a href=""></a></li>
        </ul>

        <?php if(isset($_SESSION['usuario'])): ?>
            <div class="menu-item">
                <button class="btn">
                    <a href="/php/perfil.php">View Profile</a>
                </button>
                <ul class="submenu">
                    <li><button class="btn"><a href="/php/logout.php">Sign Off</a></button></li>
                </ul>
            </div>
        <?php else: ?>
            <button class="btn"><a href="./index.php">Log In</a></button>
        <?php endif; ?>

        <!-- Aquí añadimos el botón de modo -->
        <button id="mode-toggle" class="btn">Night mode</button>
    </nav>

    <div class="container">
        <center><header>
            <div class="content">
                <h1>Visor de PDF</h1>
                <p><?php echo htmlspecialchars($titulo); ?></p>
            </div>
        </header></center>
        <div id="pdf-container">
            <canvas id="pdf-render"></canvas>
            <div id="navigation-controls">
                <button id="prev-page" class="btn">Página Anterior</button>
                <button id="next-page" class="btn">Página Siguiente</button>
                <span>Página <span id="page-num"></span> de <span id="page-count"></span></span>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
    <script>
        const pdfData = atob("<?php echo $base64_pdf; ?>"); // Decodificar PDF de base64 a binario

        // Cargar el PDF
        const loadingTask = pdfjsLib.getDocument({data: pdfData});
        loadingTask.promise.then(pdf => {
            const pdfContainer = document.getElementById('pdf-render');
            const pageCount = pdf.numPages;
            document.getElementById('page-count').textContent = pageCount;

            let pageNum = 1;

            // Renderizar la página
            const renderPage = num => {
                pdf.getPage(num).then(page => {
                    const viewport = page.getViewport({ scale: 1.5 });
                    const canvas = document.getElementById('pdf-render');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext);
                });
                document.getElementById('page-num').textContent = num;
            };

            // Manejadores de eventos para navegación
            document.getElementById('prev-page').addEventListener('click', () => {
                if (pageNum <= 1) return;
                pageNum--;
                renderPage(pageNum);
            });

            document.getElementById('next-page').addEventListener('click', () => {
                if (pageNum >= pageCount) return;
                pageNum++;
                renderPage(pageNum);
            });

            renderPage(pageNum);
        });
    </script>
    <center>
    <div class="copyright">
        <div>
            <img id="fotter" class="banner-img float-center" src="/assets/imagess/I.E.Felix_de_Bedout_Moreno.png" alt="I.E. Félix de Bedout Moreno">
            <img id="fotter" class="banner-img float-center" src="/assets/imagess/Pascual.png" alt="I.E. Pascual Bravo">
        </div>
        <p> &copy; 2024 Library loan Control. All rights reserved. </p>
    </div>
    </center>
</body>
</html>
