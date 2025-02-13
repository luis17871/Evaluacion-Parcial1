<?php
require_once('../config/database.php');

class Miembros
{
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM miembros";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($miembro_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM miembros WHERE miembro_id=$miembro_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $email, $fecha_suscripcion)
    {
        $con = null;
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();

            $stmt = $con->prepare("INSERT INTO miembros (nombre, apellido, email, fecha_suscripcion) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nombre, $apellido, $email, $fecha_suscripcion);

            if ($stmt->execute()) {
                $insert_id = $stmt->insert_id;
                return $insert_id;
            } else {
                return $stmt->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            if ($stmt) {
                $stmt->close();
            }
            if ($con) {
                $con->close();
            }
        }
    }

    public function actualizar($miembro_id, $nombre, $apellido, $email, $fecha_suscripcion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE miembros SET nombre='$nombre', apellido='$apellido', email='$email', fecha_suscripcion='$fecha_suscripcion' WHERE miembro_id = $miembro_id";
            if (mysqli_query($con, $cadena)) {
                return $miembro_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($miembro_id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM miembros WHERE miembro_id = $miembro_id";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
