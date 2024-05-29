<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagen de WhatsApp .jpg" type="image/x-icon">
    <link rel="shortcut icon" href="Imagen de WhatsApp .jpg" type="image/x-icon">
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="/assets/css/libro.css">
</head>
<body>
   
    <nav>
        <div class="nav-logo">

        </div>
        <ul class="nav-links">
        <li class="link"><a href="/inicio.php">Home</a></li>
        <li id="link1" class="link"><a href="/php/buscar_libros.php">books</a></li>
        <li id="link2" class="link"><a href="/php/libro.php">loans</a></li>
        <li id="link3" class="link"><a href="#">About</a></li>
    </ul>
    </nav>
    
    <section class="libros-disponibles">
        <h2>Libros</h2>
        <div class="lista-libros">
            <details>
                <summary>Programación</summary>
                <ul>
                    <a>HTML Y CSS</a><br>
                    <a>JavaScript</a><br>
                    <a>Diseño</a><br>
                    <a>Base de datos</a><br>
                    <a>Servicio de backend y Frontend</a>
                    <!-- Agrega más libros si es necesario -->
                </ul>
            </details>
            <!-- Agrega más categorías de libros si es necesario -->
        </div>
        <div id="libros-descargables" class="libros-disponibles">
        <h2>Libros Disponibles para Descargar</h2>
            <ul>
                <li><a href="/libros/HTML Y CSS.pdf">Programación 10°<br>(HTML Y CSS)</a></li>
                <li><a href="#">Programación 10°</a></li>
                <li><a href="/libros/JavaScript.pdf">Programación 10°<br>(JavaScript)</a></li>
                <li><a href="#">Programación 10°</a></li>
                <br><br>
                <li><a href="/libros/Logica y Diseño.pdf">Programación 11°<br>(Diseño)</a></li>
                <li><a href="#">Programación 11°</a></li>
                <li><a href="/libros/Bases-de-Datos.pdf">Programación 11°<br>(Bases de datos)</a></li>
                <li><a href="#">Programación 11°</a></li>
                <li><a href="/libros/Backend y frontend.pdf">Programación 11°<br>(Servicios de Backend y Frontend)</a></li>
                <li><a href="#">Programación 11°</a></li>
                <!-- Agrega más libros con sus respectivos enlaces -->
            </ul>
        </div>
        <button id="btn__descargas">Descargas</button>
    </section>
    
    <script src="/assets/js/libro.js"></script>
</body>
</html>
