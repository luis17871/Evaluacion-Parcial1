<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Miembro</title>
</head>
<body>
    <h1>Detalles del Miembro</h1>

    <p><strong>ID:</strong> <?php echo $miembro['miembro_id']; ?></p>
    <p><strong>Nombre:</strong> <?php echo $miembro['nombre']; ?></p>
    <p><strong>Apellido:</strong> <?php echo $miembro['apellido']; ?></p>
    <p><strong>Email:</strong> <?php echo $miembro['email']; ?></p>
    <p><strong>Fecha de Suscripción:</strong> <?php echo $miembro['fecha_suscripcion']; ?></p>

    <a href="MiembrosController.php?action=edit&id=<?php echo $miembro['miembro_id']; ?>">Editar</a>
    <a href="MiembrosController.php?action=delete&id=<?php echo $miembro['miembro_id']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar este miembro?');">Eliminar</a>
    <br><br>
    <a href="MiembrosController.php">Volver a la lista de miembros</a>
</body>
</html>
