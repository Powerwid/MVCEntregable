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
    <title>Crear Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <?php include 'menu.php'; ?>
        <h1 class="mb-4">Crear Cliente</h1>
        <hr>
        <form action="index.php?accion=guardarcliente" method="post" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="txtNombreEmpresa" class="form-control" placeholder="Nombre Empresa" required>
            </div>
            <div class="col-md-6">
                <input type="email" name="txtCorreo" class="form-control" placeholder="Correo" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtTelefono" class="form-control" placeholder="Teléfono" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="txtDireccion" class="form-control" placeholder="Dirección" required>
            </div>
            <div class="col-12">
                <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>