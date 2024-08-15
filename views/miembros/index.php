<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Miembros</title>
</head>
<body>
    <h1>Lista de Miembros</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Fecha de Suscripción</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($miembros)): ?>
            <?php foreach ($miembros as $miembro): ?>
                <tr>
                    <td><?php echo $miembro['miembro_id']; ?></td>
                    <td><?php echo $miembro['nombre']; ?></td>
                    <td><?php echo $miembro['apellido']; ?></td>
                    <td><?php echo $miembro['email']; ?></td>
                    <td><?php echo $miembro['fecha_suscripcion']; ?></td>
                    <td>
                        <a href="MiembrosController.php?action=show&id=<?php echo $miembro['miembro_id']; ?>">Ver</a>
                        <a href="MiembrosController.php?action=edit&id=<?php echo $miembro['miembro_id']; ?>">Editar</a>
                        <a href="MiembrosController.php?action=delete&id=<?php echo $miembro['miembro_id']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar este miembro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No se encontraron miembros.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="MiembrosController.php?action=create">Agregar Nuevo Miembro</a>
</body>
</html>
