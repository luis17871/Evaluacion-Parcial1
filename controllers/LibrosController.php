<?php
include_once '../config/Database.php';
include_once '../models/Libro.php';

class LibrosController {
    private $libro;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->libro = new Libro($db);
    }

    public function index() {
        $stmt = $this->libro->read();
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once '../views/libros/index.php';
    }

    public function create($data) {
        $this->libro->titulo = $data['titulo'];
        $this->libro->autor = $data['autor'];
        $this->libro->genero = $data['genero'];
        $this->libro->anio_publicacion = $data['anio_publicacion'];

        if ($this->libro->create()) {
            header('Location: /gestion_biblioteca/controllers/LibrosController.php');
        } else {
            echo "Error al crear el libro.";
        }
    }

    public function edit($id) {
        $this->libro->libro_id = $id;
        $stmt = $this->libro->read();
        $libro = $stmt->fetch(PDO::FETCH_ASSOC);
        include_once '../views/libros/edit.php';
    }

    public function update($data) {
        $this->libro->libro_id = $data['libro_id'];
        $this->libro->titulo = $data['titulo'];
        $this->libro->autor = $data['autor'];
        $this->libro->genero = $data['genero'];
        $this->libro->anio_publicacion = $data['anio_publicacion'];

        if ($this->libro->update()) {
            header('Location: /gestion_biblioteca/controllers/LibrosController.php');
        } else {
            echo "Error al actualizar el libro.";
        }
    }

    public function delete($id) {
        $this->libro->libro_id = $id;

        if ($this->libro->delete()) {
            header('Location: /gestion_biblioteca/controllers/LibrosController.php');
        } else {
            echo "Error al eliminar el libro.";
        }
    }

    public function show($id) {
        $this->libro->libro_id = $id;
        $stmt = $this->libro->read();
        $libro = $stmt->fetch(PDO::FETCH_ASSOC);
        include_once '../views/libros/show.php';
    }
}

// Ejecución del controlador
$controller = new LibrosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'create') {
        $controller->create($_POST);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        $controller->update($_POST);
    }
} elseif (isset($_GET['action'])) {
    if ($_GET['action'] === 'delete') {
        $controller->delete($_GET['id']);
    } elseif ($_GET['action'] === 'edit') {
        $controller->edit($_GET['id']);
    } elseif ($_GET['action'] === 'show') {
        $controller->show($_GET['id']);
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>