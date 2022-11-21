<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloEmpaque.php';


$modal = new Modal();
$empaque = new Empaque();


$accion = $_POST['accion'];
$idEmpaque = $_POST['idEmpaque'];
$operario = $_POST['operarioEmpaque'];
$labor = $_POST['laborEmpaque'];
$posicion = $_POST['posicionEmpaque'];
$fecha = $_POST['fechaEmpaque'];
$hora = $_POST['horaEmpaque'];
$cajas = $_POST['cajasEmpaque'];

$Operario = rtrim($operario, " ");
$Labor = rtrim($labor, " ");
$Posicion = rtrim($posicion, " ");
$Fecha = rtrim($fecha, " ");
$Hora = rtrim($hora, " ");
$Cajas = rtrim($cajas, " ");

try {

    if ($accion == "btn-update-empaque") {

        if (empty($Operario) != 1 && empty($Cajas) != 1) {
            $date = new DateTime($Fecha);
            $week = $date->format("W");
            $year = $date->format('Y');
            $Semana = "$year-W$week";
            
            if ($empaque->actualizarEmpaque($idEmpaque, $posicion, $labor, $Operario, $Fecha, $Semana, $Cajas, $Hora)) {
                $modal->modalInfo("success", "Empaque actualizado.");
            } else {
                $modal->modalInfo("danger", "Error en la base de datos");
            }
        } else {
            $modal->modalInfo("danger", "Verifica los datos ingresados.");
        }
    }
} catch (PDOException $e) {
    $modal->modalInfo("danger", "Verifica los datos ingresados.");
}
