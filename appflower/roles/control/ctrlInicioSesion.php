<?php
require_once('../../modal/modal.php');
require_once('../Modelo/ModeloRoles.php');


$modal = new Modal(); 
$Usuario = new Roles();

$correo = $_POST['correo'];
$password = $_POST['password'];


$c = rtrim($correo, " ");
$p = rtrim($password, " ");

if(empty($c) != 1 && empty($p) != 1){
	if($Usuario->loginApp($c,$p)) {
		$modal->modalLogin("primary",$c);
	}else{
		$modal->modalInfo("danger","Error en la base de datos");
	}
}else{
	$modal->modalInfo("danger","Verifica los datos ingresados.");
}


?>