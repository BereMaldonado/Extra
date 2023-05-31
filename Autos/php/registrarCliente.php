<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
    include("../class/class_cliente_dal.php");
    $cliente_ref = new cliente_dal;
    $idCliente = $_POST["idCliente"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    $cliente = new Cliente($idCliente, $nombre, $apellido, $telefono, $direccion);
    if($cliente_ref->existe_cliente($idCliente)==0){
        $cliente_ref = new cliente_dal;
        $cliente_ref->insertar_cliente($cliente);
        print '<script>';
            print 'Swal.fire({
                title: "Sucess",
                text: "Cliente agregado correctamente",
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
            text: "El id del cliente ya existe",
            icon: "error"
            }).then(function() {
            window.location = "../admin/Principal";
            });';
        print '</script>';
    }
?>