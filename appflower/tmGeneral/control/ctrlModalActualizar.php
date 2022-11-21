<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTmGeneral.php';


$modal = new Modal();
$TmGeneral = new tmGeneral();

$id_general = $_POST['idTmGeneral'];
$accion = $_POST['accion'];


if ($accion == "btn-editar-tmGeneral") {

    $tmGeneral = $TmGeneral->listarTmGeneralUpdate($id_general);
    if ($tmGeneral != null) {
        foreach ($tmGeneral as $tmGeneral) {
            $laborNombre =  $tmGeneral['nombreLabor'];
            $idLabor =  $tmGeneral['labor'];
            $codigo =  $tmGeneral['operario'];
            $nombre =  $tmGeneral['nombre'];
            $fecha =  $tmGeneral['fecha'];
            $tiempo =  $tmGeneral['tiempo'];
            $nombreCausa =  $tmGeneral['nombreCausa'];
            $causa =  $tmGeneral['causa'];
        }
        $labores = $TmGeneral->listarLabor();
        $causas = $TmGeneral->listarCausa();
        $modal->modalActualiarTmGeneral($id_general,$fecha,$nombre, $codigo,$laborNombre, $idLabor, $labores,$nombreCausa,$causa,$causas,$tiempo);
    } else {
        $modal->modalInfo("danger","algo salio mal");
    }

}


?>
