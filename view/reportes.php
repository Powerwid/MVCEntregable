<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .section {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <h1>Reportes</h1>
    <?php
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: ../index.php?accion=login");
        exit();
    }
    ?>

    <h2>Opciones</h2>
    <ul>
        <li><a href="../index.php">Volver al Inicio</a></li>
        <li><a href="../index.php?accion=logout">Cerrar Sesión</a></li>
    </ul>

    <!-- Reporte de Proyectos por Cliente -->
    <div class="section">
        <h2>Proyectos por Cliente</h2>
        <form method="POST" action="./index.php?accion=proyectosPorCliente">
            <label>ID Cliente: <input type="number" name="id_cliente" required></label><br>
            <input type="hidden" name="action" value="proyectosPorCliente">
            <button type="submit">Generar Reporte</button>
        </form>
        <?php if (!empty($proyectos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Proyecto</th>
                        <th>Nombre Proyecto</th>
                        <th>Nombre Cliente</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos as $proyecto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($proyecto['id_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['nombre_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['nombre_cliente'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['fecha_inicio'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['fecha_fin'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['estado'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>No se encontraron proyectos para el cliente especificado.</p>
        <?php endif; ?>
    </div>

    <!-- Reporte de Asignaciones por Usuario -->
    <div class="section">
        <h2>Asignaciones por Usuario</h2>
        <form method="POST" action="./index.php?accion=asignacionesPorUsuario">
            <label>ID Usuario: <input type="number" name="id_usuario" required></label><br>
            <input type="hidden" name="action" value="asignacionesPorUsuario">
            <button type="submit">Generar Reporte</button>
        </form>
        <?php if (!empty($asignaciones)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Proyecto</th>
                        <th>Nombre Proyecto</th>
                        <th>Nombre Usuario</th>
                        <th>Rol en Proyecto</th>
                        <th>Fecha Asignación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asignaciones as $asignacion): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($asignacion['id_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['nombre_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['nombre_usuario'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['rol_en_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($asignacion['fecha_asignacion'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>No se encontraron asignaciones para el usuario especificado.</p>
        <?php endif; ?>
    </div>

    <!-- Reporte de Proyectos por Rango de Fechas -->
    <div class="section">
        <h2>Proyectos por Rango de Fechas</h2>
        <form method="POST" action="./index.php?accion=proyectosPorRangoFechas">
            <label>Fecha Inicio: <input type="date" name="fecha_inicio" required></label><br>
            <label>Fecha Fin: <input type="date" name="fecha_fin" required></label><br>
            <input type="hidden" name="action" value="proyectosPorRangoFechas">
            <button type="submit">Generar Reporte</button>
        </form>
        <?php if (!empty($proyectosRango)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Proyecto</th>
                        <th>Nombre Proyecto</th>
                        <th>Nombre Cliente</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectosRango as $proyecto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($proyecto['id_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['nombre_proyecto'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['nombre_cliente'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['fecha_inicio'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['fecha_fin'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($proyecto['estado'] ?? ''); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <p>No se encontraron proyectos en el rango de fechas especificado.</p>
        <?php endif; ?>
    </div>
</body>
</html>