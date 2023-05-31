<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
    include("../class/class_servicio_has_refaccion_dal.php");
    include("../class/class_servicio_dal.php");
    $refaccion_def = new servicio_has_refaccion_dal;
    $servicio_def = new servicio_dal;
    $Refaccion_idRefaccion = $_POST["refaccion"];
    $Servicio_idServicio = $_POST["idServicio"];


    if($servicio_def->existe_servicio($Servicio_idServicio)==1){
        $servicio_def = new servicio_dal;
        $servicio = $servicio_def->datos_por_idServicio($Servicio_idServicio);
        $refaccion = new servicio_has_refaccion($Servicio_idServicio, $servicio->getAuto_NumeroPlacas(), $servicio->getAuto_Cliente_IdCliente(), $Refaccion_idRefaccion);
        $refaccion_def->insertar_servicio_has_refaccion($refaccion);
        print '<script>';
            print 'Swal.fire({
                title: "Sucess",
                text: "refaccion agregada correctamente",
                icon: "success"
                }).then(function() {
                window.location = "../admin/Servicio";
                });';
        print '</script>';
    }
    else{
        print '<script>';
        print 'Swal.fire({
            title: "Error",
            text: "El servicio no existe",
            icon: "error"
            }).then(function() {
            window.location = "../admin/Servicio";
            });';
        print '</script>';
    }
?>