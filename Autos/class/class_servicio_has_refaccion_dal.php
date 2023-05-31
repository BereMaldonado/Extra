<?php
    include("class_servicio_has_refaccion.php");
    include("class_db.php");

    class servicio_has_refaccion_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_Servicio_idServicio($Servicio_idServicio){
            $Servicio_idServicio=$this->db_conn->real_escape_string($Servicio_idServicio);
            $sql="select * from servicio_has_refaccion where Servicio_idServicio=$Servicio_idServicio";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_Servicio_idServicio=mysqli_num_rows($result);
            $obj_det=null;
            if($total_Servicio_idServicio==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new servicio_has_refaccion(
                    $renglon["Servicio_idServicio"],
                    $renglon["Servicio_Auto_numeroPlacas"],
                    $renglon["Servicio_Auto_Cliente_idCliente"],
                    $renglon["Refaccion_idRefaccion"]);
            }

            return $obj_det;
        }
        function lista_servicio_has_refaccion(){
            $sql="select * from servicio_has_refaccion;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_Servicio_idServicio=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_Servicio_idServicio>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                $obj_det= new servicio_has_refaccion(
                    $renglon["Servicio_idServicio"],
                    $renglon["Servicio_Auto_numeroPlacas"],
                    $renglon["Servicio_Auto_Cliente_idCliente"],
                    $renglon["Refaccion_idRefaccion"]);

                        $i++;
                        $lista[$i]=$obj_det;
                        unset($obj_det); 
                }//end while
                return $lista;
            }
        }

        function existe_servicio_has_refaccion($Servicio_idServicio){
            $Servicio_idServicio=$this->db_conn->real_escape_string($Servicio_idServicio);
            $sql = "select count(*) from servicio_has_refaccion";
            $sql.=" where Servicio_idServicio=$Servicio_idServicio";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_servicio_has_refaccion($obj){
            
            $sql="insert into servicio_has_refaccion(";
            $sql.="Servicio_idServicio,";
            $sql.="Servicio_Auto_numeroPlacas,";
            $sql.="Servicio_Auto_Cliente_idCliente,";
            $sql.="Refaccion_idRefaccion)";

            $sql.=" values (";
            $sql.="".$obj->getServicio_idServicio().",";
            $sql.="".$obj->getServicio_Auto_numeroPlacas().",";
            $sql.="".$obj->getServicio_Auto_Cliente_idCliente().",";
            $sql.="".$obj->getRefaccion_idRefaccion().")";
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

        function borra_servicio_has_refaccion($Servicio_idServicio){
            $Servicio_idServicio=$this->db_conn->real_escape_string($Servicio_idServicio);
            $sql="delete from servicio_has_refaccion where Servicio_idServicio=$Servicio_idServicio";
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

        function actualiza_servicio_has_refaccion($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update servicio_has_refaccion set ";
                    $sql .= "Servicio_Auto_numeroPlacas=".$obj->getServicio_Auto_numeroPlacas().",";
                    $sql .= "Servicio_Auto_Cliente_idCliente=".$obj->getServicio_Auto_Cliente_idCliente().",";
                    $sql .= "Refaccion_idRefaccion=".$obj->getRefaccion_idRefaccion()."";
                    $sql .= " where Servicio_idServicio =".$obj->getServicio_idServicio();
            
             
            
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