<?php
// Incluir el archivo de conexión a la base de datos
require_once '/OneDrive/Escritorio/Login/php/conexion_be.php';

// Función para limpiar y validar datos de entrada
function limpiar_entrada($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Verificar que se hayan recibido los datos necesarios y sanear las entradas
if (isset($_POST['usuario'], $_POST['nueva_contrasena'], $_POST['confirmar_contrasena'])) {
    $usuario = limpiar_entrada($_POST['usuario']);
    $nueva_contrasena = limpiar_entrada($_POST['nueva_contrasena']);
    $confirmar_contrasena = limpiar_entrada($_POST['confirmar_contrasena']);

    // Verificar que la nueva contraseña y la confirmación coincidan
    if ($nueva_contrasena === $confirmar_contrasena) {
        // Verificar que la contraseña cumple con los criterios de seguridad (longitud mínima, caracteres especiales, etc.)
        if (strlen($nueva_contrasena) < 8) {
            echo "Error: La contraseña debe tener al menos 8 caracteres.";
            exit;
        }

        // Hash de la nueva contraseña
        $hash_contraseña = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

        // Actualizar la contraseña en la base de datos
        $stmt = mysqli_prepare($conexion, "UPDATE usuarios SET contrasena = ? WHERE usuario = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $hash_contraseña, $usuario);
        mysqli_stmt_execute($stmt);

        // Verificar si la consulta se ejecutó correctamente
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if ($affected_rows > 0) {
            echo "La contraseña se ha cambiado correctamente.";
        } else {
            echo "Error: No se pudo cambiar la contraseña. Verifica el usuario proporcionado.";
        }

        // Cerrar la consulta preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: La nueva contraseña y la confirmación no coinciden.";
    }
} else {
    echo "Error: Faltan datos necesarios.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
