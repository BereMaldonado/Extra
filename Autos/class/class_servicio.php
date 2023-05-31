<?php
if (class_exists("servicio")!=true){
    class Servicio {
        private $idServicio;
        private $fechaIngreso;
        private $tipoServicio;
        private $descripcion;
        private $estatus;
        private $Auto_numeroPlacas;
        private $Auto_Cliente_idCliente;
    
        public function __construct($idServicio = null, $fechaIngreso = null, $tipoServicio = null, $descripcion = null, $estatus = null, $numeroPlacas = null, $idCliente = null) {
            $this->idServicio = $idServicio;
            $this->fechaIngreso = $fechaIngreso;
            $this->tipoServicio = $tipoServicio;
            $this->descripcion = $descripcion;
            $this->estatus = $estatus;
            $this->Auto_numeroPlacas = $numeroPlacas;
            $this->Auto_Cliente_idCliente = $idCliente;
        }
    
        public function getIdServicio() {
            return $this->idServicio;
        }
    
        public function setIdServicio($idServicio) {
            $this->idServicio = $idServicio;
        }
    
        public function getFechaIngreso() {
            return $this->fechaIngreso;
        }
    
        public function setFechaIngreso($fechaIngreso) {
            $this->fechaIngreso = $fechaIngreso;
        }
    
        public function getTipoServicio() {
            return $this->tipoServicio;
        }
    
        public function setTipoServicio($tipoServicio) {
            $this->tipoServicio = $tipoServicio;
        }
    
        public function getDescripcion() {
            return $this->descripcion;
        }
    
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
    
        public function getEstatus() {
            return $this->estatus;
        }
    
        public function setEstatus($estatus) {
            $this->estatus = $estatus;
        }
    
        public function getAuto_NumeroPlacas() {
            return $this->Auto_numeroPlacas;
        }
    
        public function setAuto_NumeroPlacas($numeroPlacas) {
            $this->Auto_numeroPlacas = $numeroPlacas;
        }
    
        public function getAuto_Cliente_IdCliente() {
            return $this->Auto_Cliente_idCliente;
        }
    
        public function setAuto_Cliente_IdCliente($idCliente) {
            $this->Auto_Cliente_idCliente = $idCliente;
        }
    }
    
}
?>