<?php
session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$query = "SELECT id, usuario, role FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['role'] = $row['role'];
    header("Location: ../inicio.php");
} else {
    echo '
        <script>
            alert("Usuario o contraseña incorrectos.");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_free_result($result);
mysqli_close($conexion);
?>
