<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asignaciones de Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Lista de Asignaciones de Proyecto</h1>
        <hr>
        <a href="index.php?accion=guardarasignacionesproyecto" class="btn btn-primary mb-3">Crear Nueva</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Usuario</th>
                    <th>ID Proyecto</th>
                    <th>Rol en Proyecto</th>
                    <th>Fecha Asignación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($asignaciones as $asig): ?>
                <tr>
                    <td><?php echo htmlspecialchars($asig->getId_asignacion()); ?></td>
                    <td><?php echo htmlspecialchars($asig->getId_usuario()); ?></td>
                    <td><?php echo htmlspecialchars($asig->getId_proyecto()); ?></td>
                    <td><?php echo htmlspecialchars($asig->getRol_en_proyecto()); ?></td>
                    <td><?php echo htmlspecialchars($asig->getFecha_asignacion()); ?></td>
                    <td>
                        <a href="index.php?accion=modificarasignacionesproyecto&id_asignacion=<?php echo htmlspecialchars($asig->getId_asignacion()); ?>" class="btn btn-warning btn-sm">Modificar</a>
                        <a href="index.php?accion=borrarasignacionesproyecto&id_asignacion=<?php echo htmlspecialchars($asig->getId_asignacion()); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de borrar esta asignación?');">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>