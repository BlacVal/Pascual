<?php 
session_start();

if(isset($_SESSION['usuario'])){
    echo '<a href="/php/logout.php"></a>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="icon" href="Logos/Logo4.jpg" type="image/x-icon"/>
    <link rel="shortcut icon" href="Logos/Logo4.jpg" type="image/x-icon">
    <title>Control de Préstamo de Biblioteca</title>
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
    
    <!-- Aquí añadimos el botón de modo -->
    <button id="mode-toggle" class="btn">Night mode</button>
</nav>
    <header>
        <div class="content">
            <center><h4>Library loan Control</h4>
            <h1>Library loan <span>Control</span></h1>
            <a>Muchas bibliotecas ofrecen servicios de préstamo de libros de manera Fisica a través de sitios en la ciudad.
                <br><br>En esta página web se puede realizar el préstamo de libros de manera virtual
                 Estos servicios permiten a los usuarios acceder gama de libros electrónicos y recursos digitales sin tener que visitar físicamente la biblioteca.
                 <br><br>Los préstamos de libros digitales en nuestra pagina suele funcionar a través de sistemas de gestión de bibliotecas en línea especializada en préstamos de libros electrónicos. Los usuarios pueden registrarse en el sitio web de la biblioteca, buscar los libros que desean leer en sus dispositivos electrónicos como lectores de libros electrónicos, tabletas, computadoras o teléfonos inteligentes.
                 <br><br>Es importante tener en cuenta que los préstamos digitales a menudo están sujetos a cierta restriccion la cual es que, Los libros no pueden ser descargados por los usuarios y la imposibilidad de prestar el mismo libro a múltiples usuarios simultáneamente. Pero tiene sus beneficios los cuales son que, no tiene límite de tiempo para leer el libro. Una vez que expira el período de préstamo el libro se desactiva automáticamente en el dispositivo del usuario, por lo que no se puede acceder a él a menos que se renueve el préstamo.</a>
        </div></center>
        <div class="image">
            <img src="/assets/imagess/header.png" alt="Header Image">
        </div>
    </header>
    <div class="container">
    <section class="team-section">
    <h2>Nuestro equipo</h2>
    <div class="team-cards">
    <div class="card">
            <img src="/assets/imagess/Samuel Brand.jpg" alt="Samuel Brand Gaviria"><br><h3>Lider</h3>
            <h3>Samuel Brand Gaviria</h3>
        </div>
        <div class="card">
            <img src="/assets/imagess/Leidy.jpg" alt="Leidy Laura Cañas Naranjo">
            <h3>Leidy Laura Cañas Naranjo</h3>
        </div>
        <div class="card">
            <img src="/assets/imagess/Alexa.jpg" alt="Alexandra Rodriguez Agudelo">
            <h3>Alexandra Rodriguez Agudelo</h3>
        </div>
        <div class="card">
            <img src="/assets/imagess/Juan pablo Montoya.jpg" alt="Juan Pablo Montoya Restrepo">
            <h3>Juan Pablo Montoya Restrepo</h3>
        </div>
        <div class="card">
            <img src="/assets/imagess/Beckham.jpg" alt="Beckham Sanchez Melendez">
            <h3>Beckham Sanchez Melendez</h3>
        </div>
    </div>
</section>
    </div>
    <center>
    <div id="custom-style-container">
    <img id="footer" class="banner-img float-center" src="/assets/imagess/I.E.Felix_de_Bedout_Moreno.png" alt="I.E. Félix de Bedout Moreno">
    <img id="footer" class="banner-img float-center" src="/assets/imagess/Pascual.png" alt="I.E. Pascual Bravo">
</div>
<p> &copy; 2024 Library loan Control. All rights reserved. </p>
    </center>
    <script src="/assets/js/Acercade.js"></script>
</body>
</html>