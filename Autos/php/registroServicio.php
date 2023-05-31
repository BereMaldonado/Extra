<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
    include("../class/class_servicio_dal.php");
    $servicio_ref = new servicio_dal;
    $idServicio = $_POST["idServicio"];
    $fechaIngreso = $_POST["fechaIngreso"];
    $tipoServicio = $_POST["tipoServicio"];
    $descripcion = $_POST["descripcion"];
    $estatus = $_POST["estatus"];
    $Auto_numeroPlacas = $_POST["Auto_numeroPlacas"];
    $Auto_Cliente_idCliente = $_POST["Auto_Cliente_idCliente"];

    $servicio = new servicio($idServicio, $fechaIngreso, $tipoServicio, $descripcion, $estatus, $Auto_numeroPlacas, $Auto_Cliente_idCliente);
    if($servicio_ref->existe_servicio($idServicio)==0){
        $servicio_ref = new servicio_dal;
        $servicio_ref->insertar_servicio($servicio);
        print '<script>';
            print 'Swal.fire({
                title: "Success",
                text: "servicio agregado correctamente -> ",
                icon: "success"
                }).then(function() {
                window.location = "../admin/Servicio";
                });';
        print '</script>';
    }
    else{
        $servicio_ref = new servicio_dal;
        $servicio_ref->actualiza_servicio($servicio);
        print '<script>';
        print 'Swal.fire({
            title: "Success",
            text: "servicio actualizado correctamente",
            icon: "success"
            }).then(function() {
            window.location = "../admin/Servicio";
            });';
        print '</script>';
    }
?>