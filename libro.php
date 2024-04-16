<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagen de WhatsApp .jpg" type="image/x-icon">
    <link rel="shortcut icon" href="Imagen de WhatsApp .jpg" type="image/x-icon">
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="./libro.css">
</head>
<body>
   
    <nav class="menu">
        <ul>
            <li><a href="./inicio.php">Inicio</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="./libro.php">Productos</a></li>
            <li><a href="#">Contactos</a></li>
        </ul>
        <section class="libros-disponibles">
        <h2>Libros</h2>
        <div class="lista-libros">
            <details>
                <summary>Matemáticas</summary>
                <ul>
                <li><a href="./libros/Matematicas10.pdf">Matemáticas 10°</a></li>
                    <li> <a href="#">Matemáticas 11°</a></li>
                    <!-- Agrega más libros si es necesario -->
                </ul>
            </details>
            <details>
                <summary>Programación</summary>
                <ul>
                    <li><a href="./libros/HTML Y CSS.pdf">HTML Y CSS</a></li>
                    <li><a href="#">JavaScript</a></li><br>
                    <li><a href="#">Diseño</a></li>
                    <li><a href="#">Base de datos</a></li>
                    <li><a href="#">Servicio de backend</a></li>
                    <!-- Agrega más libros si es necesario -->
                </ul>
            </details>
            <!-- Agrega más categorías de libros si es necesario -->
        </div>
    </section>
    <section class="libros-disponibles">
        <h2>Libros Disponibles para Descargar</h2>
        <ul>
        <li><a href="./libros/Matematicas10.pdf">Matemáticas 10°</a></li>
        <li><a href="#">Matemáticas 11°</a></li>
        <li><a href="./libros/HTML Y CSS.pdf">Programación 10°<br>(HTML Y CSS)</a></li>
        <li><a href="#">Programación 11°</a></li>
        <!-- Agrega más libros con sus respectivos enlaces -->
    </ul>
    </section>
    
    <script src="./libro.js"></script>
            </nav>
        </body>
    </html>