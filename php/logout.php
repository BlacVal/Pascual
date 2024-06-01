<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea destruir la cookie de sesión, es posible borrarla también
// Nota: Esto destruirá la sesión y no la información de la sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Redirigir al usuario de vuelta a la página de inicio de sesión
header("location: ../inicio.php"); // Asegúrate de que la ruta sea correcta
exit();
?>
