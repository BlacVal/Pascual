<?php
$libro = $_GET['libro'];

// Lógica para obtener el contenido del libro y la ruta del archivo PDF según el parámetro pasado

switch ($libro) {
    case 'matematicas10':
        $titulo = 'Matemáticas 10°';
        $contenido = 'Contenido del libro de Matemáticas 10°...';
        $archivo = "./libros/Matematicas10.pdf";
        break;
    case 'matematicas11':
        $titulo = 'Matemáticas 11°';
        $contenido = 'Contenido del libro de Matemáticas 11°...';
        $archivo = "./libros/Matematicas11.pdf";
        break;
        case 'matematicas11':
            $titulo = 'Matemáticas 11°';
            $contenido = 'Contenido del libro de Matemáticas 11°...';
            $archivo = "./libros/HTML Y CSS.PDF";
            break;
    // Agrega más casos según sea necesario
}

// Mostrar el título y el contenido del libro
echo "<h2>{$titulo}</h2>";
echo "<p>{$contenido}</p>";

// Mostrar el PDF en la página
echo "<embed src='{$archivo}' width='100%' height='600px' type='application/pdf'>";
?>
