<?php
    include("class_usuario.php");
    include("class_db.php");

    class usuario_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_nomUsuario($nomUsuario){
            $nomUsuario=$this->db_conn->real_escape_string($nomUsuario);
            $sql="select * from usuario where nomUsuario='$nomUsuario'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_nomUsuario=mysqli_num_rows($result);
            $obj_det=null;
            if($total_nomUsuario==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new usuario(
                    $renglon["idUsuario"],
                    $renglon["nomUsuario"],
                    $renglon["contrasena"]);
            }

            return $obj_det;
        }
        function lista_usuario(){
            $sql="select * from usuario order by idUsuario;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idUsuario=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_idUsuario>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                $obj_det= new usuario(
                    $renglon["idUsuario"],
                    $renglon["nomUsuario"],
                    $renglon["contrasena"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

        function existe_usuario($idUsuario){
            $idUsuario=$this->db_conn->real_escape_string($idUsuario);
            $sql = "select count(*) from usuario";
            $sql.=" where idUsuario=$idUsuario";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_usuario($obj){
            
            $sql="insert into usuario(";
            $sql.="idUsuario,";
            $sql.="nomUsuario,";
            $sql.="contrasena)";

            $sql.=" values (";
            $sql.="".$obj->getIdUsuario().",";
            $sql.="'".$obj->getNomUsuario()."',";
            $sql.="'".$obj->getContrasena()."')";
            $this->set_sql($sql);
            $this->db_conn->set_charset("utf8");
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $insertado=1;
            }
            else{
                $insertado=0;
            }
            unset($obj);
            return $insertado;
        }

        function borra_usuario($idUsuario){
            $idUsuario=$this->db_conn->real_escape_string($idUsuario);
            $sql="delete from usuario where idUsuario=$idUsuario";
            $this->set_sql($sql);
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
                if(mysqli_affected_rows($this->db_conn)==1){
                    $borrado=1;
                }
                else{
                    $borrado=0;
                }

                unset($obj);
                return $borrado;
        }

        function actualiza_usuario($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update usuario set ";
                    $sql .= "nomUsuario="."'".$obj->getNomUsuario()."',";
                    $sql .= "contrasena="."'".$obj->getContrasena()."'";
                    $sql .= " where idUsuario =".$obj->getIdUsuario();
            
             
            
                    //echo $sql;//exit;
                    
                    $this->set_sql($sql);
                    $this->db_conn->set_charset("utf8");
                    
                    mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
            
             
            
                    if(mysqli_affected_rows($this->db_conn)==1) {
                        $actualizado=1;
                    }else{
                        $actualizado=0;
                    }
                    unset($obj);
                    return $actualizado;
                }
    }//end class
?>