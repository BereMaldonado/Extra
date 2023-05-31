<?php
    include('class_auto_dal.php');
    $obj_auto =  new auto_dal;
    $resultado = $obj_auto->datos_por_numeroPlacas(1);

    if ($resultado == null){
        echo "No se encontró numeroPlacas";
    }
    else{
        echo '<pre>';
        echo print_r($resultado);
        echo '</pre>';
    }


    $listado=$obj_auto->lista_auto();
    if ($listado==null){
        echo "error no hay lista de autos";
    }
    else{
        echo '<pre>';
        echo print_r($listado);
        echo '</pre>';
    }

/*existe auto*/
echo '<br>';
$result_exis=$obj_auto->existe_auto(1);
if ($result_exis==1){
    echo "auto si existe";
}
else{
    echo "auto no existe";
}


/*insertado*/
 echo '<br>';
$obj_ins= new auto(1, "FIAT", 2019, "FIAT 1", 1);
$result_ins=$obj_auto->insertar_auto($obj_ins);
if ($result_ins==1){
    echo "auto insertado correctamente";
}
else{
    echo "no se inserto auto, vuela intentar";
}


echo '<br>';
/*update*/
$obj_upd= new auto(1, "FIAT", 2023, "FIAT 30", 1);
$result_upd=$obj_auto->actualiza_auto($obj_upd);
if ($result_upd==1){
    echo "auto actualizado correctamente";
}
else{
    echo "no se actualizo auto, vuela intentar 200 veces";
}


echo '<br>';
/*borrado*/
$result_del=$obj_auto->borra_auto(1);
if ($result_del==1){
    echo "auto borrado correctamente";
}
else{
    echo "no se borro auto, vuela intentar 200 veces";
}

?>