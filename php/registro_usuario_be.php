<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificar si la cédula o tarjeta de identidad ya está registrada en la base de datos
$verificar_cedula = mysqli_query($conexion, "SELECT * FROM usuarios WHERE cedula='$cedula'");
if(mysqli_num_rows($verificar_cedula) > 0) {
    $registro_exitoso = false;
    $mensaje = "Esta cedula ya esta registrada, por favor intente con otra.";
}

// Verificar si el correo ya está registrado en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo) > 0) {
    $registro_exitoso = false;
    $mensaje = "Este correo ya esta registrado, por favor intente con otro.";
}

// Verificar si el nombre de usuario ya está registrado en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0) {
    $registro_exitoso = false;
    $mensaje = "Este usuario ya esta registrado, por favor intente con otro.";
}

// Si no hay registros previos con la cédula, el correo y el nombre de usuario, proceder con el registro
if (!isset($registro_exitoso)) {
    $query = "INSERT INTO usuarios(nombre_completo, correo, cedula, usuario, contrasena) 
              VALUES('$nombre_completo', '$correo', '$cedula', '$usuario', '$contrasena')";
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar) {
        $registro_exitoso = true;
        $mensaje = "Usuario almacenado exitosamente.";
    } else {
        $registro_exitoso = false;
        $mensaje = "Ha ocurrido un error, por favor intentelo de nuevo.";
    }
}

echo json_encode(array("" => $registro_exitoso, "" => $mensaje));

mysqli_close($conexion);
?>