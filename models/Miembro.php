<?php
class Miembro {
    private $conn;
    private $table = 'Miembros';

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
        $query = "INSERT INTO " . $this->table . " (nombre, apellido, email, fecha_suscripcion) VALUES (:nombre, :apellido, :email, :fecha_suscripcion)";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->fecha_suscripcion = htmlspecialchars(strip_tags($this->fecha_suscripcion));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':fecha_suscripcion', $this->fecha_suscripcion);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET nombre = :nombre, apellido = :apellido, email = :email, fecha_suscripcion = :fecha_suscripcion WHERE miembro_id = :miembro_id";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->fecha_suscripcion = htmlspecialchars(strip_tags($this->fecha_suscripcion));
        $this->miembro_id = htmlspecialchars(strip_tags($this->miembro_id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':fecha_suscripcion', $this->fecha_suscripcion);
        $stmt->bindParam(':miembro_id', $this->miembro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE miembro_id = :miembro_id";
        $stmt = $this->conn->prepare($query);

        $this->miembro_id = htmlspecialchars(strip_tags($this->miembro_id));

        $stmt->bindParam(':miembro_id', $this->miembro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
