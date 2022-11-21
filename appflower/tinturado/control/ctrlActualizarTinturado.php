<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTinturados.php';


$modal = new Modal();
$tinturados = new Tinturados();


$accion = $_POST['accion'];
$idTinturado = $_POST['idTinturado'];
$operario = $_POST['operarioTinturado'];
$fecha = $_POST['fechaTinturado'];
$hora = $_POST['horasTinturado'];
$tallos = $_POST['tallosTinturado'];

$Operario = rtrim($operario, " ");
$Fecha = rtrim($fecha, " ");
$Horas = rtrim($hora, " ");
$Tallos = rtrim($tallos, " ");



try {

    if ($accion === "btn-update-tinturado") {

        if (empty($Operario) != 1 && empty($Tallos) != 1) {
            $date = new DateTime($Fecha);
            $week = $date->format("W");
            $year = $date->format('Y');
            $Semana = "$year-W$week";
            $Labor = 2;

            if ($tinturados->actualizarTinturado($idTinturado, $Operario, $Labor, $Fecha,  $Semana,  $Tallos, $Horas)) {
                $modal->modalInfo("success", "Tinturado  actualizado.");
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
