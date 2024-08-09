<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libros";

// Datos recibidos del frontend
$data = json_decode(file_get_contents('php://input'), true);
$libros = $data['libros'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Bandera para verificar si todos los libros están disponibles
$pedido_procesado = true;

// Iniciar transacción
$conn->begin_transaction();

try {
    // Preparar consultas
    $stmt_select = $conn->prepare("SELECT id FROM libros WHERE titulo = ? AND estado = 'disponible' FOR UPDATE");
    $stmt_update = $conn->prepare("UPDATE libros SET estado = 'prestado' WHERE id = ?");
    $stmt_insert = $conn->prepare("INSERT INTO prestamos (id_libro, fecha_prestamo) VALUES (?, ?)");

    $fecha_prestamo = date('Y-m-d'); // Fecha actual

    // Verificar disponibilidad de cada libro y actualizar estado
    foreach ($libros as $libro) {
        // Consulta para verificar disponibilidad
        $stmt_select->bind_param("s", $libro);
        $stmt_select->execute();
        $result = $stmt_select->get_result();

        if ($result->num_rows > 0) {
            // El libro está disponible, actualizar estado a 'prestado'
            $row = $result->fetch_assoc();
            $id_libro = $row['id'];

            $stmt_update->bind_param("i", $id_libro);
            $stmt_update->execute();

            // Registrar préstamo en la tabla 'prestamos'
            $stmt_insert->bind_param("is", $id_libro, $fecha_prestamo);
            $stmt_insert->execute();
        } else {
            // Al menos un libro no está disponible
            $pedido_procesado = false;
            break;
        }
    }

    // Confirmar transacción si todos los libros están disponibles
    if ($pedido_procesado) {
        $conn->commit();
        echo json_encode(array('disponible' => true));
    } else {
        $conn->rollback();
        echo json_encode(array('disponible' => false));
    }
} catch (Exception $e) {
    // Revertir transacción en caso de error
    $conn->rollback();
    echo json_encode(array('error' => $e->getMessage()));
}

// Cerrar conexiones y liberar recursos
$stmt_select->close();
$stmt_update->close();
$stmt_insert->close();
$conn->close();
?>
