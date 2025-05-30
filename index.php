<?php
require_once './controller/AuthController.php';
require_once './controller/UsuarioController.php';
require_once './controller/ClienteController.php';
require_once './controller/ProyectoController.php';
require_once './controller/AsignacionProyectoController.php';
require_once './controller/ReporteController.php';

$accion = isset($_GET['accion']) ? $_GET['accion'] : 'login';

switch ($accion) {
    // Acciones de Autenticación
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    // Acciones de Usuarios
    case 'cargarusuarios':
        $controller = new UsuarioController();
        $controller->cargar();
        break;
    case 'guardarusuario':
        $controller = new UsuarioController();
        $controller->guardar();
        break;
    case 'modificarusuario':
        $controller = new UsuarioController();
        $controller->modificar();
        break;
    case 'borrarusuario':
        $controller = new UsuarioController();
        $controller->borrar();
        break;

    // Acciones de Clientes
    case 'cargarclientes':
        $controller = new ClienteController();
        $controller->cargar();
        break;
    case 'guardarcliente':
        $controller = new ClienteController();
        $controller->guardar();
        break;
    case 'modificarcliente':
        $controller = new ClienteController();
        $controller->modificar();
        break;
    case 'borrarcliente':
        $controller = new ClienteController();
        $controller->borrar();
        break;
    case 'generarpdfcliente':
        $controller = new ClienteController();
        $controller->generarPDFCliente();
        break;

    // Acciones de Proyectos
    case 'cargarproyectos':
        $controller = new ProyectoController();
        $controller->cargar();
        break;
    case 'guardarproyectos':
        $controller = new ProyectoController();
        $controller->guardar();
        break;
    case 'modificarproyectos':
        $controller = new ProyectoController();
        $controller->modificar();
        break;
    case 'borrarproyectos':
        $controller = new ProyectoController();
        $controller->borrar();
        break;
    case 'generarpdfproyecto':
        $controller = new ProyectoController();
        $controller->generarPDF();
        break;

    // Acciones de Asignaciones de Proyectos
    case 'cargarasignacionesproyecto':
        $controller = new AsignacionProyectoController();
        $controller->cargar();
        break;
    case 'guardarasignacionesproyecto':
        $controller = new AsignacionProyectoController();
        $controller->guardar();
        break;
    case 'modificarasignacionesproyecto':
        $controller = new AsignacionProyectoController();
        $controller->modificar();
        break;
    case 'borrarasignacionesproyecto':
        $controller = new AsignacionProyectoController();
        $controller->borrar();
        break;
    case 'generarpdfasignacion':
        $controller = new AsignacionProyectoController();
        $controller->generarPDF();
        break;
    default:
        $controller = new AuthController();
        $controller->login();
        break;
}
?>