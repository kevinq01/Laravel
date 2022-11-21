<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloEmpaque.php';


$modal = new Modal();
$empaque = new Empaque();

$operario = $_POST['operario'];
$labor = $_POST['labor'];
$posicion = $_POST['posicion'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$cajas = $_POST['cajas'];


$Operario = rtrim($operario, " ");
$Labor = rtrim($labor, " ");
$Posicion = rtrim($posicion, " ");
$Fecha = rtrim($fecha, " ");
$Hora = rtrim($hora, " ");
$Cajas = rtrim($cajas, " ");

try {
    if (empty($Operario) != 1 && empty($Labor) != 1 && empty($Posicion) != 1  && empty($Fecha) != 1 && empty($Hora) != 1  && empty($cajas) != 1) {

        $date = new DateTime($Fecha);
        $week = $date->format("W");
        $year = $date->format('Y');
        $Semana = "$year-W$week";

        if ($empaque->insertarProduccion($Posicion, $Labor, $Operario, $Fecha, $Semana, $cajas, $hora)) {
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
