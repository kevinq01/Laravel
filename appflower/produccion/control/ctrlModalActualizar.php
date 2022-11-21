<?php

require '../../modal/modal.php';
require '../Modelo/ModeloProduccion.php';

$produccion = new Produccion();
$Modal =  new Modal();

$idProduccion = $_POST['idProduccion'];
$accion = $_POST['accion'];


if ($accion == "btn-editar-produccion") {

    $Produccion = $produccion->listarProduccionUpdate($idProduccion);
    if ($Produccion != null) {
        foreach ($Produccion as $Produccion) {
            $fecha =  $Produccion['fecha'];
            $laborNombre =  $Produccion['nombreLabor'];
            $idLabor =  $Produccion['labor'];
            $codigo =  $Produccion['operario'];
            $nombre =  $Produccion['nombre'];
            $posicion =  $Produccion['posicion'];
            $tiempo =  $Produccion['hora'];
            $tallos =  $Produccion['tallos'];
            $recetas =  $Produccion['recetas'];
        }
    }
    $labores = $produccion->listarLaborProduccion();
    $Modal->modalActualizarProduccion($idProduccion,$fecha, $nombre, $codigo,$laborNombre, $idLabor, $labores,$posicion,$tiempo,$tallos,$recetas);
}


?>
