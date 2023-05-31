<?php
if (class_exists("auto")!=true){
    class Auto {
        private $numeroPlacas;
        private $marca;
        private $anio;
        private $modelo;
        private $Cliente_idCliente;
        
        // Constructor que acepta atributos nulos
        public function __construct($numeroPlacas = null, $marca = null, $anio = null, $modelo = null, $Cliente_idCliente = null) {
            $this->numeroPlacas = $numeroPlacas;
            $this->marca = $marca;
            $this->anio = $anio;
            $this->modelo = $modelo;
            $this->Cliente_idCliente = $Cliente_idCliente;
        }

        public function getNumeroPlacas() {
            return $this->numeroPlacas;
        }
        
        public function setNumeroPlacas($numeroPlacas) {
            $this->numeroPlacas = $numeroPlacas;
        }
        
        public function getMarca() {
            return $this->marca;
        }
        
        public function setMarca($marca) {
            $this->marca = $marca;
        }
        
        public function getAnio() {
            return $this->anio;
        }
        
        public function setAnio($anio) {
            $this->anio = $anio;
        }
        
        public function getModelo() {
            return $this->modelo;
        }
        
        public function setModelo($modelo) {
            $this->modelo = $modelo;
        }
        
        public function getCliente_IdCliente() {
            return $this->Cliente_idCliente;
        }
        
        public function setCliente_IdCliente($Cliente_idCliente) {
            $this->Cliente_idCliente = $Cliente_idCliente;
        }
    }    
    
}
?>