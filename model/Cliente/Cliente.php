<?php 

    class Cliente{
        // Campos privados de clase Cliente
        private $id_cliente;
        private $nombre_empresa;
        private $correo;
        private $telefono;
        private $direccion;
        private $fecha_creacion;
        // Encapsulamiento de id_cliente
        public function getId_cliente(){return $this->id_cliente;}
        public function setId_cliente($id_cliente){$this->id_cliente = $id_cliente;}
        // Encapsulamiento de nombre_empresa
        public function getNombre_empresa(){return $this->nombre_empresa;}
        public function setNombre_empresa($nombre_empresa){$this->nombre_empresa = $nombre_empresa;}
        // Encapsulamiento de correo
        public function getCorreo(){return $this->correo;}
        public function setCorreo($correo){$this->correo = $correo;}
        // Encapsulamiento de telefono
        public function getTelefono(){return $this->telefono;}
        public function setTelefono($telefono){$this->telefono = $telefono;}
        // Encapsulamiento de direccion
        public function getDireccion(){return $this->direccion;}
        public function setDireccion($direccion){$this->direccion = $direccion;}
        // Encapsulamiento de fecha_creacion
        public function getFecha_creacion(){return $this->fecha_creacion;}
        public function setFecha_creacion($fecha_creacion){$this->fecha_creacion = $fecha_creacion;return $this;}
    }

?>