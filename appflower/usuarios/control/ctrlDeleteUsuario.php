<?php 
require '../Modelo/ModeloUsuarios.php';
require '../../modal/modal.php';


$Usuario = new Usuarios();
$Modal = new Modal ();

$correo = $_POST['correo'];
$accion = $_POST['accion'];


if ($accion == "btn-delete-usuario") {
    if($Usuario->eliminarUsuario($correo)){
        $Modal->modalInfo("success","Usuario Eliminado");
    } else {
        $Modal->modalInfo("danger","Algo salió mal.");
    }
}





?>