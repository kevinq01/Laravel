<?php

require '../Modelo/ModeloProduccion.php';
require '../../modal/modal.php';

$produccion = new Produccion();
$Modal = new Modal();

$accion = $_POST['accion'];
$idProduccion = $_POST['idProduccion'];
$operario = $_POST['codigoProduccion'];
$fecha = $_POST['fechaProduccion'];
$posicion = $_POST['posicionProduccion'];
$labor = $_POST['laborProduccion'];
$hora = $_POST['horasProduccion'];


$Operario = rtrim($operario, " ");
$Labor = rtrim($labor, " ");
$Posicion = rtrim($posicion, " ");
$Fecha = rtrim($fecha, " ");
$Hora = rtrim($hora, " ");

try {
    if ($accion === "btn-update-Produccion") {
        $date = new DateTime($Fecha);
        $week = $date->format("W");
        $year = $date->format('Y');
        $Semana = "$year-W$week";

        if (empty($Operario) != 1 && empty($Labor) != 1 && empty($Posicion) != 1  && empty($Fecha) != 1 && empty($Hora) != 1) {

            if ($labor === "1") {

                $recetas = $_POST['recetasProduccion'];
                $Separador = str_replace("+", ',', $recetas);
                $produccion_arreglo = preg_split("/\,/", $Separador);
                $Tallos = array_sum($produccion_arreglo);

                if ($produccion->actualizarProduccion($idProduccion, $Operario, $Labor, $Posicion, $Fecha, $Semana, $Tallos, $Hora, $recetas)) {
                    $Modal->modalInsert("success");
                } else {
                    $Modal->modalInfo("danger", "Error en la base de datos");
                }
            } else {

                $Tallos = $_POST['tallosProduccion'];
                $recetas = null;

                if ($produccion->actualizarProduccion($idProduccion, $Operario, $Labor, $Posicion, $Fecha, $Semana, $Tallos, $Hora, $recetas)) {
                    $Modal->modalInsert("success");
                } else {
                    $Modal->modalInfo("danger", "Error en la base de datos");
                }
            }
        } else {
            $Modal->modalInfo("primary", "Verifica los datos ingresados.");
        }
    }
} catch (PDOException $e) {
    $Modal->modalInfo("danger", "Verifica los datos ingresados.");
}
?>