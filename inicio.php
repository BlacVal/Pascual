<!-- inicio.php -->
<?php 
session_start();

if(isset($_SESSION['usuario'])){
    echo '<a href="/php/logout.php">Cerrar sesión</a>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="Logos/Logo4.jpg"  type="image/x-icon"/>
    <link rel="shortcut icon" href="Logos/Logo4.jpg" type="image/x-icon">
    <title>Library loan Control</title>
</head>
<body>


    <header class="header">

        <div class="menu container">
            <a href="a" class="logo"></a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="./libro.php">Productos</a></li>
                    <li><a href="#">Contactos</a></li>
                </ul>
            </nav>

        </div>

        <div class="header-content container">

            <div class="header-txt">
                <h1>Library loan Control</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae magni nulla praesentium, accusamus voluptatibus ullam voluptatem odit nobis ex sit eos, consequatur debitis perferendis repellat quo perspiciatis architecto odio necessitatibus.
                </p>
            </div>

        </div>

    </header>

    <section class="general container">
        <h2>Programa</h2>
        <div class="general-content">

            <div class="general-1 txt">
                <h3>¿Porque una bilbioteca virtual?</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam vero libero, molestiae ducimus ut error rem quia. Voluptates, pariatur officiis! Consequuntur nemo natus ullam eligendi expedita tempora laboriosam vitae quam?
                </p>
            </div>
            <div class="general-2 txt">
                <h3>¿Porque se creo la bibliteca virtual?</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam vero libero, molestiae ducimus ut error rem quia. Voluptates, pariatur officiis! Consequuntur nemo natus ullam eligendi expedita tempora laboriosam vitae quam?
                </p>
            </div>
            <div class="general-3 txt">
                <h3>Con que fin</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam vero libero, molestiae ducimus ut error rem quia. Voluptates, pariatur officiis! Consequuntur nemo natus ullam eligendi expedita tempora laboriosam vitae quam?
                </p>
            </div>
        </div>
        </section>

        <section class="info-1">

            <div class="info-content container">

                <h2>Informacion</h2>

                <div class="info-circle">

                    <div class="circle-txt">
                        <div class="circle-1">
                            <h3>8000 M</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed unde recusandae in officia deleniti expedita. Aliquam quasi laboriosam eveniet velit itaque est fugiat blanditiis, quae esse voluptas. Amet, magnam ducimus.
                        </p>
                    </div>
                    <div class="circle-txt">
                        <div class="circle-1">
                            <h3>6.5 %</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed unde recusandae in officia deleniti expedita. Aliquam quasi laboriosam eveniet velit itaque est fugiat blanditiis, quae esse voluptas. Amet, magnam ducimus.
                        </p>
                    </div>
                    <div class="circle-txt">
                        <div class="circle-1">
                            <h3>-35 C</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed unde recusandae in officia deleniti expedita. Aliquam quasi laboriosam eveniet velit itaque est fugiat blanditiis, quae esse voluptas. Amet, magnam ducimus.
                        </p>
                    </div>
                    <div class="circle-txt">
                        <div class="circle-1">
                            <h3>8H</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed unde recusandae in officia deleniti expedita. Aliquam quasi laboriosam eveniet velit itaque est fugiat blanditiis, quae esse voluptas. Amet, magnam ducimus.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <section class="general g2 container">
            <h2>Nuestro equipo</h2>
            <div class="general-content">
    
                <div class="general-4 txt">
                    <h3>Juan Manuel Ciro Vega</h3>
                </div>
                <div class="general-5 txt">
                    <h3>Alexandra Rodriguez Agudelo</h3>
                </div>
                <div class="general-6 txt">
                    <h3>Samuel Brand Gaviria</h3>
                </div>
                <div class="general-7 txt">
                    <h3>Juan Pablo Montoya Restrepo</h3>
                </div>
            </div>
            </section>


            <section class="info-2">
                <div class="info-content container">
                    <h2>Testimonios</h2>
                    <div class="testi">

                        <div class="testi-left">
                            <div class="testi-txt">
                                <img src="images/t1.png" alt="">
                                <h3>lorem</h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero maiores consectetur pariatur tenetur nobis deserunt non error corporis. Architecto quae quod maxime eos. Repudiandae eius impedit nulla doloremque, est quas.
                                </p>
                            </div>
                            <div class="testi-txt">
                                <img src="images/t2.png" alt="">
                                <h3>lorem</h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero maiores consectetur pariatur tenetur nobis deserunt non error corporis. Architecto quae quod maxime eos. Repudiandae eius impedit nulla doloremque, est quas.
                                </p>
                            </div>

                        </div>
                        <div class="testi-right">
                            <div class="testi-txt">
                                <img src="images/t3.png" alt="">
                                <h3>lorem</h3>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero maiores consectetur pariatur tenetur nobis deserunt non error corporis. Architecto quae quod maxime eos. Repudiandae eius impedit nulla doloremque, est quas.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </section>



            <footer class="footer container">

                <h2>Contacto</h2>

                <form>
                    <input class="campo" type="text" placeholder="Nombre">
                    <input class="campo" type="email" placeholder="Email">
                    <input type="submit" class="btn-2" value="Enviar">
                </form>
                <div class="footer-txt">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis officia eum</p>
                </div>
            </footer>

</body>
</html>