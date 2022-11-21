<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloMaterialSeco.php';


$modal = new Modal();
$MaterialSeco = new materialSeco();


$accion = $_POST['accion'];
$idSeco = $_POST['idSeco'];
$operario = $_POST['operarioMaterial'];
$labor = $_POST['laborMaterial'];
$fecha = $_POST['fechaMaterial'];
$hora = $_POST['horaMaterial'];
$cantidad = $_POST['cantidadMaterial'];

$Operario = rtrim($operario, " ");
$Labor = rtrim($labor, " ");
$Fecha = rtrim($fecha, " ");
$Hora = rtrim($hora, " ");
$Cantidad = rtrim($cantidad, " ");



try {

    if ($accion == "btn-update-material") {

        if (empty($Operario) != 1 && empty($Cantidad) != 1) {
            $date = new DateTime($Fecha);
            $week = $date->format("W");
            $year = $date->format('Y');
            $Semana = "$year-W$week";

            if ($MaterialSeco->actualizarMaterialSeco($idSeco, $Operario,$Labor,$Semana,$Fecha, $Cantidad, $Hora)) {
                $modal->modalInfo("success", "Material seco actualizado.");
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