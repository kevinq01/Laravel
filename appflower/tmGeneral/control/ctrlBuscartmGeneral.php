<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTmGeneral.php';


$Modal = new Modal();
$TmGeneral = new tmGeneral();


$codigo = $_POST['idTmGeneral'];
$accion = $_POST['accion'];




if ($accion === "btn-buscar-tmGeneral" && empty($codigo) != 1) {

    $tmGeneral = $TmGeneral->listarTmGeneralTable($codigo);
    if ($tmGeneral != null) {

        echo "<div class='modal fade table-sm' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='fas fa-info'></i> Información de producción</h6>";
        echo                "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-0'>";
        echo                "<table class='table table-sm table-responsive-sm  table-border table-hover'>";
        echo                    "<tr>";
        echo                        "<div id='accordionModal'>";

        foreach ($tmGeneral as $tmGeneral) {
            $id_tmGeneral =  $tmGeneral['id_general'];
            $fecha =  $tmGeneral['fecha'];
            $semana =  $tmGeneral['Semana'];
            $Labornombre =  $tmGeneral['nombreLabor'];
            $labor =  $tmGeneral['labor'];
            $codigo =  $tmGeneral['operario'];
            $nombre =  $tmGeneral['nombre'];
            $tiempo =  $tmGeneral['tiempo'];
            $causa =  $tmGeneral['nombreCausa'];
            echo                            "<div class=''>";
            echo                                "<button class='btn btn-block  p-0 border bg-light rounded-0 shadow-none px-2 text-dark' data-toggle='collapse' data-target='#tarjeta$id_tmGeneral' aria-expanded='true' aria-controls='tarjeta$id_tmGeneral'>";
            echo                                     "<div class='row text-center'>";
            echo                                        "<div class='col-8 d-flex justify-content-start'>";
            echo                                            "<div class='m-2'><i class='fad fa-user-hard-hat text-muted pr-1'></i> $nombre</div>";
            echo                                        "</div>";
            echo                                        "<div class='col d-flex justify-content-end'>";
            echo                                            "<div class='m-2'>$fecha</div>";
            echo                                        "</div>";
            echo                                     "</div>";
            echo                                "</button>";
            echo                            "</div>";
            echo                            "<div class='collapse border border-top-0 ' id='tarjeta$id_tmGeneral' data-parent='#accordionModal'>";
            echo                             "<ul class='list-group list-group-flush'>";
            echo                             "<li class='list-group-item lp d-flex justify-content-between'>";
            echo                                 "<div><b>Labor </b>: $Labornombre </div>";
            echo                                     "<div class='text-center'>";
            echo                                         "<button class='btn btn-sm btn-outline-primary border-0 lp' id='btn-editar-tmGeneral' value='$id_tmGeneral'>Editar</button>";
            echo                                     "</div>";
            echo                             "</li>";
            echo                              "<li class='list-group-item lp'><b>Codigo </b>: $codigo</li>";
            echo                              "<li class='list-group-item lp'><b>Nombre </b>: $nombre</li>";
            echo                              "<li class='list-group-item lp'><b>Fecha </b>: $fecha</li>";
            echo                              "<li class='list-group-item lp'><b>Semana </b>:  $semana</li>";
            echo                              "<li class='list-group-item lp'><b>Tiempo </b>: $tiempo</li>";
            echo                              "<li class='list-group-item lp'><b>Tallos </b>:  $causa</li>";
            echo                        "</ul>";
            echo                        "</div>";
        }
        echo                        "</div>";
        echo                    "</tr>";
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
    $Modal->modalInfo("primary", "ingresa el codigo o nombre del operario");
}


?>