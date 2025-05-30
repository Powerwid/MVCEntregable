<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Crear Proyecto</h1>
        <hr>
        <form action="index.php?accion=guardarproyectos" method="post" class="row g-3">
            <div class="col-md-6">
                <input type="number" name="txtIdCliente" class="form-control" placeholder="ID Cliente" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtNombreProyecto" class="form-control" placeholder="Nombre Proyecto" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtDescripcion" class="form-control" placeholder="Descripción" required>
            </div>
            <div class="col-md-6">
                <input type="date" name="txtFechaInicio" class="form-control" required>
            </div>
            <div class="col-md-6">
                <input type="date" name="txtFechaFin" class="form-control" required>
            </div>
            <div class="col-md-6">
                <select name="txtEstado" class="form-control" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="en_progreso">En Progreso</option>
                    <option value="completado">Completado</option>
                </select>
            </div>
            <div class="col-12">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>