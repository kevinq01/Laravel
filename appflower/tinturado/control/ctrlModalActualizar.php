<?php

require '../../modal/modal.php';
require '../Modelo/ModeloTinturados.php';

$tinturados = new Tinturados();
$Modal =  new Modal();

$id_tinturado = $_POST['id_tinturado'];
$accion = $_POST['accion'];


if ($accion === "btn-editar-tinturados") {

    $Tinturados = $tinturados->listaTinturadoUpdate($id_tinturado);
    if ($Tinturados != null) {
        foreach ($Tinturados as $Tinturados) {
            $fecha =  $Tinturados['fecha'];
            $operario =  $Tinturados['operario'];
            $nombre =  $Tinturados['nombre'];
            $horas =  $Tinturados['horas'];
            $tallos =  $Tinturados['tallos'];
        }
    }
    $Modal->modalActualiarTinturado($id_tinturado, $fecha, $nombre, $operario,$horas, $tallos);
}


?>
