<?php
// Añadir cabeceras para evitar caché
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Lista de Usuarios</h1>
        <hr>
        <a href="index.php?accion=guardarusuario" class="btn btn-primary mb-3">Crear Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usu): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usu->getId_usuario()); ?></td>
                    <td><?php echo htmlspecialchars($usu->getCorreo()); ?></td>
                    <td><?php echo htmlspecialchars($usu->getNombre()); ?></td>
                    <td><?php echo htmlspecialchars($usu->getApellido()); ?></td>
                    <td><?php echo htmlspecialchars($usu->getRol()); ?></td>
                    <td><?php echo htmlspecialchars($usu->getFecha_creacion()); ?></td>
                    <td>
                        <a href="index.php?accion=modificarusuario&id_usuario=<?php echo htmlspecialchars($usu->getId_usuario()); ?>" class="btn btn-warning btn-sm">Modificar</a>
                        <a href="index.php?accion=borrarusuario&id_usuario=<?php echo htmlspecialchars($usu->getId_usuario()); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de borrar este usuario?');">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>