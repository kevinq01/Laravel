<?php
require_once('../../roles/Modelo/ModeloRoles.php');
require '../Modelo/ModeloUsuarios.php';

$user = new Roles();
$usuario =  new Usuarios();
$user->session();

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
    <title>Usuarios</title>
</head>

<body>

    <div class="container-fluid">
        <div id="respuesta"></div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 bg-light mb-sm-4 mb-md-0 lateralMenu">

                <div class="col" style="height: 20px;"></div>

                <!--Esto nos carga el menu lateral del usuario en base al rol que de la sesion-->
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

                    <nav class="navbar navbar-light w-100 pl-1">
                        <div class="navbar-brand">
                            <button type="button" id="hamburguer-menu" class="btn text-dark"><i class="far fa-bars fa-lg"></i></button>
                            <?php echo $user->getUsername(); ?>
                            <input type="hidden" name="perfil" id="perfil" value="<?= $_SESSION['perfil'] ?>"></input>
                            <input type="hidden" name="perfil" id="limit" value="<?= $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 10; ?>"></input>
                            <input type="hidden" name="perfil" id="pagina" value="<?= $pagina = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1; ?>"></input>
                        </div>
                        <button type="button" class="btn text-danger ml-auto" id="btn-logOut"><i class="fal fa-sign-out-alt fa-lg"></i></button>
                    </nav>

                </div>


                <div class="row">

                    <!--Primer tarjeta-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 mb-3 mb-sm-3 mb-md-3 mb-lg-12 mb-xl-0 pr-md-3 pr-lg-3 pr-xl-0">


                        <div class="card">
                            <div class="card-header text-primary"><i class="fas fa-plus-circle "></i> Formulario de
                                usuarios</div>
                            <div class="card-body">

                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="correo">Correo</label>
                                            <input type="email" class="form-control" id="correo" placeholder="Ingrese el correo">
                                        </div>
                                    </div>
                                    <div class="form-row mb-1">
                                        <div class="form-group col-12">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" placeholder="Ingrese los apellidos">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="password">Contraseña</label>
                                            <input type="password" class="form-control" id="password" placeholder="*************">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="perfil">Perfil</label>
                                            <select class="form-control" id="perfil_user">
                                                <?php
                                                $perfil = $user->listaPerfil();
                                                if ($perfil != null) {
                                                    foreach ($perfil as $perfil) {
                                                ?>
                                                        <option value="<?php echo $perfil['id_perfil'] ?>"><?php echo $perfil['perfil'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-row d-flex justify-content-center px-1">
                                        <input type="button" class="btn btn-outline-primary  col-sm-12 col-md-6" id="btn-insertUser" value="Ingresar">
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>




                    <!--Segunda tarjeta-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8  mb-3 mb-sm-3 mb-lg-0">

                        <div class="card">
                            <div class="card-header border-bottom-0 text-primary"><i class="fas fa-th-list"></i>
                                Usuarios registrados</div>
                            <div class="card-body p-0">


                                <table class="table border table-hover">
                                    <!--Trabajador-->
                                    <tr class="">
                                        <div id="accordion">
                                            <?php
                                            $paginationStart = ($pagina - 1) * $limit;
                                            $Users = $usuario->listaUsuariosLimit($paginationStart, $limit);
                                            // $Usuarios = $usuario->listaUsuarios();
                                            if ($Users != null) {
                                                foreach ($Users as $Users) {

                                            ?>

                                                    <!--collapseExampleOne es el id -->
                                                    <div class="">
                                                        <button class="btn btn-block d-flex align-items-center aligns p-0 border bg-light rounded-0 shadow-none px-2 text-dark" data-toggle="collapse" data-target="#collapse<?php echo $Users['contador'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $Users['contador'] ?>">
                                                            <p class="m-2"><i class="fad fa-user text-muted pr-1"></i><?php echo $Users['nombre'] ?></p>
                                                        </button>
                                                    </div>
                                                    <div class="collapse border border-top-0 " id="collapse<?php echo $Users['contador'] ?>" data-parent="#accordion">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item lp d-flex justify-content-between">
                                                                <div class=""><b>Nombre </b>: <?php echo $Users['nombre'] ?></div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-sm btn-outline-primary border-0" id="btn-editar-usuario" value="<?php echo $Users['correo'] ?>">Editar</button>
                                                                    <button class="btn btn-sm btn-outline-danger  border-0" id="btn-eliminar-usuario" value="<?php echo $Users['correo'] ?>"><i class="far fa-trash-alt" style="pointer-events: none;"></i></button>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item lp"><b>Correo </b>: <?php echo $Users['correo'] ?></li>
                                                            <li class="list-group-item lp"><b>Perfil </b>: <?php echo $Users['tipoPerfil'] ?></li>
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
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
        <script src="../app/script.js"></script>
</body>

</html>