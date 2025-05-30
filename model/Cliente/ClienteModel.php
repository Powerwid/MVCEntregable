<?php
require_once './config/DB.php';
require_once 'Cliente.php';

class ClienteModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(Cliente $cliente) {
        $sql = "CALL guardar_cliente(:nombre_empresa, :correo, :telefono, :direccion)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":nombre_empresa", $cliente->getNombre_empresa());
        $ps->bindParam(":correo", $cliente->getCorreo());
        $ps->bindParam(":telefono", $cliente->getTelefono());
        $ps->bindParam(":direccion", $cliente->getDireccion());
        $ps->execute();
    }

    public function modificar(Cliente $cliente) {
        $sql = "CALL modificar_cliente(:id_cliente, :nombre_empresa, :correo, :telefono, :direccion)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_cliente", $cliente->getId_cliente());
        $ps->bindParam(":nombre_empresa", $cliente->getNombre_empresa());
        $ps->bindParam(":correo", $cliente->getCorreo());
        $ps->bindParam(":telefono", $cliente->getTelefono());
        $ps->bindParam(":direccion", $cliente->getDireccion());
        $ps->execute();
    }

    public function borrar($id_cliente) {
        $sql = "CALL eliminar_cliente(:id_cliente)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id_cliente', $id_cliente);
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM Clientes";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll(PDO::FETCH_ASSOC);
        $clientes = array();
        foreach ($filas as $f) {
            $cli = new Cliente();
            $cli->setId_cliente($f['id_cliente']);
            $cli->setNombre_empresa($f['nombre_empresa']);
            $cli->setCorreo($f['correo']);
            $cli->setTelefono($f['telefono']);
            $cli->setDireccion($f['direccion']);
            $cli->setFecha_creacion($f['fecha_creacion']);
            array_push($clientes, $cli);
        }
        return $clientes;
    }

    public function obtenerPorId($id_cliente) {
        $sql = "SELECT * FROM Clientes WHERE id_cliente = :id_cliente";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_cliente", $id_cliente);
        $ps->execute();
        $data = $ps->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $cliente = new Cliente();
            $cliente->setId_cliente($data['id_cliente']);
            $cliente->setNombre_empresa($data['nombre_empresa']);
            $cliente->setCorreo($data['correo']);
            $cliente->setTelefono($data['telefono']);
            $cliente->setDireccion($data['direccion']);
            $cliente->setFecha_creacion($data['fecha_creacion']);
            return $cliente;
        }
        return null;
    }
}
?>