<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Lista de Clientes</h1>
        <hr>
        <a href="index.php?accion=guardarcliente" class="btn btn-primary mb-3">Crear Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Empresa</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cli): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cli->getId_cliente()); ?></td>
                    <td><?php echo htmlspecialchars($cli->getNombre_empresa()); ?></td>
                    <td><?php echo htmlspecialchars($cli->getCorreo()); ?></td>
                    <td><?php echo htmlspecialchars($cli->getTelefono()); ?></td>
                    <td><?php echo htmlspecialchars($cli->getDireccion()); ?></td>
                    <td><?php echo htmlspecialchars($cli->getFecha_creacion()); ?></td>
                    <td>
                        <a href="index.php?accion=modificarcliente&id_cliente=<?php echo htmlspecialchars($cli->getId_cliente()); ?>" class="btn btn-warning btn-sm">Modificar</a>
                        <a href="index.php?accion=borrarcliente&id_cliente=<?php echo htmlspecialchars($cli->getId_cliente()); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de borrar este cliente?');">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>