<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Miembro</title>
</head>
<body>
    <h1>Agregar Miembro</h1>
    <form action="MiembrosController.php" method="post">
        <input type="hidden" name="action" value="create">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Apellido:</label>
        <input type="text" name="apellido" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Fecha de Suscripción:</label>
        <input type="date" name="fecha_suscripcion" required>
        <br>
        <input type="submit" value="Guardar">
    </form>
    <a href="MiembrosController.php">Cancelar</a>
</body>
</html>

