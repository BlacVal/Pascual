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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT titulo, pdf, mime_type FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($titulo, $pdf, $mime_type);
    $stmt->fetch();

    header("Content-type: " . $mime_type);
    header("Content-Disposition: inline; filename=\"" . $titulo . ".pdf\"");
    echo $pdf;

    $stmt->close();
}

$conn->close();
?>