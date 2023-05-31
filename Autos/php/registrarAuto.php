<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
    include("../class/class_auto_dal.php");
    $auto_ref = new auto_dal;
    $idCliente = $_POST["Cliente_idCliente"];
    $numeroPlacas = $_POST["numeroPlacas"];
    $marca = $_POST["marca"];
    $anio = $_POST["anio"];
    $modelo = $_POST["modelo"];

    $auto = new Auto($numeroPlacas, $marca, $anio, $modelo, $idCliente);
    if($auto_ref->existe_auto($numeroPlacas)==0){
        $auto_ref = new auto_dal;
        $auto_ref->insertar_auto($auto);
        print '<script>';
            print 'Swal.fire({
                title: "Sucess",
                text: "Auto agregado correctamente",
                icon: "success"
                }).then(function() {
                window.location = "../admin/Principal";
                });';
        print '</script>';
    }
    else{
        print '<script>';
        print 'Swal.fire({
            title: "Error",
            text: "Las placas del auto ya están registradas",
            icon: "error"
            }).then(function() {
            window.location = "../admin/Principal";
            });';
        print '</script>';
    }
?>