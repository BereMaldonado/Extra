<?php
    include("class_servicio.php");
    include("class_db.php");

    class servicio_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_idServicio($idServicio){
            $idServicio=$this->db_conn->real_escape_string($idServicio);
            $sql="select * from servicio where idServicio=$idServicio";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idServicio=mysqli_num_rows($result);
            $obj_det=null;
            if($total_idServicio==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new servicio(
                    $renglon["idServicio"],
                    $renglon["fechaIngreso"],
                    $renglon["tipoServicio"],
                    $renglon["descripcion"],
                    $renglon["estatus"],
                    $renglon["Auto_numeroPlacas"],
                    $renglon["Auto_Cliente_idCliente"]);
            }

            return $obj_det;
        }
        function lista_servicio(){
            $sql="select * from servicio;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idServicio=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_idServicio>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                $obj_det= new servicio(
                    $renglon["idServicio"],
                    $renglon["fechaIngreso"],
                    $renglon["tipoServicio"],
                    $renglon["descripcion"],
                    $renglon["estatus"],
                    $renglon["Auto_numeroPlacas"],
                    $renglon["Auto_Cliente_idCliente"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

        function existe_servicio($idServicio){
            $idServicio=$this->db_conn->real_escape_string($idServicio);
            $sql = "select count(*) from servicio";
            $sql.=" where idServicio=$idServicio";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_servicio($obj){
            
            $sql="insert into servicio(";
            $sql.="idServicio,";
            $sql.="fechaIngreso,";
            $sql.="tipoServicio,";
            $sql.="descripcion,";
            $sql.="estatus,";
            $sql.="Auto_numeroPlacas,";
            $sql.="Auto_Cliente_idCliente)";

            $sql.=" values (";
            $sql.="".$obj->getIdServicio().",";
            $sql.="'".$obj->getFechaIngreso()."',";
            $sql.="'".$obj->getTipoServicio()."',";
            $sql.="'".$obj->getDescripcion()."',";
            $sql.="'".$obj->getEstatus()."',";
            $sql.="".$obj->getAuto_numeroPlacas().",";
            $sql.="".$obj->getAuto_Cliente_idCliente().")";
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

        function borra_servicio($idServicio){
            $idServicio=$this->db_conn->real_escape_string($idServicio);
            $sql="delete from servicio where idServicio=$idServicio";
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

        function actualiza_servicio($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update servicio set ";
                    $sql .= "fechaIngreso="."'".$obj->getFechaIngreso()."',";
                    $sql .= "tipoServicio="."'".$obj->getTipoServicio()."',";
                    $sql .= "descripcion="."'".$obj->getDescripcion()."',";
                    $sql .= "estatus="."'".$obj->getEstatus()."',";
                    $sql .= "Auto_numeroPlacas=".$obj->getAuto_numeroPlacas().",";
                    $sql .= "Auto_Cliente_idCliente=".$obj->getAuto_Cliente_idCliente()."";
                    $sql .= " where idServicio =".$obj->getIdServicio();
            
             
            
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