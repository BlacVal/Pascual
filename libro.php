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
        <ul>
            <li>
                <div class="categorias">
                <div class="container">
                    <img src="./images/carrito.png" alt="Carrito de Compras" class="cart-icon" onclick="mostrarCarrito()">
              
                    <div id="cart-modal">
                        <span id="cerrar" onclick="cerrarCarrito()">Cerrar</span>
                      <h2>Carrito de Compras</h2>
                    </div>
                      <ul id="lista-compras"> 
                        
                        <!-- Aquí se mostrarán los productos agregados al carrito -->
                      </ul>
                      
                    </div>
                        <div class="categoria-mate"><summary>MATEMATICAS</summary></div>
                        <script src="./libro.js"></script>
                    </div>

                        <div class="book">
                            <img src="materias/m1.jpg" alt="Portada del Libro 1">
                            <h2>Matematicas 6°</h2> 
                            <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                        </div>
                        <script src="./libro.js"></script>
                        </div>
                        <div class="book">
                            <img src="materias/m2.jpg" alt="Portada del Libro 1">
                            <h2>Matematicas 7°</h2> 
                            <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                       </div>
                        <script src="./libro.js"></script>
                        </div>

                        <div class="book">
                            <img src="materias/m3.jpg" alt="Portada del Libro 1">
                            <h2>Matematicas 9°</h2> 
                            <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                        </div>
                        <br>
                        <script src="./libro.js"></script>
                        <div class="book">
                            <img src="materias/m4.jpg" alt="Portada del Libro 1">
                            <h2>Matematicas 9°</h2> 
                            <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                       
                        <script src="./libro.js"></script>
                    </div>
                    <div class="book">
                            <img src="materias/m5.jpg" alt="Portada del Libro 1">
                            <h2>Matematicas 10°</h2> 
                            <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                       
                        <script src="./libro.js"></script>
                        </div>

                        <div class="book">
                            <img src="materias/m6.jpg" alt="Portada del Libro 1">
                            <h2>Matematicas 11°</h2> 
                            <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                        
                        <script src="./libro.js"></script>
                        </div>
                      
                        </div>
                    </li>
                    <li>
                        <div class="container">
                            
                                <img src="./images/carrito.png" alt="Carrito de Compras" class="cart-icon" onclick="mostrarCarrito()">
              
                    <div id="cart-modal">
                         <span class="cerrar" onclick="cerrarCarrito()">Cerrar</span>
                      <h2>Carrito de Compras</h2>
                    </div>
                      <ul id="lista-compras"> 
                       
                        <!-- Aquí se mostrarán los productos agregados al carrito -->
                      </ul>
                    </div>
                                <div class="categoria-Programacion"><summary>Programacion</summary></div>
                                <div class="book">
                                    <img src="materias/e1.jpg" alt="Portada del Libro 1">
                                    <h2>BASICA 1</h2> 
                                    <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                                </div>
                                <script src="./libro.js"></script>
                                </div>
        
                                <div class="book">
                                    <img src="materias/e2.jpg" alt="Portada del Libro 1">
                                    <h2>BASICA 2</h2> 
                                    <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                                </div>
                                <script src="./libro.js"></script>
                                </div>
        
                                <div class="book">
                                    <img src="materias/e3.png" alt="Portada del Libro 1">
                                    <h2>BASICA 3</h2>
                                    <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                                </div>
                                <br>
                                <script src="./libro.js"></script>
                                </div>
        
                                <div class="book">
                                    <img src="materias/e4.png" alt="Portada del Libro 1">
                                    <h2>INTERMEDIO 1</h2>
                                    <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                                </div>
                                <script src="./libro.js"></script>
                                </div>
                                <div class="book">
                                    <img src="materias/e5.jpg" alt="Portada del Libro 1">
                                    <h2>INTERMEDIO 2</h2>
                                    <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                                </div>
                                <script src="./libro.js"></script>
                                </div>
                                <div class="book">
                                    <img src="materias/e6.webp" alt="Portada del Libro 1">
                                    <h2>INTERMEDIO 3</h2>
                                    <button onclick="agregarAlCarrito('Libro')">Agregar al Carrito</button>
                                      </div>
                                      <script src="./libro.js"></script>
                                </div>
                       
                        </div>
                    </li>
                            </nav>
                        </body>
                        </html>