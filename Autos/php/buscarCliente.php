<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("../class/class_auto_dal.php");
    $auto_ref = new auto_dal;
    $numeroPlacas = $_GET["numeroPlacas"];

    if($auto_ref->existe_auto($numeroPlacas)==1){
        $auto_ref = new auto_dal;
        $auto = $auto_ref->datos_por_numeroPlacas($numeroPlacas);
        echo json_encode($auto->getCliente_IdCliente());
    }
    else{
        $json["error"] = "no existe el auto";
        echo json_encode($json);
    }
?>