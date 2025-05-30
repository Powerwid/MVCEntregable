<?php
require_once './model/Usuario/Auth.php';
require_once './model/Cliente/ClienteModel.php';

class ClienteController {
    public function cargar() {
        Auth::verificarSesion();
        $model = new ClienteModel();
        $clientes = $model->cargar();
        require_once './view/viewCargarClientes.php';
    }

    public function guardar() {
        Auth::verificarSesion();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new ClienteModel();
            $cliente = new Cliente();
            $cliente->setNombre_empresa($_POST['txtNombreEmpresa']);
            $cliente->setCorreo($_POST['txtCorreo']);
            $cliente->setTelefono($_POST['txtTelefono']);
            $cliente->setDireccion($_POST['txtDireccion']);
            $model->guardar($cliente);
            header('Location: index.php?accion=cargarclientes');
        } else {
            require_once './view/viewGuardarCliente.php';
        }
    }

    public function modificar() {
        Auth::verificarSesion();
        $model = new ClienteModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['txtIdCliente'])) {
            $cliente = new Cliente();
            $cliente->setId_cliente($_POST['txtIdCliente']);
            $cliente->setNombre_empresa($_POST['txtNombreEmpresa']);
            $cliente->setCorreo($_POST['txtCorreo']);
            $cliente->setTelefono($_POST['txtTelefono']);
            $cliente->setDireccion($_POST['txtDireccion']);
            $model->modificar($cliente);
            header('Location: index.php?accion=cargarclientes');
        } else {
            if (isset($_GET['id_cliente'])) {
                $cliente = $model->obtenerPorId($_GET['id_cliente']);
                if ($cliente) {
                    require_once './view/viewModificarCliente.php';
                } else {
                    header('Location: index.php?accion=cargarclientes');
                }
            } else {
                header('Location: index.php?accion=cargarclientes');
            }
        }
    }

    public function borrar() {
        Auth::verificarSesion();
        if (isset($_GET['id_cliente'])) {
            $model = new ClienteModel();
            $model->borrar($_GET['id_cliente']);
            header('Location: index.php?accion=cargarclientes');
        }
    }
}
?>