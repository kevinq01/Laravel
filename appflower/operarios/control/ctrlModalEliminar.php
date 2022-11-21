<?php

require '../../modal/modal.php';
require '../Modelo/ModeloOperarios.php';

$Operario = new Operarios();
$Modal = new Modal ();

$accion = $_POST['accion'];
$Codigo = $_POST['codigo'];


if ($accion == "btn-eliminar-operario"){

    $Operarios = $Operario->listarOperarioByIdLimit($Codigo);
    if ($Operarios !=null) {
        foreach($Operarios as $Operarios){
            $nombre =  $Operarios['nombre'];
        }
        $Modal->modalEliminarOperario("danger",$nombre,$Codigo);
    }
}





?>