<?php
$libro = $_GET['libro'];

// Lógica para obtener el contenido del libro y la ruta del archivo PDF según el parámetro pasado

switch ($libro) {
    case 'Programación 11°':
        $titulo = 'Programación 11°';
        $contenido = 'Contenido del libro de HTML Y CSS 10°...';
        $archivo = "/libros/HTML Y CSS.pdf";
        break;
        case 'Programación 11°':
            $titulo = 'Programacion 11°';
            $contenido = 'Contenido del libro de JavaScript 10°...';
            $archivo = "/libros/javaScript.pdf";
            break;
            case 'Programación 11°':
                $titulo = 'Programacion 11°';
                $contenido = 'Contenido del libro de Logica y Diseño 11°...';
                $archivo = "/libros/Logica y Diseño.pdf";
                break;
                case 'Programación 11°':
                    $titulo = 'Programacion 11°';
                    $contenido = 'Contenido del libro de Bases de datos 11°...';
                    $archivo = "/libros/Bases-de-Datos.pdf";
                    break;
                    case 'Programación 11°':
                        $titulo = 'Programacion 11°';
                        $contenido = 'Contenido del libro de Servicios de backend y frontend 11°...';
                        $archivo = "/libros/Backend y frontend.pdf";
    // Agrega más casos según sea necesario
}

// Mostrar el título y el contenido del libro
echo "<h2>{$titulo}</h2>";
echo "<p>{$contenido}</p>";

// Mostrar el PDF en la página
echo "<embed src='{$archivo}' width='100%' height='600px' type='application/pdf'>";
?>
