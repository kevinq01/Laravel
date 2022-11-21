<?php

require '../../modal/modal.php';
require '../Modelo/ModeloUsuarios.php';

$Usuario = new Usuarios();
$Modal = new Modal ();

$correo = $_POST['correo'];
$accion = $_POST['accion'];


if ($accion == "btn-eliminar-usuario"){

    $Usuarios = $Usuario->getUsuarioById($correo);
    if ($Usuarios !=null) {
        foreach($Usuarios as $Usuarios){
            $correo =  $Usuarios['correo'];
            $nombre =  $Usuarios['nombre'];
        }
        $Modal->modalEliminar("danger",$nombre,$correo);
    }
}





?>