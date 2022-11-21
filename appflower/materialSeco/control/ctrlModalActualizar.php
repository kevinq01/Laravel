<?php

require '../../modal/modal.php';
require '../Modelo/ModeloMaterialSeco.php';

$MaterialSeco = new materialSeco();
$Modal =  new Modal();

$id_seco = $_POST['id_seco'];
$accion = $_POST['accion'];


if ($accion === "btn-editar-materialSeco") {

    $materialSeco = $MaterialSeco->listaMateriaUpdate($id_seco);
    if ($materialSeco != null) {
        foreach ($materialSeco as $materialSeco) {
            $fecha =  $materialSeco['fecha'];
            $laborNombre =  $materialSeco['labor'];
            $idLabor =  $materialSeco['id_labor'];
            $operario =  $materialSeco['operario'];
            $nombre =  $materialSeco['nombre'];
            $hora =  $materialSeco['hora'];
            $cantidad =  $materialSeco['cantidad'];

        }
    }
    $labores = $MaterialSeco->listaLaborMaterial();
    $Modal->modalActualiarMaterial($id_seco,$fecha,$nombre, $operario,$idLabor,$laborNombre, $labores,$hora,$cantidad);
}


?>
