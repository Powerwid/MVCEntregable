<?php
require_once './config/DB.php';
require_once 'Proyecto.php';

class ProyectoModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(Proyecto $proyecto) {
        $sql = "CALL guardar_proyecto(:id_cliente, :nombre_proyecto, :descripcion, :fecha_inicio, :fecha_fin, :estado)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_cliente", $proyecto->getId_cliente());
        $ps->bindParam(":nombre_proyecto", $proyecto->getNombre_proyecto());
        $ps->bindParam(":descripcion", $proyecto->getDescripcion());
        $ps->bindParam(":fecha_inicio", $proyecto->getFecha_inicio());
        $ps->bindParam(":fecha_fin", $proyecto->getFecha_fin());
        $ps->bindParam(":estado", $proyecto->getEstado());
        $ps->execute();
    }

    public function modificar(Proyecto $proyecto) {
        $sql = "CALL modificar_proyecto(:id_proyecto, :id_cliente, :nombre_proyecto, :descripcion, :fecha_inicio, :fecha_fin, :estado)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_proyecto", $proyecto->getId_proyecto());
        $ps->bindParam(":id_cliente", $proyecto->getId_cliente());
        $ps->bindParam(":nombre_proyecto", $proyecto->getNombre_proyecto());
        $ps->bindParam(":descripcion", $proyecto->getDescripcion());
        $ps->bindParam(":fecha_inicio", $proyecto->getFecha_inicio());
        $ps->bindParam(":fecha_fin", $proyecto->getFecha_fin());
        $ps->bindParam(":estado", $proyecto->getEstado());
        $ps->execute();
    }

    public function borrar($id_proyecto) {
        $sql = "CALL eliminar_proyecto(:id_proyecto)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id_proyecto', $id_proyecto);
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM Proyectos";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll(PDO::FETCH_ASSOC);
        $proyectos = array();
        foreach ($filas as $f) {
            $proy = new Proyecto();
            $proy->setId_proyecto($f['id_proyecto']);
            $proy->setId_cliente($f['id_cliente']);
            $proy->setNombre_proyecto($f['nombre_proyecto']);
            $proy->setDescripcion($f['descripcion']);
            $proy->setFecha_inicio($f['fecha_inicio']);
            $proy->setFecha_fin($f['fecha_fin']);
            $proy->setEstado($f['estado']);
            $proy->setFecha_creacion($f['fecha_creacion']);
            array_push($proyectos, $proy);
        }
        return $proyectos;
    }

    public function obtenerPorId($id_proyecto) {
        $sql = "SELECT * FROM Proyectos WHERE id_proyecto = :id_proyecto";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_proyecto", $id_proyecto);
        $ps->execute();
        $data = $ps->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $proyecto = new Proyecto();
            $proyecto->setId_proyecto($data['id_proyecto']);
            $proyecto->setId_cliente($data['id_cliente']);
            $proyecto->setNombre_proyecto($data['nombre_proyecto']);
            $proyecto->setDescripcion($data['descripcion']);
            $proyecto->setFecha_inicio($data['fecha_inicio']);
            $proyecto->setFecha_fin($data['fecha_fin']);
            $proyecto->setEstado($data['estado']);
            $proyecto->setFecha_creacion($data['fecha_creacion']);
            return $proyecto;
        }
        return null;
    }
}
?>