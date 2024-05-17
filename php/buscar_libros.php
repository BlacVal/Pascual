<?php
// Directorio donde se encuentran los libros
$directorio_libros = './libros';

// Array asociativo para almacenar los libros y su estado (prestado o disponible)
$libros_disponibles = array();

// Verificar si el directorio de libros existe
if (is_dir($directorio_libros)) {
    // Escanear el directorio de libros y obtener los nombres de los archivos
    $archivos_libros = scandir($directorio_libros);

    // Recorrer los archivos encontrados
    foreach ($archivos_libros as $archivo) {
        // Excluir directorios y archivos ocultos
        if ($archivo !== '.' && $archivo !== '..') {
            // Agregar el nombre del archivo como clave y su estado como valor al array de libros disponibles
            $libros_disponibles[pathinfo($archivo, PATHINFO_FILENAME)] = "Disponible";
        }
    }
}

// Verificar si se ha enviado una consulta de búsqueda
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    // Filtrar los libros disponibles que coincidan con la consulta
    $resultados = array_filter($libros_disponibles, function($libro) use ($query) {
        return strpos(strtolower($libro), strtolower($query)) !== false;
    });
} else {
    // Si no hay consulta de búsqueda, mostrar todos los libros disponibles
    $resultados = $libros_disponibles;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/libros.css">
    <title>Buscar Libros</title>
</head>
<body>
    <div class="container">
        <div class="info-box">
            <h1>Lista de Libros Disponibles</h1>
            <form class="search-form" action="" method="get">
                <input type="text" name="q" placeholder="Buscar libros">
                <button type="submit">Buscar</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Libro</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $libro => $estado): ?>
                        <tr>
                            <td><?php echo $libro; ?></td>
                            <td><?php echo $estado; ?></td>
                            <td>
                                <a href="#">Prestar</a> |
                                <a href="#">Devolver</a> |
                                <a href="#">Descargar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>Developed by the XXX work team</p>
    </footer>
    <script src="/assets/js/libros.js"></script> <!-- Archivo JavaScript para la interactividad -->
</body>
</html>
