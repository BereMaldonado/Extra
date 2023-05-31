<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("../class/class_servicio_has_refaccion_dal.php");
    include("../class/class_refaccion_dal.php");
    $servicio_ref = new servicio_has_refaccion_dal;
    $refaccion_ref = new refaccion_dal;
    $idServicio = $_GET["idServicio"];

    $lista = $servicio_ref->lista_servicio_has_refaccion();
    if($lista===null){
    }
    else{
        $i=0;
        foreach($lista as $servicio){
            if($servicio->getServicio_idServicio() === $idServicio){
                $refaccion = $refaccion_ref->datos_por_idRefaccion($servicio->getRefaccion_idRefaccion());
                $renglon["idRefaccion"] = $refaccion->getIdRefaccion();
                $renglon["modelo"] = $refaccion->getModelo();
                $renglon["marca"] = $refaccion->getMarca();
                $renglon["pieza"] = $refaccion->getPieza();
                $lista[$i]=$renglon;
                $i++;
            }
        }
        echo json_encode($lista);
    }
?>