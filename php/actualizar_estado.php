<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

include './conexion_be.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['Estado'])) {
    $id = $_POST['id'];
    $estado = $_POST['Estado'];

    $query = "UPDATE libros SET Estado = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("si", $estado, $id);

    if ($stmt->execute()) {
        header("Location: buscar_libros.php?q=" . urlencode($_GET['q']));
    } else {
        echo "Error al actualizar el estado del libro.";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Datos inválidos.";
}
?>
