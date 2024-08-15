<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/libro.modelo.php');
error_reporting(0);
$libros = new Libros;

switch ($_GET["op"]) {

    // Procedimiento para cargar todos los libros
    case 'todos':
        $datos = array();
        $datos = $libros->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    // Procedimiento para obtener un libro específico
    case 'uno':
        $libro_id = $_POST["libro_id"];
        $datos = array();
        $datos = $libros->uno($libro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    // Procedimiento para insertar un libro en la base de datos
    case 'insertar':
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $genero = $_POST["genero"];
        $anio_publicacion = $_POST["anio_publicacion"];

        $datos = array();
        $datos = $libros->insertar($titulo, $autor, $genero, $anio_publicacion);
        echo json_encode($datos);
        break;

    // Procedimiento para actualizar un libro en la base de datos
    case 'actualizar':
        $libro_id = $_POST["libro_id"];
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $genero = $_POST["genero"];
        $anio_publicacion = $_POST["anio_publicacion"];
        
        $datos = array();
        $datos = $libros->actualizar($libro_id, $titulo, $autor, $genero, $anio_publicacion);
        echo json_encode($datos);
        break;

    // Procedimiento para eliminar un libro en la base de datos
    case 'eliminar':
        $libro_id = $_POST["libro_id"];
        $datos = array();
        $datos = $libros->eliminar($libro_id);
        echo json_encode($datos);
        break;
}
?>
