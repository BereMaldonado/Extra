<?php
    include("class_auto.php");
    include("class_db.php");

    class auto_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_numeroPlacas($numeroPlacas){
            $numeroPlacas=$this->db_conn->real_escape_string($numeroPlacas);
            $sql="select * from auto where numeroPlacas=$numeroPlacas";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_numeroPlacas=mysqli_num_rows($result);
            $obj_det=null;
            if($total_numeroPlacas==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new auto(
                    $renglon["numeroPlacas"],
                    $renglon["marca"],
                    $renglon["anio"],
                    $renglon["modelo"],
                    $renglon["Cliente_idCliente"]);
            }

            return $obj_det;
        }
        function lista_auto(){
            $sql="select * from auto;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_numeroPlacas=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_numeroPlacas>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                $obj_det= new auto(
                    $renglon["numeroPlacas"],
                    $renglon["marca"],
                    $renglon["anio"],
                    $renglon["modelo"],
                    $renglon["Cliente_idCliente"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

        function existe_auto($numeroPlacas){
            $numeroPlacas=$this->db_conn->real_escape_string($numeroPlacas);
            $sql = "select count(*) from auto";
            $sql.=" where numeroPlacas=$numeroPlacas";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_auto($obj){
            
            $sql="insert into auto(";
            $sql.="numeroPlacas,";
            $sql.="marca,";
            $sql.="anio,";
            $sql.="modelo,";
            $sql.="Cliente_idCliente)";

            $sql.=" values (";
            $sql.="".$obj->getNumeroPlacas().",";
            $sql.="'".$obj->getMarca()."',";
            $sql.="".$obj->getAnio().",";
            $sql.="'".$obj->getModelo()."',";
            $sql.="".$obj->getCliente_idCliente().")";
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

        function borra_auto($numeroPlacas){
            $numeroPlacas=$this->db_conn->real_escape_string($numeroPlacas);
            $sql="delete from auto where numeroPlacas=$numeroPlacas";
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

        function actualiza_auto($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update auto set ";
                    $sql .= "marca="."'".$obj->getMarca()."',";
                    $sql .= "anio=".$obj->getAnio().",";
                    $sql .= "modelo="."'".$obj->getModelo()."',";
                    $sql .= "Cliente_idCliente=".$obj->getCliente_idCliente()."";
                    $sql .= " where numeroPlacas =".$obj->getNumeroPlacas();
            
             
            
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