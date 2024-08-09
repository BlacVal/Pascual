<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "Login_register_db");

// Verificar la conexión
if (mysqli_connect_errno()) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Iniciar sesión
session_start();

// Función para limpiar y validar datos de entrada
function limpiar_entrada($dato) {
    return htmlspecialchars(stripslashes(trim($dato)));
}

// Verificar si se ha enviado el formulario de búsqueda por cédula
if (isset($_POST['buscar'])) {
    // Obtener la cédula ingresada por el usuario
    $cedula = limpiar_entrada($_POST['cedula']);

    // Consulta preparada para evitar la inyección SQL
    $sql = "SELECT usuario, correo, contrasena FROM usuarios WHERE cedula = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $cedula);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // Verificar si se encontró algún resultado
    if (mysqli_num_rows($resultado) > 0) {
        // Guardar la información del usuario en la sesión como un array asociativo
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['cedula'] = $cedula;

        // Guardar la contraseña sin cifrar en la sesión temporalmente
        $_SESSION['contrasena_plana'] = $usuario['contrasena'];
    } else {
        echo "<div class='message'>No se encontraron resultados para la cédula ingresada.</div>";
    }
}

// Verificar si se ha enviado el formulario de cambio de contraseña
if (isset($_POST['cambiar_contraseña'])) {
    // Obtener la nueva contraseña y la confirmación
    $nueva_contraseña = limpiar_entrada($_POST['nueva_contraseña']);
    $confirmar_contraseña = limpiar_entrada($_POST['confirmar_contraseña']);

    // Verificar si las contraseñas coinciden
    if ($nueva_contraseña === $confirmar_contraseña) {
        // Hash de la nueva contraseña 
        $hash_contraseña = password_hash($nueva_contraseña, PASSWORD_DEFAULT);

        // Verificar si la cédula está en la sesión
        if (isset($_SESSION['cedula'])) {
            // Actualizar la contraseña en la base de datos
            $sql_update_contraseña = "UPDATE usuarios SET contrasena = ? WHERE cedula = ?";
            $stmt = mysqli_prepare($conexion, $sql_update_contraseña);
            mysqli_stmt_bind_param($stmt, "ss", $hash_contraseña, $_SESSION['cedula']);
            $resultado_update_contraseña = mysqli_stmt_execute($stmt);

            // Verificar si la actualización fue exitosa
            if ($resultado_update_contraseña) {
                echo "<div class='message'>Contraseña actualizada correctamente.</div>";
            } else {
                echo "<div class='message'>Error al actualizar la contraseña: " . mysqli_error($conexion) . "</div>";
            }
        } else {
            echo "<div class='message'>Error: No se ha proporcionado la cédula.</div>";
        }
    } else {
        echo "<div class='message'>Las contraseñas no coinciden.</div>";
    }
}

// Verificar si se ha enviado el formulario de cambio de nombre de usuario
if (isset($_POST['cambiar_nombre'])) {
    // Obtener el nuevo nombre de usuario
    $nuevo_nombre = limpiar_entrada($_POST['nuevo_nombre']);

    // Verificar si la cédula está en la sesión
    if (isset($_SESSION['cedula'])) {
        // Actualizar el nombre de usuario en la base de datos
        $sql_update_nombre = "UPDATE usuarios SET usuario = ? WHERE cedula = ?";
        $stmt = mysqli_prepare($conexion, $sql_update_nombre);
        mysqli_stmt_bind_param($stmt, "ss", $nuevo_nombre, $_SESSION['cedula']);
        $resultado_update_nombre = mysqli_stmt_execute($stmt);

        // Verificar si la actualización fue exitosa
        if ($resultado_update_nombre) {
            // Actualizar la información del usuario en la sesión
            $_SESSION['usuario']['usuario'] = $nuevo_nombre;
            echo "<div class='message'>Nombre de usuario actualizado correctamente.</div>";
        } else {
            echo "<div class='message'>Error al actualizar el nombre de usuario: " . mysqli_error($conexion) . "</div>";
        }
    } else {
        echo "<div class='message'>Error: No se ha proporcionado la cédula.</div>";
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
    <div class="menu">
        <ul>
            <li><a href="#rename">See information</a></li>
            <li><a href="#change-password">Change password  /  name</a></li>
            <li><a href="#view-info">#####</a></li>
        </ul>
    </div>
    <div class="container">
        <div id="rename" class="content-section">
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
                if (isset($_SESSION['usuario']) && is_array($_SESSION['usuario'])) {
                    $fila = $_SESSION['usuario'];
                    echo "<h2>Información del Perfil</h2>";
                    echo "<p>Nombre: " . htmlspecialchars($fila["usuario"]) . "</p>";
                    echo "<p>Email: " . htmlspecialchars($fila["correo"]) . "</p>";

                } else {
                    echo "<p>No se encontró información del perfil.</p>";
                }
                ?>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <div id="change-password" class="content-section">
            <div class="change-forms">
                <!-- Formulario para cambiar la contraseña -->
                <form method="POST" class="change-form">
                    <h2>Cambiar contraseña</h2>
                    <input type="password" name="nueva_contraseña" placeholder="Nueva Contraseña" required>
                    <input type="password" name="confirmar_contraseña" placeholder="Confirmar Contraseña" required>
                    <button type="submit" name="cambiar_contraseña">Cambiar Contraseña</button>
                </form>
                <br><br><br><br><br><br><br><br><br><br>
                <!-- Formulario para cambiar el nombre de usuario -->
                <?php if (isset($_SESSION['cedula'])): ?>
                <form method="POST" class="change-form">
                    <h2>Cambiar Nombre de Usuario</h2>
                    <label for="nuevo_nombre">Nuevo Nombre de Usuario:</label>
                    <input type="text" name="nuevo_nombre" id="nuevo_nombre" required>
                    <button type="submit" name="cambiar_nombre">Cambiar Nombre de Usuario</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
        <div id="view-info" class="content-section">
            <!-- Aquí se puede agregar cualquier contenido adicional que desees mostrar -->
        </div>
    </div>

    <footer>
        <a href="#search-form">Buscar</a> |
        <a href="#change-password">Change password  /  name</a> |
        <a href="#rename">See information</a> |
        <a href="/inicio.php">return to top of page</a>
    </footer>
    <script src="/assets/js/perfil.js"></script>
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
