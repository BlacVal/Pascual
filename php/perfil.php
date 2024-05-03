<?php
$conexion = mysqli_connect("localhost", "root", "", "Login_register_db");

// Verificar si se ha enviado el formulario de búsqueda por cédula
if(isset($_POST['buscar'])) {
    // Obtener la cédula ingresada por el usuario
    $cedula = $_POST['cedula'];

    // Consulta para obtener la información del usuario con la cédula proporcionada
    $sql = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si se encontró algún resultado
    if (mysqli_num_rows($resultado) > 0) {
        // Mostrar la información del usuario
        $fila = mysqli_fetch_assoc($resultado);
        // Puedes mostrar más información aquí según tu base de datos
    } else {
        echo "<div class='profile-info'>No se encontraron resultados para la cédula ingresada.</div>";
    }
}

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
        $sql_update_contraseña = "UPDATE usuarios SET contraseña = '$hash_contraseña' WHERE cedula = '$cedula'";
        $resultado_update_contraseña = mysqli_query($conexion, $sql_update_contraseña);

        // Verificar si la actualización fue exitosa
        if($resultado_update_contraseña) {
            echo "<div class='message'>Contraseña actualizada correctamente.</div>";
        } else {
            echo "<div class='message'>Error al actualizar la contraseña: " . mysqli_error($conexion) . "</div>";
        }
    } else {
        echo "<div class='message'>Las contraseñas no coinciden.</div>";
    }
}

// Verificar si se ha enviado el formulario de cambio de nombre de usuario
if(isset($_POST['cambiar_nombre'])) {
    // Obtener el nuevo nombre de usuario
    $nuevo_nombre = $_POST['nuevo_nombre'];

    // Actualizar el nombre de usuario en la base de datos
    $sql_update_nombre = "UPDATE usuarios SET usuario = '$nuevo_nombre' WHERE cedula = '$cedula'";
    $resultado_update_nombre = mysqli_query($conexion, $sql_update_nombre);

    // Verificar si la actualización fue exitosa
    if($resultado_update_nombre) {
        echo "<div class='message'>Nombre de usuario actualizado correctamente.</div>";
    } else {
        echo "<div class='message'>Error al actualizar el nombre de usuario: " . mysqli_error($conexion) . "</div>";
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
<center>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="/assets/css/perfil.css">
</head>
<body>
    <div class="container">
        <div class="profile-box">
            <h1>Mi Perfil</h1>
            <div class="search-form">
                <form method="POST">
                    <label for="cedula">Cédula o Tarjeta de Identidad:</label>
                    <input type="text" name="cedula" id="cedula" required>
                    <button type="submit" name="buscar">Buscar</button>
                </form>
            </div>
        </div>
        <div class="info-box">
    <?php
    // Verificar si se ha encontrado información del usuario
    if (isset($fila)) {
        echo "<h2>Información del Perfil</h2>";
        echo "<p>Nombre: " . $fila["usuario"] . "</p>";
        echo "<p>Email: " . $fila["correo"] . "</p>";
        // Puedes mostrar más información aquí según tu base de datos
    } else {
        echo "<p>No se encontró información del perfil.</p>";
    }
    ?>
</div>
        <div class="change-forms">
            <!-- Formulario para cambiar la contraseña -->
            <form method="POST" class="change-form">
                <h2>Cambiar Contraseña</h2>
                <label for="nueva_contraseña">Nueva Contraseña:</label>
                <input type="password" name="nueva_contraseña" id="nueva_contraseña" required>
                <label for="confirmar_contraseña">Confirmar Contraseña:</label>
                <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" required>
                <button type="submit" name="cambiar_contraseña">Cambiar Contraseña</button>
            </form>

            <!-- Formulario para cambiar el nombre de usuario -->
            <form method="POST" class="change-form">
                <h2>Cambiar Nombre de Usuario</h2>
                <label for="nuevo_nombre">Nuevo Nombre de Usuario:</label>
                <input type="text" name="nuevo_nombre" id="nuevo_nombre" required>
                <button type="submit" name="cambiar_nombre">Cambiar Nombre de Usuario</button>
            </form>
        </div>
    </div>

    <footer>
        <a href="#search-form">Buscar</a> |
        <a href="#change-forms">Cambiar Contraseña/Nombre</a> |
        <a href="#profile-info">Información de Perfil</a> |
        <a href="/inicio.php">Volver al inicio</a>
    </footer>
    </center>
    <script src="perfil.js"></script>
</body>
</html>
