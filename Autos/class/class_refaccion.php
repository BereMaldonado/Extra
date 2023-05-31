<?php
if (class_exists("refaccion")!=true){
    class Refaccion {
        private $idRefaccion;
        private $modelo;
        private $marca;
        private $pieza;
        private $tipo;
    
        public function __construct($idRefaccion = null, $modelo = null, $marca = null, $pieza = null, $tipo = null) {
            $this->idRefaccion = $idRefaccion;
            $this->modelo = $modelo;
            $this->marca = $marca;
            $this->pieza = $pieza;
            $this->tipo = $tipo;
        }
    
        public function getIdRefaccion() {
            return $this->idRefaccion;
        }
    
        public function setIdRefaccion($idRefaccion) {
            $this->idRefaccion = $idRefaccion;
        }
    
        public function getModelo() {
            return $this->modelo;
        }
    
        public function setModelo($modelo) {
            $this->modelo = $modelo;
        }
    
        public function getMarca() {
            return $this->marca;
        }
    
        public function setMarca($marca) {
            $this->marca = $marca;
        }
    
        public function getPieza() {
            return $this->pieza;
        }
    
        public function setPieza($pieza) {
            $this->pieza = $pieza;
        }
    
        public function getTipo() {
            return $this->tipo;
        }
    
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
    }
    
}
?>