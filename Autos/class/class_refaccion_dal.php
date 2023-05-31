<?php
    include("class_refaccion.php");
    include("class_db.php");

    class refaccion_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_idRefaccion($idRefaccion){
            $idRefaccion=$this->db_conn->real_escape_string($idRefaccion);
            $sql="select * from refaccion where idRefaccion=$idRefaccion";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idRefaccion=mysqli_num_rows($result);
            $obj_det=null;
            if($total_idRefaccion==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new refaccion(
                    $renglon["idRefaccion"],
                    $renglon["modelo"],
                    $renglon["marca"],
                    $renglon["pieza"],
                    $renglon["tipo"]);
            }

            return $obj_det;
        }
        function lista_refaccion(){
            $sql="select * from refaccion;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idRefaccion=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_idRefaccion>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                $obj_det= new refaccion(
                    $renglon["idRefaccion"],
                    $renglon["modelo"],
                    $renglon["marca"],
                    $renglon["pieza"],
                    $renglon["tipo"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

        function existe_refaccion($idRefaccion){
            $idRefaccion=$this->db_conn->real_escape_string($idRefaccion);
            $sql = "select count(*) from refaccion";
            $sql.=" where idRefaccion=$idRefaccion";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_refaccion($obj){
            
            $sql="insert into refaccion(";
            $sql.="idRefaccion,";
            $sql.="modelo,";
            $sql.="marca,";
            $sql.="pieza,";
            $sql.="tipo)";

            $sql.=" values (";
            $sql.="".$obj->getIdRefaccion().",";
            $sql.="'".$obj->getModelo()."',";
            $sql.="'".$obj->getMarca()."',";
            $sql.="'".$obj->getPieza()."',";
            $sql.="'".$obj->getTipo()."')";
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

        function borra_refaccion($idRefaccion){
            $idRefaccion=$this->db_conn->real_escape_string($idRefaccion);
            $sql="delete from refaccion where idRefaccion=$idRefaccion";
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

        function actualiza_refaccion($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update refaccion set ";
                    $sql .= "modelo="."'".$obj->getModelo()."',";
                    $sql .= "marca="."'".$obj->getMarca()."',";
                    $sql .= "pieza="."'".$obj->getPieza()."',";
                    $sql .= "tipo="."'".$obj->getTipo()."'";
                    $sql .= " where idRefaccion =".$obj->getIdRefaccion();
            
             
            
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