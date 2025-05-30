<?php
require_once './model/Usuario/UsuarioModel.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['txtCorreo'];
            $contrasena = $_POST['txtContrasena'];
            $model = new UsuarioModel();
            $usuario = $model->login($correo, $contrasena);
            if ($usuario != null) {
                session_start();
                $_SESSION['correo'] = $usuario->getCorreo();
                $_SESSION['rol'] = $usuario->getRol();
                header('Location: index.php?accion=cargarusuarios');
            } else {
                require_once './view/viewLogin.php';
            }
        } else {
            session_start();
            if (isset($_SESSION['correo'])) {
                header('Location: index.php?accion=cargarusuarios');
            } else {
                require_once './view/viewLogin.php';
            }
        }
    }

    public function logout() {
        session_start();
        $_SESSION = array(); // Limpiar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        setcookie(session_name(), '', time() - 3600, '/'); // Eliminar la cookie de sesión
        // Añadir cabeceras para evitar caché del navegador
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        header('Location: index.php?accion=login');
        exit();
    }
}
?>