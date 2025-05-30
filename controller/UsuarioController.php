<?php
require_once './model/Usuario/Auth.php';
require_once './model/Usuario/UsuarioModel.php';

class UsuarioController {
    public function cargar() {
        Auth::verificarSesion();
        $model = new UsuarioModel();
        $usuarios = $model->cargar();
        require_once './view/viewCargarUsuarios.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            Auth::verificarSesion();
            $model = new UsuarioModel();
            $correo = $_POST['txtCorreo'];
            
            if ($model->existeCorreo($correo)) {
                $error = "El correo ya está registrado.";
                require_once './view/viewGuardarUsuario.php';
                return;
            }

            $usuario = new Usuario();
            $usuario->setCorreo($correo);
            $usuario->setContrasena($_POST['txtContrasena']);
            $usuario->setNombre($_POST['txtNombre']);
            $usuario->setApellido($_POST['txtApellido']);
            $usuario->setRol($_POST['txtRol']);
            $model->guardar($usuario);
            header('Location: index.php?accion=login&mensaje=Usuario creado con éxito');
        } else {
            require_once './view/viewGuardarUsuario.php';
        }
    }

    public function modificar() {
        Auth::verificarSesion();
        $model = new UsuarioModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['txtIdUsuario'])) {
            $usuario = new Usuario();
            $usuario->setId_usuario($_POST['txtIdUsuario']);
            $usuario->setCorreo($_POST['txtCorreo']);
            $usuario->setContrasena($_POST['txtContrasena']);
            $usuario->setNombre($_POST['txtNombre']);
            $usuario->setApellido($_POST['txtApellido']);
            $usuario->setRol($_POST['txtRol']);
            $model->modificar($usuario);
            header('Location: index.php?accion=cargarusuarios');
        } else {
            if (isset($_GET['id_usuario'])) {
                $id_usuario = filter_var($_GET['id_usuario'], FILTER_VALIDATE_INT); // Validar el ID
                if ($id_usuario !== false && $id_usuario > 0) {
                    $usuario = $model->obtenerPorId($id_usuario);
                    if ($usuario) {
                        require_once './view/viewModificarUsuario.php';
                    } else {
                        // Si no se encuentra el usuario, redirigir con un mensaje de error
                        header('Location: index.php?accion=cargarusuarios&error=Usuario no encontrado');
                    }
                } else {
                    header('Location: index.php?accion=cargarusuarios&error=ID inválido');
                }
            } else {
                header('Location: index.php?accion=cargarusuarios');
            }
        }
    }

    public function borrar() {
        Auth::verificarSesion();
        if (isset($_GET['id_usuario'])) {
            $model = new UsuarioModel();
            $model->borrar($_GET['id_usuario']);
            header('Location: index.php?accion=cargarusuarios');
        }
    }
}
?>