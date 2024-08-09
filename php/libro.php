<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="/assets/css/libro.css">
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
    
<section class="libros-disponibles">
    <h2>Libros Disponibles</h2>
    <div class="lista-libros">
        <details>
            <summary>Programación</summary>
            <ul>
                <li><a href="#" onclick="agregarAlCarrito('HTML Y CSS')">HTML Y CSS</a></li>
                <li><a href="#" onclick="agregarAlCarrito('JavaScript')">JavaScript</a></li>
                <li><a href="#" onclick="agregarAlCarrito('Diseño')">Logica y Diseño</a></li>
                <li><a href="#" onclick="agregarAlCarrito('Base de datos')">Base de datos</a></li>
                <li><a href="#" onclick="agregarAlCarrito('Servicio de backend y Frontend')">Servicio de backend y Frontend</a></li>
            </ul>
        </details>
    </div>
</section>
    
<center><button id="btn-mostrar-carrito" onclick="mostrarCarrito()">Ver Carrito</button></center>

<div id="cart-modal" class="cart-modal">
    <span id="cerrar" onclick="cerrarCarrito()">Cerrar</span>
    <h2>Carrito de Compras</h2>
    <ul id="lista-compras"></ul>
    <button onclick="procesarPedido()">Procesar Pedido</button>
</div>

<script src="/assets/js/libro.js"></script>
<script>
function procesarPedido() {
    if (carrito.length === 0) {
        alert('El carrito está vacío. Por favor, agrega libros antes de procesar.');
        return;
    }

    fetch('/php/procesar_pedido.php', {
        method: 'POST',
        body: JSON.stringify({ libros: carrito }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.disponibilidad) {
            alert('Pedido procesado con éxito. Redirigiendo a la búsqueda de libros.');
            const libroBuscado = carrito[0]; // Asumiendo que quieres redirigir al primer libro del carrito
            window.location.href = `/php/buscar_libros.php?q=${encodeURIComponent(libroBuscado)}`;
        } else {
            alert(data.mensaje || 'Alguno de los libros seleccionados no está disponible para préstamo.');
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Hubo un error al procesar el pedido. Por favor, intenta nuevamente más tarde.');
    });
}
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
