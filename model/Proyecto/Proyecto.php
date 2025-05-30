<?php 
    class Proyecto {
        // Campos privados de clase Proyecto
        private $id_proyecto;
        private $id_cliente;
        private $nombre_proyecto;
        private $descripcion;
        private $fecha_inicio;
        private $fecha_fin;
        private $estado;
        private $fecha_creacion;
        // Encapsulamiento de id_proyecto
        public function getId_proyecto(){return $this->id_proyecto;}
        public function setId_proyecto($id_proyecto){$this->id_proyecto = $id_proyecto;}
        // Encapsulamiento de id_cliente
        public function getId_cliente(){return $this->id_cliente;}
        public function setId_cliente($id_cliente){$this->id_cliente = $id_cliente;}
        // Encapsulamiento de nombre_proyecto
        public function getNombre_proyecto(){return $this->nombre_proyecto;}   
        public function setNombre_proyecto($nombre_proyecto){$this->nombre_proyecto = $nombre_proyecto;}
        // Encapsulamiento de descripcion
        public function getDescripcion(){return $this->descripcion;}
        public function setDescripcion($descripcion){$this->descripcion = $descripcion;}
        // Encapsulamiento de fecha_inicio
        public function getFecha_inicio(){return $this->fecha_inicio;}
        public function setFecha_inicio($fecha_inicio){$this->fecha_inicio = $fecha_inicio;}
        // Encapsulamiento de fecha_fin
        public function getFecha_fin(){return $this->fecha_fin;}
        public function setFecha_fin($fecha_fin){$this->fecha_fin = $fecha_fin;}
        // Encapsulamiento de estado
        public function getEstado(){return $this->estado;}   
        public function setEstado($estado){$this->estado = $estado;}
        // Encapsulamiento de fecha_creacion
        public function getFecha_creacion(){return $this->fecha_creacion;}
        public function setFecha_creacion($fecha_creacion){$this->fecha_creacion = $fecha_creacion;}
    }
?>