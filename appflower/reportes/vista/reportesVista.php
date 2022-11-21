<?php
require_once('../../roles/Modelo/ModeloRoles.php');

$user = new Roles();
$user->session();
$date = date('Y-m-d');
$dateObject = new DateTime($date);
$week = $dateObject->format("W");
$year = $dateObject->format('Y');
$semana = "$year-W$week";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="../../img/isabelitaLogo.jpg">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="app.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>Reportes</title>
</head>

<body>

    <div class="container-fluid">
        <div id="respuesta"></div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 bg-light mb-sm-4 mb-md-0 lateralMenu">

                <div class="col" style="height: 20px;"></div>

                <div id="respuesta-menu">

                    <div id="spinner">
                        <div class="spinner  animate__animated animate__fadeIn">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col vh-100 border-left">


                <div class="row  border-bottom border-top">

                    <!-- Image and text -->
                    <nav class="navbar navbar-light w-100 pl-1">
                        <div class="navbar-brand">
                            <button type="button" id="hamburguer-menu" class="btn text-dark"><i class="far fa-bars fa-lg"></i></button>
                            <?php echo $user->getUsername(); ?>
                            <input type="hidden" name="perfil" id="perfil" value="<?= $_SESSION['perfil'] ?>"></input>
                        </div>
                        <button type="button" class="btn text-danger ml-auto" id="btn-logOut"><i class="fal fa-sign-out-alt fa-lg"></i></button>
                    </nav>

                </div>



                <div class="row m-3 justify-content-center">

                    <!--Primer Collapse-->
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3 mb-sm-3 mb-lg-0">


                        <div id="accordion">

                            <!-- Reporte de armado (Primer tarjeta)-->
                            <div class="card mb-3">
                                <div class="card-header" id="headingOne">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#carduno" aria-expanded="true" aria-controls="carduno">
                                        <i class="fas fa-flag pr-1"></i>Reporte de armado
                                    </button>
                                </div>
                                <div id="carduno" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">

                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOption">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaArmado" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdeArmado" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaAmardo" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaArmado" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semana" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento armado
                                            <a href="javascript:reporte('ctrlArmadoRendimiento','desdeArmado','hastaAmardo','selectOption','semana');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center py-1">
                                            Rendmiento mayor a menor
                                            <a href="javascript:reporte('ctrlArmadoMayorMenor','desdeArmado','hastaAmardo','selectOption','semana');" type="button" class="btn text-primary"><i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Tallos mayor a menor
                                            <a href="javascript:reporte('ctrlArmadoMenorMayorTallos','desdeArmado','hastaAmardo','selectOption','semana');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Reporte armado
                                            <a href="javascript:reporte('ctrlProduccionGeneral','desdeArmado','hastaAmardo','selectOption','semana');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--Reporte de  armado banda(Segunda Tarjeta)-->
                            <div class="card mb-3">

                                <div class="card-header" id="headingTwo">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-flag pr-1"></i>Reporte de armado banda
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOptionBanda">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaArmadoBanda" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdeArmadoBanda" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaArmadoBanda" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaArmadoBanda" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semanaBanda" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento armado banda
                                            <a href="javascript:reporte('ctrlBandaRendimiento','desdeArmadoBanda','hastaArmadoBanda','selectOptionBanda','semanaBanda');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendmiento mayor a menor
                                            <a href="javascript:reporte('ctrlBandaMayorMenor','desdeArmadoBanda','hastaArmadoBanda','selectOptionBanda','semanaBanda');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Tallos mayor a menor
                                            <a href="javascript:reporte('ctrlBandaTallos','desdeArmadoBanda','hastaArmadoBanda','selectOptionBanda','semanaBanda');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>


                            <!--Reporte de armado tallo (Tercer tarjeta)-->
                            <div class="card  mb-3">
                                <div class="card-header" id="headingThree">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fas fa-flag pr-1"></i>Reporte de armado tallo
                                    </button>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">

                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOptionTallo">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaArmadoTallo" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdeArmadoTallo" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaArmadoTallo" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaArmadoTallo" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semanaTallo" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento armado tallo
                                            <a href="javascript:reporte('ctrlArmadoTalloRendimiento','desdeArmadoTallo','hastaArmadoTallo','selectOptionTallo','semanaTallo');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendmiento mayor a menor
                                            <a href="javascript:reporte('ctrlArmadoTalloMayorMenor','desdeArmadoTallo','hastaArmadoTallo','selectOptionTallo','semanaTallo');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Tallos mayor a menor
                                            <a href="javascript:reporte('ctrlArmadoTallo-Tallos','desdeArmadoTallo','hastaArmadoTallo','selectOptionTallo','semanaTallo');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Soporte tallo
                                            <a href="javascript:reporte('ctrlSoporteTallo','desdeArmadoTallo','hastaArmadoTallo','selectOptionTallo','semanaTallo');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>


                            <!--Reporte de preparaciones (Primer tarjeta)-->
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#tarjetaPre" aria-expanded="true" aria-controls="tarjetaPre">
                                        <i class="fas fa-flag pr-1"></i>Reporte preparaciones
                                    </button>
                                </div>
                                <div id="tarjetaPre" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">

                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOptionPreparacion">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaPreparacion" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdePreparacion" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaPreparacion" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaPreparacion" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semanaModuloPreparacion" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Preparación armado
                                            <a href="javascript:reporte('ctrlPreparacionArmado','desdePreparacion','hastaPreparacion','selectOptionPreparacion','semanaModuloPreparacion');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Preparación banda
                                            <a href="javascript:reporte('ctrlPreparacionBanda','desdePreparacion','hastaPreparacion','selectOptionPreparacion','semanaModuloPreparacion');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                        <!--Fin de collapse-->

                    </div>




                    <!--Segundo collapse-->
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3 mb-sm-3 mb-lg-0">

                        <div id="accordion2">

                            <!--Reporte de Picking (Primer tarjeta)-->
                            <div class="card mb-3">
                                <div class="card-header" id="heading1">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#tarjeta1" aria-expanded="true" aria-controls="tarjeta1">
                                        <i class="fas fa-flag pr-1"></i>Reporte empaque
                                    </button>
                                </div>
                                <div id="tarjeta1" class="collapse" aria-labelledby="heading1" data-parent="#accordion2">


                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOptionEmpaque">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaEmpaque" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdeEmpaque" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaEmpaque" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaEmpaque" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semanaModuloEmpaque" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento empaque
                                            <a href="javascript:reporte('ctrlRendimientoEmpaque','desdeEmpaque','hastaEmpaque','selectOptionEmpaque','semanaModuloEmpaque');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento postcosecha
                                            <a href="javascript:reporte('ctrlRendimientoEmpaquePost','desdeEmpaque','hastaEmpaque','selectOptionEmpaque','semanaModuloEmpaque');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <!--Reporte de producto final (Segunda tarjeta)-->
                            <div class="card mb-3">
                                <div class="card-header" id="heading2">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#tarjeta2" aria-expanded="false" aria-controls="tarjeta2">
                                            <i class="fas fa-flag pr-1"></i>Reportes generales
                                        </button>
                                    </h5>
                                </div>
                                <div id="tarjeta2" class="collapse" aria-labelledby="heading2" data-parent="#accordion2">

                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOptionGeneral">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaGeneral" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdeGeneral" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaGeneral" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaGeneral" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semanaModuloGeneral" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento material seco
                                            <a href="javascript:reporte('ctrlRendimientoMaterialSeco','desdeGeneral','hastaGeneral','selectOptionGeneral','semanaModuloGeneral');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento Tinturados
                                            <a href="javascript:reporte('ctrlRendimientoTinturados','desdeGeneral','hastaGeneral','selectOptionGeneral','semanaModuloGeneral');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Rendimiento picking
                                            <a href="javascript:reporte('ctrlRendimientoPicking','desdeGeneral','hastaGeneral','selectOptionGeneral','semanaModuloGeneral');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>


                                </div>
                            </div>

                            <!--Reporte generales (Tercer tarjeta)-->
                            <div class="card mb-3">
                                <div class="card-header" id="heading3">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#tarjeta3" aria-expanded="false" aria-controls="tarjeta3">
                                        <i class="fas fa-flag pr-1"></i>Reporte tiempo muerto
                                    </button>
                                </div>
                                <div id="tarjeta3" class="collapse" aria-labelledby="heading3" data-parent="#accordion2">

                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOptionTm">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaTm" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdeTm" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaTm" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaTm" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semanaModuloTm" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Tiempo muerto producción
                                            <a href="javascript:reporte('ctrlTiempoProduccion','desdeTm','hastaTm','selectOptionTm','semanaModuloTm');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Tiempo muerto general
                                            <a href="javascript:reporte('ctrlTiempoGeneral','desdeTm','hastaTm','selectOptionTm','semanaModuloTm');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Tiempo muerto empaque
                                            <a href="javascript:reporte('ctrlTiempoEmpaque','desdeTm','hastaTm','selectOptionTm','semanaModuloTm');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Tiempo empaque operario
                                            <a href="javascript:reporte('ctrlTiempoEmpaqueOperario','desdeTm','hastaTm','selectOptionTm','semanaModuloTm');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header" id="heading4">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#tarjeta4" aria-expanded="false" aria-controls="tarjeta4">
                                        <i class="fas fa-flag pr-1"></i>Reporte bonificaciones
                                    </button>
                                </div>
                                <div id="tarjeta4" class="collapse" aria-labelledby="heading4" data-parent="#accordion2">

                                    <div class="form-row m-3">
                                        <div class="form-group col">
                                            <label for="nombre">Tipo de reporte:</label>
                                            <select class="form-control" id="selectOptionBonificacion">
                                                <option disabled selected>Seleccione una opcion</option>
                                                <option value="1">Fecha</option>
                                                <option value="2">Semana</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="fechaBonificacion" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Fecha inicial:</label>
                                            <input type="date" class="form-control" id="desdeBonificacion" value="<?php echo $date ?>">
                                        </div>
                                        <div class="form-group col">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" id="hastaBonificacion" value="<?php echo $date ?>">
                                        </div>
                                    </div>

                                    <div class="form-row m-3" id="semanaBonificacion" style="display: none;">
                                        <div class="form-group col">
                                            <label for="">Semana:</label>
                                            <input type="week" class="form-control" id="semanaModuloBonificacion" value="<?php echo $semana ?>">
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Bonificación producción
                                            <a href="javascript:reporte('ctrlBonificacionProduccion','desdeBonificacion','hastaBonificacion','selectOptionBonificacion','semanaModuloBonificacion');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center  py-1">
                                            Bonificación empaque
                                            <a href="javascript:reporte('ctrlBonificacionEmpaque','desdeBonificacion','hastaBonificacion','selectOptionBonificacion','semanaModuloBonificacion');" type="button" class="btn text-primary"> <i class="fas fa-download"></i></a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                        <!--Fin de collapse-->

                    </div>

                </div>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="../app/script.js"></script>
</body>

</html>