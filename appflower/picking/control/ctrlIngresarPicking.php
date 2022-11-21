<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloPicking.php';


$modal = new Modal();
$picking = new Picking();


$operario = $_POST['operario'];
$fecha = $_POST['fecha'];
$horas = $_POST['horas'];
$tallos = $_POST['tallos'];


$Operario = rtrim($operario, " ");
$Fecha = rtrim($fecha, " ");
$Horas = rtrim($horas, " ");
$Tallos = rtrim($tallos, " ");

try {
    if (empty($Operario) != 1 && empty($Fecha) != 1  && empty($Horas) != 1  && empty($Tallos) != 1) {
        $date = new DateTime($Fecha);
        $week = $date->format("W");
        $year = $date->format('Y');
        $Semana = "$year-W$week";
        $Labor= 1;

        if ($picking->ingresarPicking($Operario,$Labor,$Fecha,$Semana,$Tallos,$Horas)) {
            $modal->modalInsert("success");
        } else {
            $modal->modalInfo("danger", "Error en la base de datos");
        }
    } else {
        $modal->modalInfo("primary", "Verifica los datos ingresados.");
    }
} catch (PDOException $e) {
    $modal->modalInfo("danger", "El operario: $Operario. No se encuentra registrado en el sistema, Por favor verifique la información.");
}


?>