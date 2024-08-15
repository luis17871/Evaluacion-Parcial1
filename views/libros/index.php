<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Libros</title>
</head>
<body>
    <h1>Lista de Libros</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Género</th>
            <th>Año de Publicación</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($libros)): ?>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?php echo $libro['libro_id']; ?></td>
                    <td><?php echo $libro['titulo']; ?></td>
                    <td><?php echo $libro['autor']; ?></td>
                    <td><?php echo $libro['genero']; ?></td>
                    <td><?php echo $libro['anio_publicacion']; ?></td>
                    <td>
                        <a href="LibrosController.php?action=show&id=<?php echo $libro['libro_id']; ?>">Ver</a>
                        <a href="LibrosController.php?action=edit&id=<?php echo $libro['libro_id']; ?>">Editar</a>
                        <a href="LibrosController.php?action=delete&id=<?php echo $libro['libro_id']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar este libro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No se encontraron libros.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="LibrosController.php?action=create">Agregar Nuevo Libro</a>
</body>
</html>
