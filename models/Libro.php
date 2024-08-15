<?php
class Libro {
    private $conn;
    private $table = 'Libros';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (titulo, autor, genero, anio_publicacion) VALUES (:titulo, :autor, :genero, :anio_publicacion)";
        $stmt = $this->conn->prepare($query);

        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->autor = htmlspecialchars(strip_tags($this->autor));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->anio_publicacion = htmlspecialchars(strip_tags($this->anio_publicacion));

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':anio_publicacion', $this->anio_publicacion);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET titulo = :titulo, autor = :autor, genero = :genero, anio_publicacion = :anio_publicacion WHERE libro_id = :libro_id";
        $stmt = $this->conn->prepare($query);

        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->autor = htmlspecialchars(strip_tags($this->autor));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->anio_publicacion = htmlspecialchars(strip_tags($this->anio_publicacion));
        $this->libro_id = htmlspecialchars(strip_tags($this->libro_id));

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':anio_publicacion', $this->anio_publicacion);
        $stmt->bindParam(':libro_id', $this->libro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE libro_id = :libro_id";
        $stmt = $this->conn->prepare($query);

        $this->libro_id = htmlspecialchars(strip_tags($this->libro_id));

        $stmt->bindParam(':libro_id', $this->libro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
