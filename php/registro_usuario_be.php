<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];
$usuario = $_POST ['usuario'];
$contrasena = $_POST ['contrasena'];
//Cifrado de contraseña con el algoritmo sha512 $contrasena = hash('sha512', $contrasena); .

$query = "INSERT INTO usuarios(nombre_completo, correo, cedula, usuario, contrasena) 
          VALUES('$nombre_completo', '$correo', '$cedula', '$usuario', '$contrasena')";
          
          //verificar que el correo no se repita en la base de datos.
          $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios  WHERE correo='$correo'");

          if(mysqli_num_rows($verificar_correo)>0) {
            echo '
            <script>
            alert("El correo se registro correctamente");</script>';
            header("location: ../index.php");
            exit();
            mysqli_close($conexion);
          }

                    //verificar que el nombre de usuario no se repita en la base de datos.
                    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios  WHERE correo='$usuario'");

                    if(mysqli_num_rows($verificar_usuario)>0) {
                      echo '
                      <script>
                      alert("este correo ya esta registrado,intente con otro diferente");</script>';
                      header("location: ../index.php");
                      exit();
                    }
                    //verificar si las contraseñas son iguales
                    $verificar_contrasena=mysqli_query($conexion, "SELECT * FROM contrasena WHERE contrasena='$contrasena'");
                    
                    if (mysqli_num_rows($verificar_contrasena)>0) {
                      echo '
                      <script>
                      alert("Las contrasenas no coinciden");</script>';
                      header("location: ../index.php");

                      exit();

                    }
          $ejecutar = mysqli_query ($conexion, $query);

          if($ejecutar){
            echo '
            <script>
             alert ("Usuario almacenado exitosamente");</script>';
             header ("location: ../index.php");
          }else{
            echo'
            <script>
             alert ("Intentelo de nuevo, usuario no almacenado");</script>';
             header ("location: ../index.php");
          }

          mysqli_close($conexion);
?>