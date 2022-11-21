<?php
require_once '../../modal/modal.php';
require_once '../Modelo/ModeloTmEmpaque.php';


$Modal = new Modal();
$TmEmpaque = new tmEmpaque();


$codigo = $_POST['idTmEmpaque'];
$accion = $_POST['accion'];




if ($accion === "btn-buscar-tmEmpaque" && empty($codigo) != 1) {


    $tmEmpaque = $TmEmpaque->listartmEmpaqueTable($codigo);
    if ($tmEmpaque != null) {

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

        foreach ($tmEmpaque as $tmEmpaque) {
            $id_tmEmpaque =  $tmEmpaque['id_empaquetm'];
            $fecha =  $tmEmpaque['fecha'];
            $semana =  $tmEmpaque['Semana'];
            $codigo =  $tmEmpaque['operario'];
            $nombre =  $tmEmpaque['nombre'];
            $minutos =  $tmEmpaque['minutos'];
            $horas =  $tmEmpaque['horas'];
            $causa =  $tmEmpaque['causa'];
            $celula =  $tmEmpaque['celula'];
            echo                            "<div class=''>";
            echo                                "<button class='btn btn-block  p-0 border bg-light rounded-0 shadow-none px-2 text-dark' data-toggle='collapse' data-target='#tarjeta$id_tmEmpaque' aria-expanded='true' aria-controls='tarjeta$id_tmEmpaque'>";
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
            echo                            "<div class='collapse border border-top-0 ' id='tarjeta$id_tmEmpaque' data-parent='#accordionModal'>";
            echo                             "<ul class='list-group list-group-flush'>";
            echo                             "<li class='list-group-item lp d-flex justify-content-between'>";
            echo                                 "<div><b>Posicion </b>: $celula </div>";
            echo                                     "<div class='text-center'>";
            echo                                         "<button class='btn btn-sm btn-outline-primary border-0 lp' id='btn-editar-tmEmpaque' value='$id_tmEmpaque'>Editar</button>";
            echo                                     "</div>";
            echo                             "</li>";
            echo                              "<li class='list-group-item lp'><b>Operario </b>: $codigo</li>";
            echo                              "<li class='list-group-item lp'><b>Nombre </b>: $nombre</li>";
            echo                              "<li class='list-group-item lp'><b>Fecha </b>: $fecha</li>";
            echo                              "<li class='list-group-item lp'><b>Semana </b>:  $semana</li>";
            echo                              "<li class='list-group-item lp'><b>Horas </b>: $horas</li>";
            echo                              "<li class='list-group-item lp'><b>Minutos </b>: $minutos</li>";
            echo                              "<li class='list-group-item lp'><b>Causa </b>:  $causa</li>";
            echo                            "</ul>";
            echo                            "</div>";
        }

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