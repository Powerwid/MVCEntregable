<?php
require_once 'UsuarioModel.php';

class Auth {
    public static function login($correo, $contrasena) {
        $model = new UsuarioModel();
        $usuario = $model->login($correo, $contrasena);
        
        if ($usuario) {
            session_start();
            $_SESSION['id_usuario'] = $usuario->getId_usuario();
            $_SESSION['correo'] = $usuario->getCorreo();
            $_SESSION['rol'] = $usuario->getRol();
            return true;
        }
        return false;
    }

    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
        clearstatcache();
    }

    public static function verificarSesion() {
        session_start();
        if (!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
            // Añadir cabeceras para evitar caché
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');
            header('Location: index.php?accion=login');
            exit();
        }
    }
}
?>