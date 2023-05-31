<?php
if (class_exists("cliente")!=true){
    class Cliente {
        private $idCliente;
        private $nombre;
        private $apellido;
        private $telefono;
        private $direccion;
    
        public function __construct($idCliente = null, $nombre = null, $apellido = null, $telefono = null, $direccion = null) {
            $this->idCliente = $idCliente;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
        }
    
        public function getIdCliente() {
            return $this->idCliente;
        }
    
        public function setIdCliente($idCliente) {
            $this->idCliente = $idCliente;
        }
    
        public function getNombre() {
            return $this->nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function getApellido() {
            return $this->apellido;
        }
    
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
    
        public function getTelefono() {
            return $this->telefono;
        }
    
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
    
        public function getDireccion() {
            return $this->direccion;
        }
    
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    }
    
}
?>