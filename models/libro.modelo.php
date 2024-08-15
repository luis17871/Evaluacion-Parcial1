<?php
require_once('../config/database.php');

class Libros
{
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM libros";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($libro_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM libros WHERE libro_id=$libro_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($titulo, $autor, $genero, $anio_publicacion)
    {
        $con = null;
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            
            $stmt = $con->prepare("INSERT INTO libros (titulo, autor, genero, anio_publicacion) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $titulo, $autor, $genero, $anio_publicacion);
            
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

    public function actualizar($libro_id, $titulo, $autor, $genero, $anio_publicacion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE libros SET titulo='$titulo', autor='$autor', genero='$genero', anio_publicacion=$anio_publicacion WHERE libro_id = $libro_id";
            if (mysqli_query($con, $cadena)) {
                return $libro_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($libro_id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM libros WHERE libro_id= $libro_id";
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
?>
