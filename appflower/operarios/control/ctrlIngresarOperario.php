<?php

require_once '../Modelo/ModeloOperarios.php';
require_once '../../modal/modal.php';

$modal =  new Modal();
$Operario =  new Operarios();

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'] . " " . $_POST['apellido'];
$cedula = $_POST['cedula'];


$Codigo = rtrim($codigo, " ");
$Nombre = rtrim($nombre, " ");
$Cedula = rtrim($cedula, " ");


try {

    if (empty($Codigo) != 1 && empty($Nombre) != 1 && empty($Cedula) != 1) {
        if ($Operario->ingresarOperarios($Codigo, $Nombre ,$Cedula)) {
            $modal->modalInsert("success");
        } else {
            $modal->modalInfo("danger", "Error en la base de datos");
        }
    } else {
        $modal->modalInfo("primary", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalInfo("danger", "El operario: $Codigo. Se encuentra registrado en el sistema, Por favor verifique la información.");
}


?>