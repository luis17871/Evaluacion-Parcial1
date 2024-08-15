<?php
include_once '../config/Database.php';
include_once '../models/Miembro.php';

class MiembrosController {
    private $miembro;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->miembro = new Miembro($db);
    }

    public function index() {
        $stmt = $this->miembro->read();
        $miembros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once '../views/miembros/index.php';
    }
    
    

    public function create($data = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesa la creación del miembro
            $this->miembro->nombre = $data['nombre'];
            $this->miembro->apellido = $data['apellido'];
            $this->miembro->email = $data['email'];
            $this->miembro->fecha_suscripcion = $data['fecha_suscripcion'];

            if ($this->miembro->create()) {
                header('Location: /gestion_biblioteca/controllers/MiembrosController.php');
            } else {
                echo "Error al crear el miembro.";
            }
        } else {
            // Muestra el formulario de creación
            include_once '../views/miembros/create.php';
        }
    }

    public function edit($id) {
        $this->miembro->miembro_id = $id;
        $stmt = $this->miembro->read();
        $miembro = $stmt->fetch(PDO::FETCH_ASSOC);
        include_once '../views/miembros/edit.php';
    }

    public function update($data) {
        $this->miembro->miembro_id = $data['miembro_id'];
        $this->miembro->nombre = $data['nombre'];
        $this->miembro->apellido = $data['apellido'];
        $this->miembro->email = $data['email'];
        $this->miembro->fecha_suscripcion = $data['fecha_suscripcion'];

        if ($this->miembro->update()) {
            header('Location: /gestion_biblioteca/controllers/MiembrosController.php');
        } else {
            echo "Error al actualizar el miembro.";
        }
    }

    public function delete($id) {
        $this->miembro->miembro_id = $id;

        if ($this->miembro->delete()) {
            header('Location: /gestion_biblioteca/controllers/MiembrosController.php');
        } else {
            echo "Error al eliminar el miembro.";
        }
    }

    public function show($id) {
        $this->miembro->miembro_id = $id;
        $stmt = $this->miembro->read();
        $miembro = $stmt->fetch(PDO::FETCH_ASSOC);
        include_once '../views/miembros/show.php';
    }
}

// Ejecución del controlador
$controller = new MiembrosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $controller->create($_POST);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $controller->update($_POST);
    }
} elseif (isset($_GET['action'])) {
    if ($_GET['action'] === 'create') {
        $controller->create();
    } elseif ($_GET['action'] === 'edit') {
        $controller->edit($_GET['id']);
    } elseif ($_GET['action'] === 'delete') {
        $controller->delete($_GET['id']);
    } elseif ($_GET['action'] === 'show') {
        $controller->show($_GET['id']);
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>
