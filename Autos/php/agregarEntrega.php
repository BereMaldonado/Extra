<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
    include("../class/class_entrega_dal.php");
    $entrega_def = new entrega_dal;
    $identrega = $_POST["idEntrega"];
    $nomUsuario = $_POST["nomUsuario"];
    $fechaEntrega = $_POST["fechaEntrega"];
    $proximoServicio = $_POST["proximoServicio"];
    $Servicio_idServicio = $_POST["idServicio"];
    $Servicio_Auto_numeroPlacas = $_POST["Servicio_Auto_numeroPlacas"];
    $Servicio_Auto_Cliente_idCliente = $_POST["Servicio_Auto_Cliente_idCliente"];

    if($entrega_def->existe_entrega($identrega)==0){
        $entrega_def = new entrega_dal;
        $entrega = new Entrega($identrega, $nomUsuario, $fechaEntrega, $proximoServicio, $Servicio_idServicio, $Servicio_Auto_numeroPlacas, $Servicio_Auto_Cliente_idCliente);
        $entrega_def->insertar_entrega($entrega);
        print '<script>';
            print 'Swal.fire({
                title: "Sucess",
                text: "Entrega agregada correctamente",
                icon: "success"
                }).then(function() {
                window.location = "../admin/Entregar";
                });';
        print '</script>';
    }
    else{
        print '<script>';
        print 'Swal.fire({
            title: "Error",
            text: "La entrega ya existe",
            icon: "error"
            }).then(function() {
            window.location = "../admin/Entregar";
            });';
        print '</script>';
    }
?>