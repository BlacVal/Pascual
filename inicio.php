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
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Library Loan Control</title>
</head>

<body>

<nav>
    <div class="nav-logo">
        <a href="#">
            <img src="/assets/imagess/create-a-logo-for-a-book-lending-website-with-the--xUGYRNzKTsSZX7EX5FrmTA-Tu_1KVIRQTC8_jUSZEWxxw.jpeg">
        </a>
    </div>

    <ul class="nav-links">
        <li class="link"><a href="./inicio.php">Home</a></li>
        <li id="link1" class="link"><a href="./php/buscar_libros.php">books</a></li>
        <li id="link2" class="link"><a href="./php/libro.php">loans</a></li>
        <li id="link3" class="link"><a href="#">About</a></li>
    </ul>

    <?php if(isset($_SESSION['usuario'])):?>
        <div class="menu-item">
            <button class="btn">
                <a href="/php/perfil.php">view profile</a>
            </button>
            <ul class="submenu">
                <li><button class="btn"><a href="/php/logout.php">Sign off</a></button></li>
            </ul>
        </div>
    <?php else: ?>
        <button class="btn"><a href="./index.php">Log In</a></button>
    <?php endif; ?>
</nav>


    <header class="container">
        <div class="content">
            <span class="blur"></span>
            <span class="blur"></span>
            <h4>build your knowledge like a professional</h4>
            <H1>Hi, we are <span>Library Loan Control</span>, Web Developers</H1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus rem eos aliquid quo rerum
                temporibus ipsum distinctio numquam ut omnis placeat, nam sint atque quos dolorem laborum? Rerum, esse
                dolorem.
            </p>
            <button class="btn">Get Started</button>
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
                <p>
                In the following books, you will have a lot of information that will be useful to you.
                </p>
                <a href="./php/buscar_libros.php">go now <i class="ri-arrow-right-line"></i></a>
                </center>
            </div>
            <div class="card">
            <center>
                <span><i class="ri-bug-line"></i></span>
                <h4>we help you, with information</h4>
                <p>
                Contact us to clarify your doubts, what books are available and more.
                </p>
                <a href="./php/libro.php">go now <i class="ri-arrow-right-line"></i></a>
                </center>
            </div>
            <div class="card">
            <center>
                <span><i class="ri-history-line"></i></span>
                <h4>Why did we do this project?</h4>
                <p>
                Our inspiration to do this project, what was it?
                </p>
                <a href="#">go now <i class="ri-arrow-right-line"></i></a>
                </center>
            </div>
            <div class="card">
            <center>
                <span><i class="ri-shake-hands-line"></i></span>
                <h4>Cooperation</h4>
                <p>
                Our work team 
                </p>
                <a href="#">go Now <i class="ri-arrow-right-line"></i></a>
                </center>
            </div>
        </div>
    </section>

    <footer class="container">
        <span class="blur"></span>
        <span class="blur"></span>
        <div class="column">
            <div class="logo">
                <img src="/assets/imagess/create-a-logo-for-a-book-lending-website-with-the--xUGYRNzKTsSZX7EX5FrmTA-Tu_1KVIRQTC8_jUSZEWxxw.jpeg">
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="socials">
                <a href="#"><i class="ri-youtube-line"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>
                <a href="#"><i class="ri-twitter-line"></i></a>
            </div>
        </div>
    </footer>

    <script src="./assets/js/scripts.js"></script>
</body>

</html>
