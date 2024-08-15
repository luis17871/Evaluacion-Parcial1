<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Miembro</title>
</head>
<body>
    <h1>Editar Miembro</h1>
    <form action="MiembrosController.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="miembro_id" value="<?php echo $miembro['miembro_id']; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $miembro['nombre']; ?>" required>
        <br>
        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $miembro['apellido']; ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $miembro['email']; ?>" required>
        <br>
        <label>Fecha de Suscripción:</label>
        <input type="date" name="fecha_suscripcion" value="<?php echo $miembro['fecha_suscripcion']; ?>" required>
        <br>
        <input type="submit" value="Actualizar">
    </form>
    <a href="MiembrosController.php">Cancelar</a>
</body>
</html>
