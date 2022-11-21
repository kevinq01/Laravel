<?php
require_once('../../modal/modal.php');
require_once('../Modelo/ModeloUsuarios.php');


$modal = new Modal();
$Usuario = new Usuarios();

$correo = $_POST['correo'];
$nombre = $_POST['nombre'] . " " . $_POST['apellido'];
$password = $_POST['password'];
$perfil = $_POST['perfil_user'];


$Correo = rtrim($correo, " ");
$Nombre = rtrim($nombre, " ");
$Password = rtrim($password, " ");
$Perfil = rtrim($perfil, " ");

try {
    if (empty($Correo) != 1 && empty($Password) != 1 && empty($Nombre) != 1  && empty($Perfil) != 1) {
        if ($Usuario->insertarUsuario($Correo, $Nombre, $Password, $Perfil)) {
            $modal->modalInsert("success");
        } else {
            $modal->modalInfo("danger", "Error en la base de datos");
        }
    } else {
        $modal->modalInfo("primary", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalInfo("danger", "El correo: $Correo. Se encuentra registrado en el sistema, Por favor verifique la información.");
}


?>