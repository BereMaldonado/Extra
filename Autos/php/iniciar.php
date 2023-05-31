<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
    include("../class/class_usuario_dal.php");
    $usuario_ref = new usuario_dal();
    $nomUsuario = $_POST["nomUsuario"];
    $contrasena = $_POST["contrasena"];

    $usuario = $usuario_ref->datos_por_nomUsuario($nomUsuario);
    if($usuario===null){
        print '<script>';
            print 'Swal.fire({
                title: "Error",
                text: "Usuario Inexistente",
                icon: "error"
                }).then(function() {
                window.location = "../admin/Login";
                });';
        print '</script>';
    }
    elseif($usuario->getContrasena() === $contrasena){
        header('Location: ../admin/Principal');
    }
    else{
        print '<script>';
            print 'Swal.fire({
                title: "Error",
                text: "Contraseña Incorrecta",
                icon: "error"
                }).then(function() {
                window.location = "../admin/Login";
                });';
        print '</script>';
    }
?>