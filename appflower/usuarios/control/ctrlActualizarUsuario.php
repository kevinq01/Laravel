<?php

require '../Modelo/ModeloUsuarios.php';
require '../../modal/modal.php';

$Usuario = new Usuarios();
$Modal = new Modal ();

$accion = $_POST['accion'];
$correo = $_POST['correoUser'];
$nombre = $_POST['nombreUser'];
$password = $_POST['passwordUser'];
$id = $_POST['id'];
$perfil = $_POST['perfilUsuario'];


$Correo = rtrim($correo, " ");
$Nombre = rtrim($nombre, " ");
$Password = rtrim($password, " ");
$Perfil = rtrim($perfil, " ");
$Id = rtrim($id, " ");



if ($accion == "btn-update-usuarios") {
    if(empty($Correo) != 1 && empty($Nombre) != 1 && empty($Password) != 1 && empty($Perfil) != 1 && empty($Id) != 1){
        if ($Usuario->actualizarUsuario($Id,$Correo,$Nombre,$Password,$Perfil)) {
            $Modal->modalInfo("success","Usuario actualizado.");
        } else {
            $Modal->modalInfo("danger","Verifica los datos ingresados");
        }
    }else{
        $Modal->modalInfo("danger","Verifica los datos ingresados.");
    }
}

?>