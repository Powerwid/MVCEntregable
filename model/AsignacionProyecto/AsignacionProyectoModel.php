<?php
require_once './config/DB.php';
require_once 'AsignacionProyecto.php';

class AsignacionProyectoModel {
    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(AsignacionProyecto $asignacion) {
        $sql = "CALL guardar_asignacion_proyecto(:id_proyecto, :id_usuario, :rol_en_proyecto)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_proyecto", $asignacion->getId_proyecto());
        $ps->bindParam(":id_usuario", $asignacion->getId_usuario());
        $ps->bindParam(":rol_en_proyecto", $asignacion->getRol_en_proyecto());
        $ps->execute();
    }

    public function modificar(AsignacionProyecto $asignacion) {
        // No existe un procedimiento almacenado para modificar, usamos SQL directo
        $sql = "UPDATE Asignaciones_Proyectos SET id_usuario = :id_usuario, id_proyecto = :id_proyecto, rol_en_proyecto = :rol_en_proyecto WHERE id_asignacion = :id_asignacion";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_asignacion", $asignacion->getId_asignacion());
        $ps->bindParam(":id_usuario", $asignacion->getId_usuario());
        $ps->bindParam(":id_proyecto", $asignacion->getId_proyecto());
        $ps->bindParam(":rol_en_proyecto", $asignacion->getRol_en_proyecto());
        $ps->execute();
    }

    public function borrar($id_asignacion) {
        $sql = "CALL eliminar_asignacion_proyecto(:id_asignacion)";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':id_asignacion', $id_asignacion);
        $ps->execute();
    }

    public function cargar() {
        $sql = "SELECT * FROM Asignaciones_Proyectos";
        $ps = $this->db->prepare($sql);
        $ps->execute();
        $filas = $ps->fetchAll(PDO::FETCH_ASSOC);
        $asignaciones = array();
        foreach ($filas as $f) {
            $asig = new AsignacionProyecto();
            $asig->setId_asignacion($f['id_asignacion']);
            $asig->setId_usuario($f['id_usuario']);
            $asig->setId_proyecto($f['id_proyecto']);
            $asig->setRol_en_proyecto($f['rol_en_proyecto']);
            $asig->setFecha_asignacion($f['fecha_asignacion']);
            array_push($asignaciones, $asig);
        }
        return $asignaciones;
    }

    public function obtenerPorId($id_asignacion) {
        $sql = "SELECT * FROM Asignaciones_Proyectos WHERE id_asignacion = :id_asignacion";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id_asignacion", $id_asignacion);
        $ps->execute();
        $data = $ps->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $asignacion = new AsignacionProyecto();
            $asignacion->setId_asignacion($data['id_asignacion']);
            $asignacion->setId_usuario($data['id_usuario']);
            $asignacion->setId_proyecto($data['id_proyecto']);
            $asignacion->setRol_en_proyecto($data['rol_en_proyecto']);
            $asignacion->setFecha_asignacion($data['fecha_asignacion']);
            return $asignacion;
        }
        return null;
    }
}
?>