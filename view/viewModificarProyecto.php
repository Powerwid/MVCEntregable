<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Modificar Proyecto</h1>
        <hr>
        <form action="index.php?accion=modificarproyectos" method="post" class="row g-3">
            <input type="hidden" name="txtIdProyecto" value="<?php echo htmlspecialchars($proyecto->getId_proyecto()); ?>">
            <div class="col-md-6">
                <input type="number" name="txtIdCliente" class="form-control" placeholder="ID Cliente" value="<?php echo htmlspecialchars($proyecto->getId_cliente()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtNombreProyecto" class="form-control" placeholder="Nombre Proyecto" value="<?php echo htmlspecialchars($proyecto->getNombre_proyecto()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtDescripcion" class="form-control" placeholder="Descripción" value="<?php echo htmlspecialchars($proyecto->getDescripcion()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="date" name="txtFechaInicio" class="form-control" value="<?php echo htmlspecialchars($proyecto->getFecha_inicio()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="date" name="txtFechaFin" class="form-control" value="<?php echo htmlspecialchars($proyecto->getFecha_fin()); ?>" required>
            </div>
            <div class="col-md-6">
                <select name="txtEstado" class="form-control" required>
                    <option value="pendiente" <?php echo $proyecto->getEstado() == 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                    <option value="en_progreso" <?php echo $proyecto->getEstado() == 'en_progreso' ? 'selected' : ''; ?>>En Progreso</option>
                    <option value="completado" <?php echo $proyecto->getEstado() == 'completado' ? 'selected' : ''; ?>>Completado</option>
                </select>
            </div>
            <div class="col-12">
                <input type="submit" value="Modificar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>