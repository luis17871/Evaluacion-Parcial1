<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
</head>
<body>
    <h1>Editar Libro</h1>
    <form action="LibrosController.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="libro_id" value="<?php echo $libro['libro_id']; ?>">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo $libro['titulo']; ?>" required>
        <br>
        <label>Autor:</label>
        <input type="text" name="autor" value="<?php echo $libro['autor']; ?>" required>
        <br>
        <label>Género:</label>
        <input type="text" name="genero" value="<?php echo $libro['genero']; ?>" required>
        <br>
        <label>Año de Publicación:</label>
        <input type="number" name="anio_publicacion" value="<?php echo $libro['anio_publicacion']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="LibrosController.php">Cancelar</a>
</body>
</html>
