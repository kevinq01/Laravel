<?php
require_once('../../roles/Modelo/ModeloRoles.php');
require '../Modelo/ModeloEmpaque.php';
$user = new Roles();
$empaque = new Empaque();
$date = date('Y-m-d');


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="../../img/isabelitaLogo.jpg">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../../css/style.css">
    <script src="app.js"></script>
    <title>Empaque</title>
</head>

<body>

    <div class="container-fluid">
        <div id="respuesta"></div>
        <div class="row ">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 pb-2 bg-light mb-sm-4 mb-md-0 lateralMenu">

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


                <div class="row mb-3 border-bottom border-top">

                    <!-- Image and text -->
                    <nav class="navbar navbar-light w-100 pl-1">
                        <div class="navbar-brand">
                            <button type="button" id="hamburguer-menu" class="btn text-dark"><i class="far fa-bars fa-lg"></i></button>
                            <?php echo $user->getUsername(); ?>
                            <input type="hidden" id="perfil" value="<?= $_SESSION['perfil'] ?>"></input>
                            <input type="hidden" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 10; ?>"></input>
                            <input type="hidden" id="pagina" value="<?= $pagina = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1; ?>"></input>
                        </div>
                        <button type="button" class="btn text-danger ml-auto" id="btn-logOut"><i class="fal fa-sign-out-alt fa-lg"></i></button>
                    </nav>

                </div>



                <div class="row">

                    <!--Primer tarjeta-->
                    <div class="col-sm-12  col-md-12 col-lg-12 col-xl-4 mb-3 mb-sm-3 mb-md-3 mb-lg-3 mb-xl-0 pr-lg-3 pr-xl-0">

                        <!--Search Component-->
                        <div class="card mb-3">
                            <div class="card-header text-primary"><i class="fa fa-search"></i> Buscar operario en la tabla de empaque: </div>

                            <div class="input-group">
                                <input type="text" class="form-control" id="buscarEmpaque">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit" id="btn-buscar-empaque">
                                        <i class="fa fa-search" style="pointer-events: none;"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header text-primary"><i class="fas fa-plus-circle "></i> Formulario de
                                empaque</div>

                            <div class="card-body">

                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="posicion">Posicion</label>
                                            <select name="posicion" id="posicion" class="form-control">
                                                <option value="Célula 1" selected>Célula 1</option>
                                                <option value="Célula 2">Célula 2</option>
                                                <option value="Célula 3">Célula 3</option>
                                                <option value="Célula 4">Célula 4</option>
                                                <option value="Postcosecha">Postcosecha</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="labor">Labor</label>
                                            <select name="labor" id="labor" class="form-control">
                                                <option disabled selected>Seleccione una labor</option>
                                                <?php
                                                $Empaque = $empaque->listaLaborEmpaque();
                                                if ($Empaque != null) {
                                                    foreach ($Empaque as $Empaque) {
                                                ?>
                                                        <option value="<?php echo $Empaque['id_labor'] ?>"><?php echo $Empaque['labor'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="operario">Codigo</label>
                                            <input type="number" class="form-control" name="operario" id="operario" placeholder="Ingrese el codigo del operario">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $date; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row mb-1">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="hora">Horas Trabajadas</label>
                                            <input type="number" class="form-control" name="hora" id="hora" placeholder="Tiempo laborado">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="cajas">Cajas</label>
                                            <input type="number" class="form-control" name="cajas" id="cajas" placeholder="Cantidad del operario">
                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-center px-1">
                                        <input type="button" class="btn btn-outline-primary  col-sm-12 col-md-6" id="btn-ingresar-Empaque" value="Ingresar">
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>


                    <!--Segunda tarjeta-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 mb-3">

                        <div class="card">
                            <div class="card-header border-bottom-0 text-primary"><i class="fas fa-th-list"></i>
                                Rendimientos registrados</div>
                            <div class="card-body p-0">

                                <table class="table border  table-hover">
                                    <!--Trabajador-->
                                    <tr class="">
                                        <div id="accordion">
                                            <?php
                                            $paginationStart = ($pagina - 1) * $limit;
                                            $Empaque = $empaque->listaEmpaqueLimit($paginationStart, $limit);
                                            // $Usuarios = $usuario->listaUsuarios();
                                            if ($Empaque != null) {
                                                foreach ($Empaque as $Empaque) {
                                            ?>

                                                    <!--collapseExampleOne es el id -->
                                                    <div class="">
                                                        <button class="btn btn-block  p-0 border bg-light rounded-0 shadow-none px-2 text-dark" data-toggle="collapse" data-target="#collapse<?php echo $Empaque['id_empaque'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $Empaque['id_empaque'] ?>">
                                                            <div class="row">
                                                                <div class="col-6 d-flex">
                                                                    <?php

                                                                    //Cada labor tiene un icono definido
                                                                    switch ($Empaque['id_labor']) {
                                                                        case '1':
                                                                            $laborIcon = "fas fa-box-open";
                                                                            break;
                                                                        case '2':
                                                                            $laborIcon = "fas fa-dolly-flatbed";
                                                                            break;
                                                                        case '3':
                                                                            $laborIcon = "fas fa-tape";
                                                                            break;
                                                                        case '4':
                                                                            $laborIcon = "fas fa-paste";
                                                                            break;
                                                                        case '5':
                                                                            $laborIcon = "fas fa-hand-holding-seedling";
                                                                            break;
                                                                    }

                                                                    //Si el operario supera el rendimiento promedio...Cambiara el color del fondo
                                                                    if ($Empaque['Promedio'] > $Empaque['rendimiento']) {
                                                                        $iconRendimiento = "badge badge-primary";
                                                                    } else {
                                                                        $iconRendimiento = "badge badge-secondary";
                                                                    }

                                                                    ?>
                                                                    <div class="m-2"><i class="<?php echo $laborIcon ?> text-muted pr-1" style=""></i><?php echo $Empaque['labor'] ?></div>
                                                                </div>
                                                                <div class="col d-flex justify-content-end px-0">
                                                                    <div class="m-2 mr-4"><small class="">ID:</i><?php echo $Empaque['operario'] ?></small></div>
                                                                    <div class="m-2 mr-4"><small><span class="<?php echo $iconRendimiento ?>" style="width: 40px;"><?php echo $Empaque['Promedio'] ?></span></small></div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </div>
                                                    <div class="collapse border border-top-0 " id="collapse<?php echo $Empaque['id_empaque'] ?>" data-parent="#accordion">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item lp d-flex justify-content-between">
                                                                <div class=""><b>Labor </b>: <?php echo $Empaque['posicion'] ?></div>
                                                                <div class="text-center">
                                                                    <button class="btn  btn-sm  btn-outline-primary border-0" id="btn-editar-empaque" value="<?php echo $Empaque['id_empaque'] ?>">Editar</button>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item lp"><b>Codigo </b>: <?php echo $Empaque['operario'] ?></li>
                                                            <li class="list-group-item lp"><b>Nombre </b>: <?php echo $Empaque['nombre'] ?></li>
                                                            <li class="list-group-item lp"><b>Fecha </b>: <?php echo $Empaque['fecha'] ?></li>
                                                            <li class="list-group-item lp"><b>Semana </b>: <?php echo $Empaque['Semana'] ?></li>
                                                            <li class="list-group-item lp"><b>Tiempo </b>: <?php echo $Empaque['hora'] ?></li>
                                                            <li class="list-group-item lp"><b>Cajas </b>: <?php echo $Empaque['cajas'] ?></li>
                                                            <li class="list-group-item lp"><b>Promedio </b>: <?php echo $Empaque['Promedio'] ?></li>
                                                        </ul>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </tr>

                                </table>

                                <!-- Pagination -->
                                <div class="col d-flex justify-content-end" id="respuesta-paginacion"></div>

                            </div>
                        </div>
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