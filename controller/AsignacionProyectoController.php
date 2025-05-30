<?php
require_once './model/Usuario/Auth.php';
require_once './model/AsignacionProyecto/AsignacionProyectoModel.php';
require_once './controller/ReporteController.php';

class AsignacionProyectoController {
    public function cargar() {
        Auth::verificarSesion();
        $model = new AsignacionProyectoModel();
        $asignaciones = $model->cargar();
        require_once './view/viewCargarAsignacionesProyecto.php';
    }

    public function guardar() {
        Auth::verificarSesion();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new AsignacionProyectoModel();
            $asignacion = new AsignacionProyecto();
            $asignacion->setId_usuario($_POST['txtIdUsuario']);
            $asignacion->setId_proyecto($_POST['txtIdProyecto']);
            $asignacion->setRol_en_proyecto($_POST['txtRolEnProyecto']);
            try {
                $model->guardar($asignacion);
                header('Location: index.php?accion=cargarasignacionesproyecto');
            } catch (Exception $e) {
                header('Location: index.php?accion=guardarasignacionesproyecto&error=duplicado');
            }
        } else {
            require_once './view/viewGuardarAsignacionProyecto.php';
        }
    }

    public function modificar() {
        Auth::verificarSesion();
        $model = new AsignacionProyectoModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['txtIdAsignacion'])) {
            $asignacion = new AsignacionProyecto();
            $asignacion->setId_asignacion($_POST['txtIdAsignacion']);
            $asignacion->setId_usuario($_POST['txtIdUsuario']);
            $asignacion->setId_proyecto($_POST['txtIdProyecto']);
            $asignacion->setRol_en_proyecto($_POST['txtRolEnProyecto']);
            $model->modificar($asignacion);
            header('Location: index.php?accion=cargarasignacionesproyecto');
        } else {
            if (isset($_GET['id_asignacion'])) {
                $asignacion = $model->obtenerPorId($_GET['id_asignacion']);
                if ($asignacion) {
                    require_once './view/viewModificarAsignacionProyecto.php';
                } else {
                    header('Location: index.php?accion=cargarasignacionesproyecto');
                }
            } else {
                header('Location: index.php?accion=cargarasignacionesproyecto');
            }
        }
    }

    public function borrar() {
        Auth::verificarSesion();
        if (isset($_GET['id_asignacion'])) {
            $model = new AsignacionProyectoModel();
            $model->borrar($_GET['id_asignacion']);
            header('Location: index.php?accion=cargarasignacionesproyecto');
        }
    }

    public function generarPDF() {
        Auth::verificarSesion();
        if (isset($_GET['id_asignacion'])) {
            $reporteController = new ReporteController();
            $reporteController->generarPDF($_GET['id_asignacion']);
        } else {
            header('Location: index.php?accion=cargarasignacionesproyecto');
        }
    }
}
?>