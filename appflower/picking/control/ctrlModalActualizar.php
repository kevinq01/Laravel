<?php

require '../../modal/modal.php';
require '../Modelo/ModeloPicking.php';

$picking = new Picking();
$Modal =  new Modal();

$id_picking = $_POST['id_picking'];
$accion = $_POST['accion'];


if ($accion === "btn-editar-picking") {

    $Picking = $picking->listaPickingUpdate($id_picking);
    if ($Picking != null) {
        foreach ($Picking as $Picking) {
            $fecha =  $Picking['fecha'];
            $operario =  $Picking['operario'];
            $nombre =  $Picking['nombre'];
            $horas =  $Picking['horas'];
            $tallos =  $Picking['tallos'];

        }
    }
    $Modal->modalActualiarPicking($id_picking,$fecha,$nombre, $operario,$horas,$tallos);
}


?>

