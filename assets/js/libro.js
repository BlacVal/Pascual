let carrito = [];

function agregarAlCarrito(producto) {
    carrito.push(producto);
    actualizarCarrito();
}

function actualizarCarrito() {
    const listaCompras = document.getElementById('lista-compras');
    if (listaCompras) {
        listaCompras.innerHTML = '';
        carrito.forEach(producto => {
            const item = document.createElement('li');
            item.textContent = producto;
            listaCompras.appendChild(item);
        });
    } else {
        console.error('Elemento lista-compras no encontrado.');
    }
}

function cerrarCarrito() {
    const carritoPopup = document.getElementById('cart-modal');
    if (carritoPopup) {
        carritoPopup.style.display = 'none';
    } else {
        console.error('Elemento cart-modal no encontrado.');
    }
}

function mostrarCarrito() {
    const modal = document.getElementById('cart-modal');
    if (modal) {
        modal.style.display = 'block';
    } else {
        console.error('Elemento cart-modal no encontrado.');
    }
}

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
    .then(response => {
        if (response.ok) {
            return response.json();
        }
        throw new Error('Error al procesar el pedido');
    })
    .then(data => {
        if (data.disponibilidad) {
            alert('Pedido procesado con éxito. Redirigiendo a la búsqueda de libros.');
            window.location.href = '/php/buscar_libros.php';
        } else {
            if (data.mensaje) {
                alert(data.mensaje);
            } else {
                alert('Alguno de los libros seleccionados no está disponible para préstamo.');
            }
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Hubo un error al procesar el pedido. Por favor, intenta nuevamente más tarde.');
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const btnDescargas = document.getElementById('btn__descargas');
    const librosDescargables = document.getElementById('libros-descargables');

    if (btnDescargas && librosDescargables) {
        btnDescargas.addEventListener('click', function() {
            librosDescargables.style.maxHeight = librosDescargables.scrollHeight + 'px';
            btnDescargas.style.display = 'none';
        });
    } else {
        console.error('Elementos btn__descargas o libros-descargables no encontrados.');
    }

    const modeToggleBtn = document.getElementById('mode-toggle');
    const body = document.body;

    if (modeToggleBtn && body) {
        modeToggleBtn.addEventListener('click', function() {
            if (body.classList.contains('night-mode')) {
                body.classList.remove('night-mode');
                body.classList.add('day-mode');
                modeToggleBtn.textContent = 'Night mode';
            } else {
                body.classList.remove('day-mode');
                body.classList.add('night-mode');
                modeToggleBtn.textContent = 'Day mode';
            }
        });
    } else {
        console.error('Elementos mode-toggle o body no encontrados.');
    }

    window.agregarAlCarrito = agregarAlCarrito;
    window.mostrarCarrito = mostrarCarrito;
    window.cerrarCarrito = cerrarCarrito;
    window.procesarPedido = procesarPedido;
});
