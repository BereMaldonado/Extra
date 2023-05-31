<?php
if (class_exists("servicio_has_refaccion")!=true){
    class servicio_has_refaccion {
        private $Servicio_idServicio;
        private $Servicio_Auto_numeroPlacas;
        private $Servicio_Auto_Cliente_idCliente;
        private $Refaccion_idRefaccion;
    
        public function __construct($Servicio_idServicio = null, $Servicio_Auto_numeroPlacas = null, $Servicio_Auto_Cliente_idCliente = null, $Refaccion_idRefaccion = null) {
            $this->Servicio_idServicio = $Servicio_idServicio;
            $this->Servicio_Auto_numeroPlacas = $Servicio_Auto_numeroPlacas;
            $this->Servicio_Auto_Cliente_idCliente = $Servicio_Auto_Cliente_idCliente;
            $this->Refaccion_idRefaccion = $Refaccion_idRefaccion;
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
    
        public function getRefaccion_idRefaccion() {
            return $this->Refaccion_idRefaccion;
        }
    
        public function setRefaccion_idRefaccion($Refaccion_idRefaccion) {
            $this->Refaccion_idRefaccion = $Refaccion_idRefaccion;
        }
    }
    
}
?>