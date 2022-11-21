<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTmProduccion.php';


$modal = new Modal();
$TmProduccion = new tmProduccion();

$id_tmproduccion = $_POST['idTmProduccion'];
$accion = $_POST['accion'];


if ($accion === "btn-editar-tmProduccion") {

    $tmProduccion = $TmProduccion->listarTmProduccionUpdate($id_tmproduccion);
    if ($tmProduccion != null) {
        foreach ($tmProduccion as $tmProduccion) {
            $laborNombre =  $tmProduccion['nombreLabor'];
            $idLabor =  $tmProduccion['labor'];
            $codigo =  $tmProduccion['operario'];
            $nombre =  $tmProduccion['nombre'];
            $posicion =  $tmProduccion['posicion'];
            $fecha =  $tmProduccion['fecha'];
            $tiempo =  $tmProduccion['tiempo'];
            $nombreCausa =  $tmProduccion['nombreCausa'];
            $causa =  $tmProduccion['causa'];
        }
    } else {
        $modal->modalInfo("danger", "Problemas en la base de datos");
    }
    $labores = $TmProduccion->listarLaborProduccion();
    $causas = $TmProduccion->listarCausaProduccion();
    $modal->modalActualiarTmProduccion($id_tmproduccion, $fecha, $nombre, $codigo, $laborNombre, $idLabor, $labores, $posicion, $nombreCausa, $causa, $causas, $tiempo);
}

?>