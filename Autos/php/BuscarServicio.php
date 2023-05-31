<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("../class/class_servicio_dal.php");
    $servicio_ref = new servicio_dal;
    $idServicio = $_GET["idServicio"];

    if($servicio_ref->existe_servicio($idServicio)==1){
        $servicio_ref = new servicio_dal;
        $servicio = $servicio_ref->datos_por_idServicio($idServicio);
        $json["idServicio"] = $servicio->getIdServicio();
        $json["fechaIngreso"]  = $servicio->getFechaIngreso();
        $json["tipoServicio"]  = $servicio->getTipoServicio();
        $json["descripcion"]  = $servicio->getDescripcion();
        $json["estatus"]  = $servicio->getEstatus();
        $json["Auto_NumeroPlacas"]  = $servicio->getAuto_NumeroPlacas();
        $json["Auto_Cliente_IdCliente"]  = $servicio->getAuto_Cliente_IdCliente();
        echo json_encode($json);
    }
    else{
        $json["error"] = "no existe el servicio";
        echo json_encode($json);
    }
?>