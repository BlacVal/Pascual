<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = 'user'; // Rol predeterminado si no está establecido
}

// Incluir el archivo de conexión a la base de datos
include './conexion_be.php'; // Asegúrate de ajustar la ruta según la estructura de tu proyecto

// Verificar y manejar las operaciones CRUD para el administrador
if ($_SESSION['role'] == 'admin' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    // Tu lógica CRUD aquí
}

// Obtener el término de búsqueda
$q = isset($_GET['q']) ? $_GET['q'] : '';

// Consulta para seleccionar registros de la tabla 'libros' basados en la búsqueda
$query = "SELECT id, titulo, Estado FROM libros WHERE titulo LIKE ? OR Estado LIKE ?";
$stmt = $conexion->prepare($query);
$searchTerm = "%$q%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
$resultados = [];

while ($row = $result->fetch_assoc()) {
    $resultados[] = $row;
}

$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link rel="stylesheet" href="/assets/css/libros.css">
</head>
<body>
<nav>
    <div class="nav-logo">
        <a href="/php/Acercade.php"><h3>Nosotros</h3></a>
    </div>
    <ul class="nav-links">
        <li class="link"><a href="/inicio.php">Home</a></li>
        <li id="link1" class="link"><a href="/php/buscar_libros.php">Books</a></li>
        <li id="link2" class="link"><a href="/php/libro.php">Loans</a></li>
        <li id="link3" class="link"><a href="#"></a></li>
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
    
    <button id="mode-toggle" class="btn">Night mode</button>
</nav>

<div class="container">
    <center><a><h3>Buscar Libros</h3></a></center>
    <form action="buscar_libros.php" method="get">
        <input type="text" name="q" placeholder="Buscar libros" value="<?php echo htmlspecialchars($q); ?>">
        <button type="submit">Buscar</button>
    </form>
    
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["titulo"]); ?></td>
                        <td>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <form action="actualizar_estado.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row["id"]); ?>">
                                    <input type="text" name="Estado" value="<?php echo htmlspecialchars($row["Estado"]); ?>">
                                    <button type="submit">Actualizar</button>
                                </form>
                            <?php else: ?>
                                <?php echo htmlspecialchars($row["Estado"]); ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="visualizador.php?id=<?php echo htmlspecialchars($row['id']); ?>">Ver PDF</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="/assets/js/libros.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('mode-toggle').addEventListener('click', function() {
            document.body.classList.toggle('night-mode');
            this.textContent = document.body.classList.contains('night-mode') ? 'Day mode' : 'Night mode';
        });
    });
</script>
<center>
    <div class="copyright">
        <div>
            <img id="footer" class="banner-img float-center" src="/assets/imagess/I.E.Felix_de_Bedout_Moreno.png" alt="I.E. Félix de Bedout Moreno">
            <img id="footer" class="banner-img float-center" src="/assets/imagess/Pascual.png" alt="I.E. Pascual Bravo">
        </div>
        <p> &copy; 2024 Library loan Control. All rights reserved. </p>
    </div>
    </center>
</body>
</html>
