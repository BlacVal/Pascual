let carrito = [];

function agregarAlCarrito(producto) {
  carrito.push(producto);
  actualizarCarrito();
  mostrarConfirmacion(producto);
}

function actualizarCarrito() {
  const listaCompras = document.getElementById('lista-compras');
  listaCompras.innerHTML = '';
  carrito.forEach(producto => {
    const item = document.createElement('li');
    item.textContent = producto;
    listaCompras.appendChild(item);
  });
}

function mostrarConfirmacion(libro) {
  // Aquí podrías mostrar una notificación o realizar alguna acción para indicar que se añadió al carrito
  alert(`${libro} se añadió al carrito.`);
}
function cerrarCarrito() {
  const carritoPopup = document.getElementById('carritoPopup');
  carritoPopup.style.display = 'none';
}
function mostrarCarrito() {
  const modal = document.getElementById('cart-modal');
  modal.style.display = 'block';
}
document.addEventListener('DOMContentLoaded', function () {
  const btnDescargas = document.getElementById('btn__descargas');
  const librosDescargables = document.getElementById('libros-descargables');

  btnDescargas.addEventListener('click', function () {
      librosDescargables.style.maxHeight = librosDescargables.scrollHeight + 'px';
      btnDescargas.style.display = 'none';
  });
});
