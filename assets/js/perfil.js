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
});
