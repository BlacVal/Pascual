<?php 
session_start();

if(isset($_SESSION['usuario'])){
    echo '<a href="/php/logout.php"></a>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="icon" href="/assets/imagess/icono.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Library loan control</title>
<meta name="title" content="Library loan control" />
<meta name="description" content="Bienvenido a una nueva experiencia virtual, Desde la comodidad de tu dispositivo electrónico puedes acceder a libros virtuales sobre el mundo de la programación" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://metatags.io/" />
<meta property="og:title" content="Library loan control" />
<meta property="og:description" content="Bienvenido a una nueva experiencia virtual, Desde la comodidad de tu dispositivo electrónico puedes acceder a libros virtuales sobre el mundo de la programación" />
<meta property="og:image" content="https://metatags.io/images/meta-tags.png" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://metatags.io/" />
<meta property="twitter:title" content="Library loan control" />
<meta property="twitter:description" content="Bienvenido a una nueva experiencia virtual, Desde la comodidad de tu dispositivo electrónico puedes acceder a libros virtuales sobre el mundo de la programación" />
<meta property="twitter:image" content="https://metatags.io/images/meta-tags.png" />
<meta name="keywords" content="Biblioteca,Virtual,Libros,Aprendizaje,Servicios,online,libros">
    <meta name="author" content="Samuel Brand Gaviria">
    <meta name="robots" content="nosnippet">
    <meta name="robots" content="noarchive">
    <meta name="robots" content="noimageindex">
</head>

<body>

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


<header class="container">
    <div class="content">
        <span class="blur"></span>
        <span class="blur"></span>
        <h4>Build your knowledge like a professional</h4>
        <h1>Hi, we are <span>Library Loan Control</span>, Web Developers</h1>
        <p><h4>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus rem eos aliquid quo rerum
            temporibus ipsum distinctio numquam ut omnis placeat, nam sint atque quos dolorem laborum? Rerum, esse
            dolorem.
            </h4></p>
    </div>
    <div class="image">
        <img src="./assets/imagess/header.png">
    </div>
</header>

<section class="container">
    <h2 class="header">OUR FEATURES</h2>
    <div class="features">
        <div class="card">
            <center>
                <span><i class="ri-money-dollar-box-line"></i></span>
                <h4>Free Information</h4>
                <p><h4>
                    In the following books, you will have a lot of information that will be useful to you.
                    </h4></p>
                <a href="./php/buscar_libros.php">Go now <i class="ri-arrow-right-line"></i></a>
            </center>
        </div>
        <div class="card">
            <center>
                <span><i class="ri-bug-line"></i></span>
                <h4>We help you with information</h4>
                <p><h4>
                    Contact us to clarify your doubts, what books are available and more.
                    </h4></p>
                    <a href="https://iefelixdebedoutmoreno.edu.co" target="_blank">Go now <i class="ri-arrow-right-line"></i></a>

            </center>
        </div>
        <div class="card">
            <center>
                <span><i class="ri-history-line"></i></span>
                <h4>Why did we do this project?</h4>
                <p><h4>
                    Our inspiration to do this project, what was it?
                    </h4></p>
                <a href="#">Go now <i class="ri-arrow-right-line"></i></a>
            </center>
        </div>
        <div class="card">
            <center>
                <span><i class="ri-shake-hands-line"></i></span>
                <h4>Cooperation</h4>
                <p><h4>
                    Our work team 
                    </h4></p>
                <a href="/php/Acercade.php">Go now <i class="ri-arrow-right-line"></i></a>
            </center>
        </div>
    </div>
</section>

<footer class="container">
    <span class="blur"></span>
    <span class="blur"></span>
    <div class="column">
    </div>
</footer>
<center>
    <div class="copyright">
        <div>
            <img id="footer" class="banner-img float-center" src="/assets/imagess/I.E.Felix_de_Bedout_Moreno.png" alt="I.E. Félix de Bedout Moreno">
            <img id="footer" class="banner-img float-center" src="/assets/imagess/Pascual.png" alt="I.E. Pascual Bravo">
        </div>
        <p> &copy; 2024 Library loan Control. All rights reserved. </p>
    </div>
    </center>   
<script src="./assets/js/scripts.js"></script>
</body>
</html>
