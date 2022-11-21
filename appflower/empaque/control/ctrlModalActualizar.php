<?php

require '../../modal/modal.php';
require '../Modelo/ModeloEmpaque.php';

$empaque = new Empaque();
$Modal =  new Modal();

$idEmpaque = $_POST['idEmpaque'];
$accion = $_POST['accion'];


if ($accion == "btn-editar-empaque") {

    $Empaque = $empaque->listarEmpaqueUpdate($idEmpaque);
    if ($Empaque != null) {
        foreach ($Empaque as $Empaque) {
            $fecha =  $Empaque['fecha'];
            $laborNombre =  $Empaque['labor'];
            $idLabor =  $Empaque['id_labor'];
            $operario =  $Empaque['operario'];
            $nombre =  $Empaque['nombre'];
            $posicion =  $Empaque['posicion'];
            $hora =  $Empaque['hora'];
            $cajas =  $Empaque['cajas'];

        }
    }
    $labores = $empaque->listaLaborEmpaque();
    $Modal->modalActualizarEmpaque($idEmpaque,$fecha,$nombre, $operario,$posicion,$idLabor,$laborNombre, $labores,$hora,$cajas);
}


?>
