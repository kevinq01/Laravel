<?php
require_once('../Modelo/ModeloRoles.php');

$User = new Roles();
$accion = $_POST['accion'];


if($accion == "btn-sesionOut"){
    $User->logOut();
}


?>