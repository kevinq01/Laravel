<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTmEmpaque.php';

$modal = new Modal();
$TmEmpaque = new tmEmpaque();

$accion = $_POST['accion'];
$id_empaquetm = $_POST['idTmEmpaque'];
$operario = $_POST['operarioTmEmpaque'];
$celula = $_POST['celulaTmEmpaque'];
$fecha = $_POST['fechaTmEmpaque'];
$horas = $_POST['horasTmEmpaque'];
$minutos = $_POST['minutosTmEmpaque'];
$causa = $_POST['causaTmEmpaque'];

$Operario = rtrim($operario, " ");
$Celula = rtrim($celula, " ");
$Fecha = rtrim($fecha, " ");
$Minutos = rtrim($minutos, " ");
$Horas = rtrim($horas, " ");
$Causa = rtrim($causa, " ");


try {

    if ($accion === "btn-update-tmEmpaque") {

        if (empty($Operario) != 1 && empty($Minutos) != 1) {
            $date = new DateTime($Fecha);
            $week = $date->format("W");
            $year = $date->format('Y');
            $Semana = "$year-W$week";
            
            $minutosEnHoras = bcmul($Minutos, 60, 0);
            $HorasDecimal = (bcdiv($minutosEnHoras, 60, 2)/60);

            if ($TmEmpaque->updateTmEmpaque($id_empaquetm, $Operario, $Celula, $Causa, $Fecha, $Semana, $Minutos,$HorasDecimal)) {
                $modal->modalInfo("success", "Tiempo muerto de empaque  actualizado.");
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
