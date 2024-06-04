<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = 'user'; // Default role if not set
}

include 'conexion_be.php'; // Asegúrate de incluir el archivo de conexión a la base de datos

// Manejo de las operaciones CRUD para admin
if ($_SESSION['role'] == 'admin' && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        $libro = $_POST['libro'];
        $estado = $_POST['estado'];

        $stmt = $conexion->prepare("INSERT INTO libros (libro, Estado) VALUES (?, ?)");
        $stmt->bind_param("ss", $libro, $estado);
        $stmt->execute();
        $stmt->close();
    } elseif ($_POST['action'] == 'update') {
        $id = $_POST['id'];
        $libro = $_POST['libro'];
        $estado = $_POST['estado'];

        $stmt = $conexion->prepare("UPDATE libros SET libro=?, Estado=? WHERE id=?");
        $stmt->bind_param("ssi", $libro, $estado, $id);
        $stmt->execute();
        $stmt->close();
    } elseif ($_POST['action'] == 'delete') {
        $id = $_POST['id'];

        $stmt = $conexion->prepare("DELETE FROM libros WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    } elseif ($_POST['action'] == 'prestar') {
        $id = $_POST['id'];

        $stmt = $conexion->prepare("UPDATE libros SET Estado='Prestado' WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    } elseif ($_POST['action'] == 'devolver') {
        $id = $_POST['id'];

        $stmt = $conexion->prepare("UPDATE libros SET Estado='Disponible' WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Consulta para seleccionar todos los registros de la tabla 'libros'
$query = "SELECT id, libro, Estado FROM libros";
$resultados = [];

if ($result = $conexion->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $resultados[] = $row;
    }
    $result->free();
}
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link rel="stylesheet" href="/assets/css/libros.css">
</head>
<body>
<nav>
        <div class="nav-logo">

        </div>
        <ul class="nav-links">
        <li class="link"><a href="/inicio.php">Home</a></li>
        <li id="link1" class="link"><a href="/php/buscar_libros.php">books</a></li>
        <li id="link2" class="link"><a href="/php/libro.php">loans</a></li>
        <li id="link3" class="link"><a href="#">About</a></li>
    </ul>
    </nav>
    <div class="container">
        <h1>Buscar Libros</h1>
        <form action="" method="get">
            <input type="text" name="q" placeholder="Buscar libros">
            <button type="submit">Buscar</button>
        </form>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libro</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $row): ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["libro"]; ?></td>
                            <td><?php echo $row["Estado"]; ?></td>
                            <td>
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <form action="" method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="action" value="delete">
                                        <button type="submit">Borrar</button>
                                    </form>
                                    <button onclick="editBook(<?php echo htmlspecialchars(json_encode($row)); ?>)">Editar</button>
                                <?php endif; ?>
                                <form action="" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="prestar">
                                    <button type="submit">Prestar</button>
                                </form>
                                <form action="" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="devolver">
                                    <button type="submit">Devolver</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if ($_SESSION['role'] == 'admin'): ?>
        <div>
            <h2>Agregar/Actualizar Libro</h2>
            <form action="" method="post">
                <input type="hidden" name="id" id="book-id">
                <input type="hidden" name="action" id="form-action" value="add">
                <label for="libro">Libro:</label>
                <input type="text" name="libro" id="libro">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado">
                <button type="submit">Guardar</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
<script src="/assets/js/libros.js"></script>
<script>
    function editBook(book) {
        document.getElementById('book-id').value = book.id;
        document.getElementById('libro').value = book.libro;
        document.getElementById('estado').value = book.Estado;
        document.getElementById('form-action').value = 'update';
    }
</script>
</body>
</html>
