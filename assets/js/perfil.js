document.addEventListener("DOMContentLoaded", function() {
    // Obtener los formularios
    var cambiarContraseñaForm = document.querySelector(".formulario-cambios[name='cambiar_contraseña']");
    var cambiarNombreForm = document.querySelector(".formulario-cambios[name='cambiar_nombre']");

    // Agregar event listener para el formulario de cambiar contraseña
    cambiarContraseñaForm.addEventListener("submit", function(event) {
        // Obtener las contraseñas
        var nuevaContraseña = document.getElementById("nueva_contraseña").value;
        var confirmarContraseña = document.getElementById("confirmar_contraseña").value;

        // Validar que las contraseñas no estén vacías
        if (nuevaContraseña === "" || confirmarContraseña === "") {
            alert("Por favor, complete todos los campos de contraseña.");
            event.preventDefault(); // Evitar que se envíe el formulario
        } else if (nuevaContraseña !== confirmarContraseña) {
            alert("Las contraseñas no coinciden.");
            event.preventDefault(); // Evitar que se envíe el formulario
        }
    });

    // Agregar event listener para el formulario de cambiar nombre de usuario
    cambiarNombreForm.addEventListener("submit", function(event) {
        // Obtener el nuevo nombre de usuario
        var nuevoNombre = document.getElementById("nuevo_nombre").value;

        // Validar que el nombre no esté vacío
        if (nuevoNombre === "") {
            alert("Por favor, ingrese un nuevo nombre de usuario.");
            event.preventDefault(); // Evitar que se envíe el formulario
        }
    });

    // Agregar event listener para el menú de navegación
    document.querySelectorAll('.menu a').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var target = this.getAttribute('href');
            var element = document.querySelector(target);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
document.querySelectorAll('.menu a').forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        var target = this.getAttribute('href');
        var element = document.querySelector(target);
        if (element) {
            // Oculta todas las secciones
            document.querySelectorAll('.section').forEach(function(section) {
                section.classList.remove('active');
            });
            // Muestra solo la sección seleccionada
            element.classList.add('active');
        }
    });
});
function togglePasswordVisibility() {
    var passwordField = document.getElementById('password');
    var button = event.target;

    if (passwordField.textContent === '*****') {
        passwordField.textContent = '<?php echo isset($_SESSION['contrasena_plana']) ? htmlspecialchars($_SESSION['contrasena_plana']) : ""; ?>';
        button.textContent = 'Ocultar';
    } else {
        passwordField.textContent = '*****';
        button.textContent = 'Mostrar';
    }
}

document.querySelectorAll('.menu a').forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        var target = this.getAttribute('href');
        var element = document.querySelector(target);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    });
});