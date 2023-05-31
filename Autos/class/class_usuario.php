<?php
if (class_exists("usuario")!=true){
    class Usuario{
        protected $idUsuario;
        protected $nomUsuario;
        protected $contrasena;

        public function __construct(
            $idUsuario=NULL,
            $nomUsuario=NULL,
            $contrasena=NULL)
            {
                $this->idUsuario=$idUsuario;
                $this->nomUsuario=$nomUsuario;
                $this->contrasena=$contrasena;
            }
        
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }
        
        public function getNomUsuario()
        {
                return $this->nomUsuario;
        }

        public function setNomUsuario($nomUsuario)
        {
                $this->nomUsuario = $nomUsuario;

                return $this;
        }

        public function getContrasena()
        {
                return $this->contrasena;
        }

        public function setContrasena($contrasena)
        {
                $this->contrasena = $contrasena;

                return $this;
        }

    }//class
}//if exists
?>