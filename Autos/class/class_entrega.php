<?php
if (class_exists("entrega")!=true){
    class Entrega {
        private $idEntrega;
        private $nomUsuario;
        private $fechaEntrega;
        private $proximoServicio;
        private $Servicio_idServicio;
        private $Servicio_Auto_numeroPlacas;
        private $Servicio_Auto_Cliente_idCliente;
    
        public function __construct($idEntrega = null, $nomUsuario = null, $fechaEntrega = null, $proximoServicio = null, $Servicio_idServicio = null, $Servicio_Auto_numeroPlacas = null, $Servicio_Auto_Cliente_idCliente = null) {
            $this->idEntrega = $idEntrega;
            $this->nomUsuario = $nomUsuario;
            $this->fechaEntrega = $fechaEntrega;
            $this->proximoServicio = $proximoServicio;
            $this->Servicio_idServicio = $Servicio_idServicio;
            $this->Servicio_Auto_numeroPlacas = $Servicio_Auto_numeroPlacas;
            $this->Servicio_Auto_Cliente_idCliente = $Servicio_Auto_Cliente_idCliente;
        }
    
        public function getIdEntrega() {
            return $this->idEntrega;
        }
    
        public function setIdEntrega($idEntrega) {
            $this->idEntrega = $idEntrega;
        }
    
        public function getNomUsuario() {
            return $this->nomUsuario;
        }
    
        public function setNomUsuario($nomUsuario) {
            $this->nomUsuario = $nomUsuario;
        }
    
        public function getFechaEntrega() {
            return $this->fechaEntrega;
        }
    
        public function setFechaEntrega($fechaEntrega) {
            $this->fechaEntrega = $fechaEntrega;
        }
    
        public function getProximoServicio() {
            return $this->proximoServicio;
        }
    
        public function setProximoServicio($proximoServicio) {
            $this->proximoServicio = $proximoServicio;
        }
    
        public function getServicio_idServicio() {
            return $this->Servicio_idServicio;
        }
    
        public function setServicio_idServicio($Servicio_idServicio) {
            $this->Servicio_idServicio = $Servicio_idServicio;
        }
    
        public function getServicio_Auto_numeroPlacas() {
            return $this->Servicio_Auto_numeroPlacas;
        }
    
        public function setServicio_Auto_numeroPlacas($Servicio_Auto_numeroPlacas) {
            $this->Servicio_Auto_numeroPlacas = $Servicio_Auto_numeroPlacas;
        }
    
        public function getServicio_Auto_Cliente_idCliente() {
            return $this->Servicio_Auto_Cliente_idCliente;
        }
    
        public function setServicio_Auto_Cliente_idCliente($Servicio_Auto_Cliente_idCliente) {
            $this->Servicio_Auto_Cliente_idCliente = $Servicio_Auto_Cliente_idCliente;
        }
    }
    
}
?>