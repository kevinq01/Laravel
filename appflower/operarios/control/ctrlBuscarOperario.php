<?php

require '../../modal/modal.php';
require '../Modelo/ModeloOperarios.php';

$Operario = new Operarios();
$Modal =  new Modal();

$codigo = $_POST['codigo'];
$accion = $_POST['accion'];


if ($accion == "btn-buscar-operario" && empty($codigo) != 1) {

    if (is_numeric($codigo)) {

        $Operarios = $Operario->listarOperarioById($codigo);
        if ($Operarios != null) {
            echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false'>";
            echo    "<div class='modal-dialog modal-dialog-centered'>";
            echo        "<div class='modal-content'>";
            echo            "<div class='modal-header border-0'>";
            echo                "<h6 class='modal-title text-primary'><i class='fas fa-info'></i> Información del operario</h6>";
            echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            echo            "</div>";
            echo            "<div class='modal-body p-0'>";
            echo                "<table class='table table-border table-hover text-center'>";
            echo                    "<tr>";
            echo                        "<th>Codigo</th>";
            echo                        "<th>Nombre</th>";
            echo                        "<th>Cédula</th>";
            echo                        "<th>Acción</th>";
            echo                    "</tr>";
            echo                    "<tr>";
            foreach ($Operarios as $Operarios) {
                $codigo =  $Operarios['id_operario'];
                $nombre =  $Operarios['nombre'];
                $cedula =  $Operarios['cedula'];
                echo                        "<td>$codigo</td>";
                echo                        "<td>$nombre</td>";
                echo                        "<td>$cedula</td>";
                echo                        "<td>";
                echo                        "<button class='btn  btn-sm  btn-outline-primary border-0' id='btn-editar-operario' value='$codigo'>Editar</button>";
                echo                        "<button class='btn btn-sm btn-outline-danger  border-0  lp' id='btn-eliminar-operario' value='$codigo'><i class='far fa-trash-alt' style='pointer-events: none;'></i></button>";
                echo                        "</td>";
                echo                    "</tr>";
            }
            echo                "</table>";
            echo            "</div>";
            echo        "</div>";
            echo    "</div>";
            echo "</div>";
            echo "<script>$('#modal-login').modal('show')</script>";
        } else {
            $Modal->modalInfo("danger", "El operario no se encuentra registrado");
        }
    } else {

        $nombre = $codigo;
        $Operarios = $Operario->listarOperarioByNombre($nombre);
        if ($Operarios != null) {
            echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false'>";
            echo    "<div class='modal-dialog modal-dialog-centered'>";
            echo        "<div class='modal-content'>";
            echo            "<div class='modal-header border-0'>";
            echo                "<h6 class='modal-title text-primary'><i class='fas fa-info'></i> Información del operario</h6>";
            echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            echo            "</div>";
            echo            "<div class='modal-body p-0'>";
            echo                "<table class='table table-border table-hover'>";
            echo                    "<tr>";
            echo                        "<th>Codigo</th>";
            echo                        "<th>Nombre</th>";
            echo                    "</tr>";
            echo                    "<tr>";
            foreach ($Operarios as $Operarios) {
                $codigo =  $Operarios['id_operario'];
                $nombre =  $Operarios['nombre'];
                $cedula =  $Operarios['cedula'];
                echo                        "<td>$codigo</td>";
                echo                        "<td>$nombre</td>";
                echo                        "<td>$cedula</td>";
                echo                        "<td>";
                echo                        "<button class='btn  btn-sm  btn-outline-primary border-0' id='btn-editar-operario' value='$codigo'>Editar</button>";
                echo                        "<button class='btn btn-sm btn-outline-danger  border-0  lp' id='btn-eliminar-operario' value='$codigo'><i class='far fa-trash-alt' style='pointer-events: none;'></i></button>";
                echo                        "</td>";
                echo                    "</tr>";
            }
            echo                "</table>";
            echo            "</div>";
            echo        "</div>";
            echo    "</div>";
            echo "</div>";
            echo "<script>$('#modal-login').modal('show')</script>";
        } else {
            $Modal->modalInfo("danger", "El operario no se encuentra registrado");
        }
    }
} else {
    $Modal->modalInfo("primary", "Ingresa el codigo o nombre del operario");
}

?>
