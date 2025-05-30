<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Asignación de Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Guardar Asignación de Proyecto</h1>
        <hr>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'duplicado') {
            echo '<div class="alert alert-danger">Error: La combinación de usuario y proyecto ya existe. No se puede duplicar.</div>';
        }
        ?>
        <form method="POST" action="index.php?accion=guardarasignacionesproyecto">
            <div class="mb-3">
                <label for="txtIdUsuario" class="form-label">ID Usuario</label>
                <input type="number" class="form-control" id="txtIdUsuario" name="txtIdUsuario" required>
            </div>
            <div class="mb-3">
                <label for="txtIdProyecto" class="form-label">ID Proyecto</label>
                <input type="number" class="form-control" id="txtIdProyecto" name="txtIdProyecto" required>
            </div>
            <div class="mb-3">
                <label for="txtRolEnProyecto" class="form-label">Rol en Proyecto</label>
                <input type="text" class="form-control" id="txtRolEnProyecto" name="txtRolEnProyecto" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?accion=cargarasignacionesproyecto" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>