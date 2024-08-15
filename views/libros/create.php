<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
</head>
<body>
    <h1>Agregar Libro</h1>
    <form action="LibrosController.php" method="post">
        <input type="hidden" name="action" value="create">
        <label>Título:</label>
        <input type="text" name="titulo" required>
        <br>
        <label>Autor:</label>
        <input type="text" name="autor" required>
        <br>
        <label>Género:</label>
        <input type="text" name="genero" required>
        <br>
        <label>Año de Publicación:</label>
        <input type="number" name="anio_publicacion" required>
        <br>
        <input type="submit" value="Guardar">
    </form>
    <a href="LibrosController.php">Cancelar</a>
</body>
</html>
