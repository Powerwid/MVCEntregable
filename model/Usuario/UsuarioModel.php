<?php
require_once './config/DB.php';
require_once 'Usuario.php';

class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(Usuario $usuario) {
        $sql = "CALL guardar_usuario(:correo, :contrasena, :nombre, :apellido, :rol)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":correo", $usuario->getCorreo());
        $ps->bindParam(":contrasena", $usuario->getContrasena());
        $ps->bindParam(":nombre", $usuario->getNombre());
        $ps->bindParam(":apellido", $usuario->getApellido());
        $ps->bindParam(":rol", $usuario->getRol());
        $ps->execute();
    }

    public function modificar(Usuario $usuario) {
        $sql = "CALL modificar_usuario(:id_usuario, :correo, :contrasena, :nombre, :apellido, :rol)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_usuario", $usuario->getId_usuario());
        $ps->bindParam(":correo", $usuario->getCorreo());
        $ps->bindParam(":contrasena", $usuario->getContrasena());
        $ps->bindParam(":nombre", $usuario->getNombre());
        $ps->bindParam(":apellido", $usuario->getApellido());
        $ps->bindParam(":rol", $usuario->getRol());
        $ps->execute();
    }

    public function borrar($id_usuario) {
        $sql = "CALL eliminar_usuario(:id_usuario)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id_usuario', $id_usuario);
        $ps->execute();
    }

    public function login($correo, $contrasena) {
        $sql = "SELECT * FROM Usuarios WHERE correo = :correo";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":correo", $correo);
        $ps->execute();
        $usuario = $ps->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario && $contrasena === $usuario['contrasena']) {
            $usu = new Usuario();
            $usu->setId_usuario($usuario['id_usuario']);
            $usu->setCorreo($usuario['correo']);
            $usu->setContrasena($usuario['contrasena']);
            $usu->setNombre($usuario['nombre']);
            $usu->setApellido($usuario['apellido']);
            $usu->setRol($usuario['rol']);
            $usu->setFecha_creacion($usuario['fecha_creacion']);
            return $usu;
        }
        return null;
    }

    public function cargar() {
        $sql = "SELECT * FROM Usuarios";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        foreach ($filas as $f) {
            $usu = new Usuario();
            $usu->setId_usuario($f['id_usuario']);
            $usu->setCorreo($f['correo']);
            $usu->setContrasena($f['contrasena']);
            $usu->setNombre($f['nombre']);
            $usu->setApellido($f['apellido']);
            $usu->setRol($f['rol']);
            $usu->setFecha_creacion($f['fecha_creacion']);
            array_push($usuarios, $usu);
        }
        return $usuarios;
    }

    public function existeCorreo($correo) {
        $sql = "SELECT COUNT(*) FROM Usuarios WHERE correo = :correo";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":correo", $correo);
        $ps->execute();
        return $ps->fetchColumn() > 0;
    }

    public function obtenerPorId($id_usuario) {
        $sql = "SELECT * FROM Usuarios WHERE id_usuario = :id_usuario";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_usuario", $id_usuario);
        $ps->execute();
        $data = $ps->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $usuario = new Usuario();
            $usuario->setId_usuario($data['id_usuario']);
            $usuario->setCorreo($data['correo']);
            $usuario->setContrasena($data['contrasena']);
            $usuario->setNombre($data['nombre']);
            $usuario->setApellido($data['apellido']);
            $usuario->setRol($data['rol']);
            $usuario->setFecha_creacion($data['fecha_creacion']);
            return $usuario;
        }
        return null;
    }
}
?>