<?php
$conexion = mysqli_connect("localhost", "root", "", "Login_register_db");

// Verificar si se ha enviado el formulario de cambio de contraseña
if(isset($_POST['cambiar_contraseña'])) {
    // Obtener la nueva contraseña y la confirmación
    $nueva_contraseña = $_POST['nueva_contraseña'];
    $confirmar_contraseña = $_POST['confirmar_contraseña'];

    // Verificar si las contraseñas coinciden
    if($nueva_contraseña === $confirmar_contraseña) {
        // Hash de la nueva contraseña
        $hash_contraseña = password_hash($nueva_contraseña, PASSWORD_DEFAULT);

        // Actualizar la contraseña en la base de datos
        $sql_update_contraseña = "UPDATE usuarios SET contraseña = '$hash_contraseña' WHERE id = 1"; // Cambia '1' por el ID del usuario
        $resultado_update_contraseña = mysqli_query($conexion, $sql_update_contraseña);

        // Verificar si la actualización fue exitosa
        if($resultado_update_contraseña) {
            echo "Contraseña actualizada correctamente.";
        } else {
            echo "Error al actualizar la contraseña: " . mysqli_error($conexion);
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
}

// Verificar si se ha enviado el formulario de cambio de nombre de usuario
if(isset($_POST['cambiar_nombre'])) {
    // Obtener el nuevo nombre de usuario
    $nuevo_nombre = $_POST['nuevo_nombre'];

    // Actualizar el nombre de usuario en la base de datos
    $sql_update_nombre = "UPDATE usuarios SET nombre = '$nuevo_nombre' WHERE id = 1"; // Cambia '1' por el ID del usuario
    $resultado_update_nombre = mysqli_query($conexion, $sql_update_nombre);

    // Verificar si la actualización fue exitosa
    if($resultado_update_nombre) {
        echo "Nombre de usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el nombre de usuario: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="/assets/css/perfil.css">
</head>
<body>
    <div class="perfil-container">
        <h1>Mi Perfil</h1>
        <div class="perfil-info">
            <?php
                // Aquí irá el código PHP para recuperar la información del perfil y mostrarla
                $conexion = mysqli_connect("localhost", "root", "", "Login_register_db");

                // Revisar la conexión
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                // Consulta para obtener la información del usuario (cambia '1' por el ID del usuario que quieras mostrar)
                $sql = "SELECT * FROM usuarios WHERE id = 1";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Mostrar la información del usuario
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<p>Nombre: " . $fila["nombre"] . "</p>";
                        echo "<p>Email: " . $fila["email"] . "</p>";
                        echo "<p>Fecha de Nacimiento: " . $fila["fecha_nacimiento"] . "</p>";
                        // Puedes mostrar más información aquí según tu base de datos
                    }
                } else {
                    echo "No se encontraron resultados.";
                }

                // Cerrar la conexión
                $conexion->close();
            ?>
        </div>
    </div>
    <main>
        <p>Esta es la página de perfil. Aquí puedes mostrar información específica del usuario, como su nombre, correo electrónico, etc.</p>

        <!-- Formulario para cambiar la contraseña -->
        <form method="POST">
            <label for="nueva_contraseña">Nueva Contraseña:</label>
            <input type="password" name="nueva_contraseña" id="nueva_contraseña" required>
            <label for="confirmar_contraseña">Confirmar Contraseña:</label>
            <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" required>
            <button type="submit" name="cambiar_contraseña">Cambiar Contraseña</button>
            <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
        </form>

        <!-- Formulario para cambiar el nombre de usuario -->
        <form method="POST">
            <label for="nuevo_nombre">Nuevo Nombre de Usuario:</label>
            <input type="text" name="nuevo_nombre" id="nuevo_nombre" required>
            <button type="submit" name="cambiar_nombre">Cambiar Nombre de Usuario</button>
        </form>
    </main>

    <footer>
        <p><a href="/inicio.php">Volver al inicio</a></p>
    </footer>
</body>
</html>
