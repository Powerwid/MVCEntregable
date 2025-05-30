<?php
require_once './model/Usuario/Auth.php';
require_once './model/Proyecto/ProyectoModel.php';

class ProyectoController {
    public function cargar() {
        Auth::verificarSesion();
        $model = new ProyectoModel();
        $proyectos = $model->cargar();
        require_once './view/viewCargarProyectos.php';
    }

    public function guardar() {
        Auth::verificarSesion();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new ProyectoModel();
            $proyecto = new Proyecto();
            $proyecto->setId_cliente($_POST['txtIdCliente']);
            $proyecto->setNombre_proyecto($_POST['txtNombreProyecto']);
            $proyecto->setDescripcion($_POST['txtDescripcion']);
            $proyecto->setFecha_inicio($_POST['txtFechaInicio']);
            $proyecto->setFecha_fin($_POST['txtFechaFin']);
            $proyecto->setEstado($_POST['txtEstado']);
            $model->guardar($proyecto);
            header('Location: index.php?accion=cargarproyectos');
        } else {
            require_once './view/viewGuardarProyecto.php';
        }
    }

    public function modificar() {
        Auth::verificarSesion();
        $model = new ProyectoModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['txtIdProyecto'])) {
            $proyecto = new Proyecto();
            $proyecto->setId_proyecto($_POST['txtIdProyecto']);
            $proyecto->setId_cliente($_POST['txtIdCliente']);
            $proyecto->setNombre_proyecto($_POST['txtNombreProyecto']);
            $proyecto->setDescripcion($_POST['txtDescripcion']);
            $proyecto->setFecha_inicio($_POST['txtFechaInicio']);
            $proyecto->setFecha_fin($_POST['txtFechaFin']);
            $proyecto->setEstado($_POST['txtEstado']);
            $model->modificar($proyecto);
            header('Location: index.php?accion=cargarproyectos');
        } else {
            if (isset($_GET['id_proyecto'])) {
                $proyecto = $model->obtenerPorId($_GET['id_proyecto']);
                if ($proyecto) {
                    require_once './view/viewModificarProyecto.php';
                } else {
                    header('Location: index.php?accion=cargarproyectos');
                }
            } else {
                header('Location: index.php?accion=cargarproyectos');
            }
        }
    }

    public function borrar() {
        Auth::verificarSesion();
        if (isset($_GET['id_proyecto'])) {
            $model = new ProyectoModel();
            $model->borrar($_GET['id_proyecto']);
            header('Location: index.php?accion=cargarproyectos');
        }
    }
}
?>