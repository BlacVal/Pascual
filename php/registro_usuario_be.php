<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST ['usuario'];
$contrasena = $_POST ['contrasena'];
//Cifrado de contraseña con el algoritmo sha512
$contrasena = hash('sha512', $contrasena); 

$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
          VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";
          
          //verificar que el correo no se repita en la base de datos.
          $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios  WHERE correo='$correo'");

          if(mysqli_num_rows($verificar_correo)>0) {
            echo '
            <script>
            alert("El correo se registro correctamente");
            Window.location = "../index.php";
            </script>
            ';
            exit();
            mysqli_close($conexion);
          }

                    //verificar que el nombre de usuario no se repita en la base de datos.
                    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios  WHERE correo='$usuario'");

                    if(mysqli_num_rows($verificar_usuario)>0) {
                      echo '
                      <script>
                      alert("este correo ya esta registrado,intente con otro diferente");
                      Window.location = "../index.php";
                      </script>
                      ';
                      exit();
                    }
          $ejecutar = mysqli_query ($conexion, $query);

          if($ejecutar){
            echo '
            <script>
             alert ("Usuario almacenado exitosamente");
             Window.location= "../index.php";
            </script>
            ';
          }else{
            echo'
            <script>
             alert ("Intentelo de nuevo, usuario no almacenado");
             Window.location= "../index.php";
            
            </script>
            ';
          }

          mysqli_close($conexion);
?>