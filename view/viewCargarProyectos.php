<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Lista de Proyectos</h1>
        <hr>
        <a href="index.php?accion=guardarproyectos" class="btn btn-primary mb-3">Crear Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Cliente</th>
                    <th>Nombre Proyecto</th>
                    <th>Descripción</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyectos as $proy): ?>
                <tr>
                    <td><?php echo htmlspecialchars($proy->getId_proyecto()); ?></td>
                    <td><?php echo htmlspecialchars($proy->getId_cliente()); ?></td>
                    <td><?php echo htmlspecialchars($proy->getNombre_proyecto()); ?></td>
                    <td><?php echo htmlspecialchars($proy->getDescripcion()); ?></td>
                    <td><?php echo htmlspecialchars($proy->getFecha_inicio()); ?></td>
                    <td><?php echo htmlspecialchars($proy->getFecha_fin()); ?></td>
                    <td><?php echo htmlspecialchars($proy->getEstado()); ?></td>
                    <td><?php echo htmlspecialchars($proy->getFecha_creacion()); ?></td>
                    <td>
                        <a href="index.php?accion=modificarproyectos&id_proyecto=<?php echo htmlspecialchars($proy->getId_proyecto()); ?>" class="btn btn-warning btn-sm">Modificar</a>
                        <a href="index.php?accion=borrarproyectos&id_proyecto=<?php echo htmlspecialchars($proy->getId_proyecto()); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de borrar este proyecto?');">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
