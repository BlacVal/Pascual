<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$libros = $data['libros'] ?? [];

if (empty($libros)) {
    echo json_encode(['disponibilidad' => false, 'mensaje' => 'El carrito está vacío']);
    exit();
}

include './conexion_be.php';

$disponibilidad = true;

foreach ($libros as $libro) {
    $query = "SELECT Estado FROM libros WHERE titulo = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $libro);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row['Estado'] !== 'Disponible') {
        $disponibilidad = false;
        break;
    }
    
    $stmt->close();
}

if ($disponibilidad) {
    foreach ($libros as $libro) {
        $query = "UPDATE libros SET Estado = 'Prestado' WHERE titulo = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $libro);
        $stmt->execute();
        $stmt->close();
    }
}

$conexion->close();

echo json_encode(['disponibilidad' => $disponibilidad]);
?>
