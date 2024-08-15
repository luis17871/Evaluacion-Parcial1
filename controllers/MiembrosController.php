<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/Miembro.php');
error_reporting(0);
$miembros = new Miembros;

switch ($_GET["op"]) {

    // Procedimiento para cargar todos los miembros
    case 'todos':
        $datos = array();
        $datos = $miembros->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    // Procedimiento para obtener un miembro específico
    case 'uno':
        $miembro_id = $_POST["miembro_id"];
        $datos = array();
        $datos = $miembros->uno($miembro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    // Procedimiento para insertar un nuevo miembro en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $fecha_suscripcion = $_POST["fecha_suscripcion"];

        $datos = array();
        $datos = $miembros->insertar($nombre, $apellido, $email, $fecha_suscripcion);
        echo json_encode($datos);
        break;

    // Procedimiento para actualizar un miembro en la base de datos
    case 'actualizar':
        $miembro_id = $_POST["miembro_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $fecha_suscripcion = $_POST["fecha_suscripcion"];

        $datos = array();
        $datos = $miembros->actualizar($miembro_id, $nombre, $apellido, $email, $fecha_suscripcion);
        echo json_encode($datos);
        break;

    // Procedimiento para eliminar un miembro de la base de datos
    case 'eliminar':
        $miembro_id = $_POST["miembro_id"];
        $datos = array();
        $datos = $miembros->eliminar($miembro_id);
        echo json_encode($datos);
        break;
}
?>
