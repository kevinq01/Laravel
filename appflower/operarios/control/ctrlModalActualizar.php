<?php

require '../../modal/modal.php';
require '../Modelo/ModeloOperarios.php';

$Operario = new Operarios();
$Modal =  new Modal();

$codigo = $_POST['codigo'];
$accion = $_POST['accion'];


if ($accion == "btn-editar-operario"){

    $Operarios = $Operario->listarOperario($codigo);
    if ($Operarios !=null) {
        foreach($Operarios as $Operarios){
            $nombre =  $Operarios['nombre'];
            $cedula =  $Operarios['cedula'];
        }
        $Modal->modalActualizarOperario($codigo,$cedula,$nombre);
    }
}


?>