<?php
    include("class_cliente.php");
    include("class_db.php");

    class cliente_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        public function datos_por_idCliente($idCliente){
            $idCliente=$this->db_conn->real_escape_string($idCliente);
            $sql="select * from cliente where idCliente=$idCliente";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idCliente=mysqli_num_rows($result);
            $obj_det=null;
            if($total_idCliente==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new cliente(
                    $renglon["idCliente"],
                    $renglon["nombre"],
                    $renglon["apellido"],
                    $renglon["telefono"],
                    $renglon["direccion"]);
            }

            return $obj_det;
        }
        function lista_cliente(){
            $sql="select * from cliente;";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) 
            or die (mysqli_error($this->db_conn));

            $total_idCliente=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_idCliente>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($result)){
                    $obj_det= new cliente(
                        $renglon["idCliente"],
                        $renglon["Nombre"],
                        $renglon["Apellido"],
                        $renglon["Telefono"],
                        $renglon["Direccion"]);
                    $i++;
                    $lista[$i]=$obj_det; 
                    unset($obj_det);
                }//end while
                return $lista;
            }
        }

        function existe_cliente($idCliente){
            $idCliente=$this->db_conn->real_escape_string($idCliente);
            $sql = "select count(*) from cliente";
            $sql.=" where idCliente=$idCliente";

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

            return $cuantos;    
        }

        function insertar_cliente($obj){
            
            $sql="insert into cliente(";
            $sql.="idCliente,";
            $sql.="nombre,";
            $sql.="apellido,";
            $sql.="telefono,";
            $sql.="direccion)";

            $sql.=" values (";
            $sql.="".$obj->getIdCliente().",";
            $sql.="'".$obj->getNombre()."',";
            $sql.="'".$obj->getApellido()."',";
            $sql.="'".$obj->getTelefono()."',";
            $sql.="'".$obj->getDireccion()."')";
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

        function borra_cliente($idCliente){
            $idCliente=$this->db_conn->real_escape_string($idCliente);
            $sql="delete from cliente where idCliente=$idCliente";
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

        function actualiza_cliente($obj){
            /*
                    echo '<pre>';
                    echo print_r($obj);
                    echo '</pre>';
                    exit;
            */
                    $sql = "update cliente set ";
                    $sql .= "nombre="."'".$obj->getNombre()."',";
                    $sql .= "apellido="."'".$obj->getApellido()."',";
                    $sql .= "telefono="."'".$obj->getTelefono()."',";
                    $sql .= "direccion="."'".$obj->getDireccion()."'";
                    $sql .= " where idCliente =".$obj->getIdCliente();
            
             
            
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