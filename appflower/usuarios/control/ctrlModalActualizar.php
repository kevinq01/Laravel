<?php

require '../../modal/modal.php';
require '../Modelo/ModeloUsuarios.php';
require '../../roles/Modelo/ModeloRoles.php';

$Usuario = new Usuarios();
$Modal =  new Modal();
$Roles =  new Roles;

$correo = $_POST['correo'];
$accion = $_POST['accion'];


if ($accion == "btn-editar-usuario"){

    $Usuarios = $Usuario->getUsuarioById($correo);
    if ($Usuarios !=null) {
        foreach($Usuarios as $Usuarios){
            $nombre =  $Usuarios['nombre'];
            $password =  $Usuarios['password'];
            $id_perfil =  $Usuarios['perfil'];
            $nombrePerfil =  $Usuarios['tperfil'];

        }
        $arrayPerfil = $Usuario->listaPerfil();
        $Modal->modalActualizarUsuario($correo,$nombre,$password,$id_perfil,$nombrePerfil,$arrayPerfil);
    }
}


?>