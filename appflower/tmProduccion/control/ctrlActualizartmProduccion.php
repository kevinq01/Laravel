<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTmProduccion.php';

$modal = new Modal();
$TmProduccion = new tmProduccion();

$accion = $_POST['accion'];
$id_tmproduccion = $_POST['idTmProduccion'];
$operario = $_POST['operarioTmProduccion'];
$labor = $_POST['laborTmProduccion'];
$posicion = $_POST['posicionTmProduccion'];
$fecha = $_POST['fechaTmProduccion'];
$tiempo = $_POST['tiempoTmProduccion'];
$causa = $_POST['causaTmProduccion'];

$Operario = rtrim($operario, " ");
$Labor = rtrim($labor, " ");
$Posicion = rtrim($posicion, " ");
$Fecha = rtrim($fecha, " ");
$Tiempo = rtrim($tiempo, " ");
$Causa = rtrim($causa, " ");


try {

    if ($accion === "btn-update-tmProduccion") {

        if (empty($Operario) != 1 && empty($Tiempo) != 1) {
            $date = new DateTime($Fecha);
            $week = $date->format("W");
            $year = $date->format('Y');
            $Semana = "$year-W$week";

            $tiempoDecimal = round(($tiempo / 60), 2);
            
            if ($TmProduccion->updateTmProduccion($id_tmproduccion, $Operario, $Labor, $Posicion, $Causa, $Fecha, $Semana, $tiempoDecimal)) {
                $modal->modalInfo("success", "Tiempo muerto de producción  actualizado.");
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

?>
