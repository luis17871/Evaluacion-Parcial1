<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Libro</title>
</head>
<body>
    <h1>Detalles del Libro</h1>

    <p><strong>ID:</strong> <?php echo $libro['libro_id']; ?></p>
    <p><strong>Título:</strong> <?php echo $libro['titulo']; ?></p>
    <p><strong>Autor:</strong> <?php echo $libro['autor']; ?></p>
    <p><strong>Género:</strong> <?php echo $libro['genero']; ?></p>
    <p><strong>Año de Publicación:</strong> <?php echo $libro['anio_publicacion']; ?></p>

    <a href="LibrosController.php">Volver a la lista de libros</a>
    <a href="LibrosController.php?action=edit&id=<?php echo $libro['libro_id']; ?>">Editar</a>
    <a href="LibrosController.php?action=delete&id=<?php echo $libro['libro_id']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar este libro?');">Eliminar</a>
</body>
</html>
