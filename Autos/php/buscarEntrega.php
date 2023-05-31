<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("../class/class_entrega_dal.php");
    $entrega_ref = new entrega_dal;
    $numeroPlacas = $_GET["auto"];
    $lista = $entrega_ref->lista_entrega();
    if($lista === null){
        $json["dato"] = "no existe el entrega";
        echo json_encode($json);
    }
    else{
        foreach($lista as $entrega){
            if($entrega->getServicio_Auto_numeroPlacas()===$numeroPlacas){
                $json["dato"] = "fecha del siguiente servicio: ".$entrega->getProximoServicio();
                echo json_encode($json);
                return;
            }
        }
        $json["dato"] = "No se ha dado siguiente fecha de servicio al carro";
        echo json_encode($json);
    }
?>