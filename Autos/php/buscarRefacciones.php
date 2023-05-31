<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("../class/class_servicio_has_refaccion_dal.php");
    $servicio_ref = new servicio_has_refaccion_dal;
    $idServicio = $_GET["idServicio"];

    $lista = $servicio_ref->lista_servicio_has_refaccion();
    if($lista===null){
    }
    else{
        $i=0;
        foreach($lista as $servicio){
            if($servicio->getServicio_idServicio() === $idServicio){
                $renglon["Servicio_idServicio"] = $servicio->getServicio_idServicio();
                $renglon["Servicio_Auto_numeroPlacas"] = $servicio->getServicio_Auto_numeroPlacas();
                $renglon["Servicio_Auto_Cliente_idCliente"] = $servicio->getServicio_Auto_Cliente_idCliente();
                $renglon["Refaccion_idRefaccion"] = $servicio->getRefaccion_idRefaccion();
                $lista[$i]=$renglon;
                $i++;
            }
        }
        echo json_encode($lista);
    }
?>