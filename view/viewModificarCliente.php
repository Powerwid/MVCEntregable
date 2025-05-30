<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Modificar Cliente</h1>
        <hr>
        <form action="index.php?accion=modificarcliente" method="post" class="row g-3">
            <input type="hidden" name="txtIdCliente" value="<?php echo htmlspecialchars($cliente->getId_cliente()); ?>">
            <div class="col-md-6">
                <input type="text" name="txtNombreEmpresa" class="form-control" placeholder="Nombre Empresa" value="<?php echo htmlspecialchars($cliente->getNombre_empresa()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="email" name="txtCorreo" class="form-control" placeholder="Correo" value="<?php echo htmlspecialchars($cliente->getCorreo()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtTelefono" class="form-control" placeholder="Teléfono" value="<?php echo htmlspecialchars($cliente->getTelefono()); ?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtDireccion" class="form-control" placeholder="Dirección" value="<?php echo htmlspecialchars($cliente->getDireccion()); ?>" required>
            </div>
            <div class="col-12">
                <input type="submit" value="Modificar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>