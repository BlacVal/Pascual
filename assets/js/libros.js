// Función para cargar la lista de libros disponibles
function cargarLibros() {
    // Aquí puedes hacer una solicitud AJAX a tu backend para obtener la lista de libros disponibles
    // Luego, puedes actualizar la tabla HTML con los datos recibidos del backend
}

// Función para manejar la acción de prestar un libro
function prestarLibro(libro) {
    // Aquí puedes hacer una solicitud AJAX para prestar el libro seleccionado
}

// Función para manejar la acción de devolver un libro
function devolverLibro(libro) {
    // Aquí puedes hacer una solicitud AJAX para devolver el libro seleccionado
}

// Función para renderizar los libros en la tabla HTML
function renderizarLibros(libros) {
    // Obtener el cuerpo de la tabla
    var tbody = document.querySelector('tbody');

    // Limpiar el contenido existente en la tabla
    tbody.innerHTML = '';

    // Iterar sobre cada libro y agregarlo a la tabla
    libros.forEach(function(libro) {
        var row = document.createElement('tr');

        // Celda para el nombre del libro
        var cellNombre = document.createElement('td');
        cellNombre.textContent = libro;
        row.appendChild(cellNombre);

        // Celda para el estado del libro
        var cellEstado = document.createElement('td');
        // Aquí puedes agregar lógica para determinar el estado del libro (disponible/prestado)
        cellEstado.textContent = 'Disponible'; // Ejemplo de estado
        row.appendChild(cellEstado);

        // Celda para las acciones del libro (prestar/devolver)
        var cellAcciones = document.createElement('td');
        var btnPrestar = document.createElement('button');
        btnPrestar.textContent = 'Prestar';
        btnPrestar.addEventListener('click', function() {
            prestarLibro(libro);
        });
        cellAcciones.appendChild(btnPrestar);

        var btnDevolver = document.createElement('button');
        btnDevolver.textContent = 'Devolver';
        btnDevolver.addEventListener('click', function() {
            devolverLibro(libro);
        });
        cellAcciones.appendChild(btnDevolver);

        row.appendChild(cellAcciones);

        // Agregar la fila a la tabla
        tbody.appendChild(row);
    });
}

// Cuando se carga la página, cargar la lista de libros disponibles
document.addEventListener('DOMContentLoaded', function() {
    cargarLibros();
});
