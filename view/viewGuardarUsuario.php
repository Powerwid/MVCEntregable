<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php 
        session_start();
        if (isset($_SESSION['correo'])) {
            include 'menu.php';
        }
        ?>
        <h1 class="mb-4">Crear Usuario</h1>
        <hr>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="index.php?accion=guardarusuario" method="post" class="row g-3">
            <div class="col-md-6">
                <input type="email" name="txtCorreo" class="form-control" placeholder="Correo" required>
            </div>
            <div class="col-md-6">
                <input type="password" name="txtContrasena" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtNombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtApellido" class="form-control" placeholder="Apellido" required>
            </div>
            <div class="col-md-6">
                <select name="txtRol" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="empleado">Empleado</option>
                </select>
            </div>
            <div class="col-12">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>