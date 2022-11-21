<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTmEmpaque.php';


$modal = new Modal();
$TmEmpaque = new tmEmpaque();

$idTmEmpaque = $_POST['idTmEmpaque'];
$accion = $_POST['accion'];


if ($accion == "btn-editar-tmEmpaque") {

    $tmEmpaque = $TmEmpaque->listarTmEmpaqueUpdate($idTmEmpaque);
    if ($tmEmpaque != null) {
        foreach ($tmEmpaque as $tmEmpaque) {
            $id_tmEmpaque =  $tmEmpaque['id_empaquetm'];
            $fecha =  $tmEmpaque['fecha'];
            $codigo =  $tmEmpaque['operario'];
            $nombre =  $tmEmpaque['nombre'];
            $minutos =  $tmEmpaque['minutos'];
            $horas =  $tmEmpaque['horas'];
            $nombreCausa =  $tmEmpaque['causa'];
            $causa =  $tmEmpaque['nombreCausa'];
            $celula =  $tmEmpaque['celula'];
        }
        $causas = $TmEmpaque->listarCausaEmpaque();
        $modal->modalActualiarTmEmpaque($idTmEmpaque, $fecha, $nombre, $codigo, $nombreCausa, $causa, $causas,$celula, $horas, $minutos);
    } else {
        $modal->modalInfo("danger", "algo salio mal");
    }
}

?>