<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Asignación de Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Modificar Asignación de Proyecto</h1>
        <hr>
        <form action="index.php?accion=modificarasignacionesproyecto" method="post" class="row g-3">
            <input type="hidden" name="txtIdAsignacion" value="<?php echo htmlspecialchars($asignacion->getId_asignacion()); ?>">
            <div class="col-md-6">
                <input type="number" name="txtIdUsuario" class="form-control" placeholder="ID Usuario" value="<?php echo htmlspecialchars($asignacion->getId_usuario()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="number" name="txtIdProyecto" class="form-control" placeholder="ID Proyecto" value="<?php echo htmlspecialchars($asignacion->getId_proyecto()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtRolEnProyecto" class="form-control" placeholder="Rol en Proyecto" value="<?php echo htmlspecialchars($asignacion->getRol_en_proyecto()); ?>" required>
            </div>
            <div class="col-12">
                <input type="submit" value="Modificar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>