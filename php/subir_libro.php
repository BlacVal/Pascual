<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Login_register_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdf'])) {
    $titulo = $_POST['titulo'];
    $Estado = $_POST['Estado'];
    $file_size = $_FILES['pdf']['size'];

    // Verificar el tamaño del archivo (por ejemplo, 20MB máximo)
    if ($file_size > 20 * 1024 * 1024) {
        die("El archivo es demasiado grande. El tamaño máximo permitido es de 20MB.");
    }

    $pdf = file_get_contents($_FILES['pdf']['tmp_name']);
    $mime_type = $_FILES['pdf']['type'];

    // Aumentar el límite de tamaño de paquete si es necesario
    $conn->query("SET GLOBAL max_allowed_packet=64*1024*1024");

    $stmt = $conn->prepare("INSERT INTO libros (titulo, Estado, pdf, mime_type) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación: " . $conn->error);
    }

    $stmt->bind_param("ssss", $titulo, $Estado, $pdf, $mime_type);

    // Ejecutar la consulta y verificar errores
    if ($stmt->execute()) {
        echo "Libro subido exitosamente.";
    } else {
        echo "Error al subir el libro: " . $stmt->error;
    }

    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
