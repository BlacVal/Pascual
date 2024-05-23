<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register_db";

// Crear conexión a la base de datos
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Manejo de las operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        $libro = $_POST['libro'];
        $estado = $_POST['estado'];

        $stmt = $mysqli->prepare("INSERT INTO libros (libro, Estado) VALUES (?, ?)");
        $stmt->bind_param("ss", $libro, $estado);
        $stmt->execute();
        $stmt->close();
    } elseif ($_POST['action'] == 'update') {
        $id = $_POST['id'];
        $libro = $_POST['libro'];
        $estado = $_POST['estado'];

        $stmt = $mysqli->prepare("UPDATE libros SET libro=?, Estado=? WHERE id=?");
        $stmt->bind_param("ssi", $libro, $estado, $id);
        $stmt->execute();
        $stmt->close();
    } elseif ($_POST['action'] == 'delete') {
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM libros WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Consulta para seleccionar todos los registros de la tabla 'libros'
$query = "SELECT id, libro, Estado FROM libros";
$resultados = [];

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $resultados[] = $row;
    }
    $result->free();
}

// Cerrar conexión
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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
                        <th>Imagen</th>
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
                                <form action="" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit">Borrar</button>
                                </form>
                                <button onclick="editBook(<?php echo htmlspecialchars(json_encode($row)); ?>)">Editar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
    </div>
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
