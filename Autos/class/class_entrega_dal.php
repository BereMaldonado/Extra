<?php
    include("class_entrega.php");
    include("class_db.php");

    class entrega_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_idEntrega($idEntrega){
            $idEntrega=$this->db_conn->real_escape_string($idEntrega);
            $sql="select * from entrega where idEntrega=$idEntrega";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idEntrega=mysqli_num_rows($result);
            $obj_det=null;
            if($total_idEntrega==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new entrega(
                    $renglon["idEntrega"],
                    $renglon["nomUsuario"],
                    $renglon["fechaEntrega"],
                    $renglon["proximoServicio"],
                    $renglon["Servicio_idServicio"],
                    $renglon["Servicio_Auto_numeroPlacas"],
                    $renglon["Servicio_Auto_Cliente_idCliente"]);
            }

            return $obj_det;
        }
        function lista_entrega(){
            $sql="select * from entrega;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idEntrega=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_idEntrega>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                $obj_det= new entrega(
                    $renglon["idEntrega"],
                    $renglon["nomUsuario"],
                    $renglon["fechaEntrega"],
                    $renglon["proximoServicio"],
                    $renglon["Servicio_idServicio"],
                    $renglon["Servicio_Auto_numeroPlacas"],
                    $renglon["Servicio_Auto_Cliente_idCliente"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

        function existe_entrega($idEntrega){
            $idEntrega=$this->db_conn->real_escape_string($idEntrega);
            $sql = "select count(*) from entrega";
            $sql.=" where idEntrega=$idEntrega";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_entrega($obj){
            
            $sql="insert into entrega(";
            $sql.="idEntrega,";
            $sql.="nomUsuario,";
            $sql.="fechaEntrega,";
            $sql.="proximoServicio,";
            $sql.="Servicio_idServicio,";
            $sql.="Servicio_Auto_numeroPlacas,";
            $sql.="Servicio_Auto_Cliente_idCliente)";

            $sql.=" values (";
            $sql.="".$obj->getIdEntrega().",";
            $sql.="'".$obj->getNomUsuario()."',";
            $sql.="'".$obj->getFechaEntrega()."',";
            $sql.="'".$obj->getProximoServicio()."',";
            $sql.="".$obj->getServicio_idServicio().",";
            $sql.="".$obj->getServicio_Auto_numeroPlacas().",";
            $sql.="".$obj->getServicio_Auto_Cliente_idCliente().")";
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

        function borra_entrega($idEntrega){
            $idEntrega=$this->db_conn->real_escape_string($idEntrega);
            $sql="delete from entrega where idEntrega=$idEntrega";
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

        function actualiza_entrega($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update entrega set ";
                    $sql .= "nomUsuario="."'".$obj->getNomUsuario()."',";
                    $sql .= "fechaEntrega="."'".$obj->getFechaEntrega()."',";
                    $sql .= "proximoServicio="."'".$obj->getProximoServicio()."',";
                    $sql .= "Servicio_idServicio=".$obj->getServicio_idServicio().",";
                    $sql .= "Servicio_Auto_numeroPlacas=".$obj->getServicio_Auto_numeroPlacas().",";
                    $sql .= "Servicio_Auto_Cliente_idCliente=".$obj->getServicio_Auto_Cliente_idCliente()."";
                    $sql .= " where idEntrega =".$obj->getIdEntrega();
            
             
            
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