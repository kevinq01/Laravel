<?php

class Modal
{

    //Modal de inicio de sesion
    public function modalLogin($color, $n)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content pt-4 modal-md'>";
        echo               "<div class='row'>";
        echo                    "<div class='col-12 d-flex justify-content-center'>";
        echo                        "<h4 class='mb-0'>Bienvenido a</h4>";
        echo                    "</div>";
        echo                    "<div class='col-12'>";
        echo                        "<p class='text-center text-weight-light' style='font-size: 25px;'>Flores Isabelita S.A.S<p>";
        echo                    "</div>";
        echo              "</div>";
        echo            "<div class='modal-body d-flex justify-content-center'>";
        echo                "<img  src='img/flower.gif' style='width: 80%'>";
        echo            "</div>";
        echo            "<div class='modal-body'>";
        echo            "<div class='form-group d-flex justify-content-center'>";
        echo               "<input type='button' class='btn  btn-success btn-lg px-5' id='continuar' value='Ingresar'>";
        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.href='reportes/vista/reportesVista.php'})</script>";
        echo "<script>$('#continuar').click(function(){location.href='reportes/vista/reportesVista.php'})</script>";
    }

    //LimpiarCampos 0 = Limpiar, 1 = no limpiar campos
    public function modalInfo($color, $mensaje, $limpiarCampos = 0)
    {

        $limpiarCampos = "<script>$('#cerrar').click(function(){location.reload()});</script>";

        if ($limpiarCampos == 1) $limpiarCampos = "<script>$('#cerrar').click(function(){});</script>";

        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content modal-md'>";
        echo            "<div class='modal-header border-0 py-2'>";
        echo                "<p class='modal-title text-$color'><i class='fas fa-info'></i> Información</p>";
        echo            "<button type='button' class='close' data-dismiss='modal' id='cerrar' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body'>";
        echo            "<p> $mensaje <p>";
        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo $limpiarCampos;
    }



    public function modalOut($color)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-$color'><i class='far fa-info-circle'></i> Cerrar sesión</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body'>";
        echo                "<p>¿ Deseas salir de la aplicación ? <p>";
        echo       "<div class='d-flex flex-row-reverse bd-highlight'>";
        echo        "<div class='p-2 bd-highlight'>";
        echo            "<div class='d-flex justify-content-end'>";
        echo                "<button type='button' class='btn btn-outline-primary'  id='btn-sesionOut' data-dismiss='modal' aria-label='Close'>Aceptar</button>";
        echo            "</div>";
        echo        "</div>";
        echo            "<div class='p-2 bd-highlight'>";
        echo            "<div class='d-flex justify-content-end'>";
        echo                "<button type='button' class='btn btn-outline-dark' data-dismiss='modal' aria-label='Close'>Cancelar</button>";
        echo            "</div>";
        echo        "</div>";
        echo        "</div>";
        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo "<script>$('#btn-sesionOut').click(function(){location.href='../../index.php'})</script>";
    }

    public function modalEliminar($color, $nombre, $correo)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-$color'><i class='far fa-trash-alt'></i> Eliminar usuario</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body'>";
        echo                "<p>¿Eliminar al usuario <b>$nombre</b>? ¿ Estas seguro ? <p>";
        echo       "<div class='d-flex flex-row-reverse bd-highlight'>";
        echo        "<div class='p-2 bd-highlight'>";
        echo            "<div class='d-flex justify-content-end'>";
        echo                "<button type='button' class='btn btn-outline-primary'  id='btn-delete-usuario' data-dismiss='modal' aria-label='Close' value='$correo'>Eliminar</button>";
        echo            "</div>";
        echo        "</div>";
        echo            "<div class='p-2 bd-highlight'>";
        echo            "<div class='d-flex justify-content-end'>";
        echo                "<button type='button' class='btn btn-outline-dark' data-dismiss='modal' id='regresar' aria-label='Close'>Regresar</button>";
        echo            "</div>";
        echo        "</div>";
        echo        "</div>";
        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
    }
    public function modalEliminarOperario($color, $nombre, $Codigo)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-$color'><i class='far fa-trash-alt'></i> Eliminar usuario</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body'>";
        echo                "<p>¿Eliminar al operario <b>$nombre</b>? ¿ Estas seguro ? <p>";
        echo       "<div class='d-flex flex-row-reverse bd-highlight'>";
        echo        "<div class='p-2 bd-highlight'>";
        echo            "<div class='d-flex justify-content-end'>";
        echo                "<button type='button' class='btn btn-outline-primary'  id='btn-delete-operario' data-dismiss='modal' aria-label='Close' value='$Codigo'>Eliminar</button>";
        echo            "</div>";
        echo        "</div>";
        echo            "<div class='p-2 bd-highlight'>";
        echo            "<div class='d-flex justify-content-end'>";
        echo                "<button type='button' class='btn btn-outline-dark' data-dismiss='modal' id='regresar' aria-label='Close'>Regresar</button>";
        echo            "</div>";
        echo        "</div>";
        echo        "</div>";
        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
    }

    public function modalInsert($color)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1'style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-$color'><i class='far fa-check-circle'></i> Registro exitoso</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body'>";
        echo                "<p>La información se almacenó en la base de datos.<p>";
        echo            "<div class='d-flex justify-content-end'>";
        echo                "<button type='button' class='btn btn-outline-primary'  id='aceptar' data-dismiss='modal' aria-label='Close'>Aceptar</button>";
        echo            "</div>";
        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo "<script>$('#aceptar').click(function(){location.reload()});</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
    }


    public function modalActualizarUsuario($correo, $nombre, $password, $id_perfil, $nombrePerfil, $arrayPerfil)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar usuario</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2 pb-0'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-group col'>";
        echo                        "<label for='correoUser'>Correo</label>";
        echo                        "<input type='hidden' class='form-control' id='correoUser' value='$correo' disabled>";
        echo                        "<input type='text' class='form-control' id='id' value='$correo'>";
        echo                    "</div>";
        echo                    "<div class='form-group col'>";
        echo                        "<label for='nombreUser'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreUser' value='$nombre'>";
        echo                    "</div>";
        echo                    "<div class='form-group col'>";
        echo                        "<label for='passwordUser'>Contraseña</label>";
        echo                        "<input type='text' class='form-control' id='passwordUser' value='$password'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12 mb-5'>";
        echo                        "<label for='perfilUsuario'>Labor</label>";
        echo                        "<select name='perfilUsuario' id='perfilUsuario' class='form-control'>";
        //      echo                        "<option value='$idLabor' disabled selected>$laborNombre</option>";
        echo                        "<option value='$id_perfil'>$nombrePerfil</option>";

        foreach ($arrayPerfil as $Perfil) {
            $idPerfil =  $Perfil['id_perfil'];
            $perfil =  $Perfil['perfil'];
            echo                        "<option value='$idPerfil'>$perfil</option>";
        }
        echo                        "</select>";
        echo                    "</div>";
        echo                    "<div class='form-group d-flex justify-content-center  m-0'>";
        echo                    "<div class='form-group col-5'>";
        echo                        "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' value='Regresar'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-5'>";
        echo                        "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-usuarios' value='Actualizar'>";
        echo                    "</div>";
        echo                    "</div>";
        echo                    "<div class='form-group d-flex justify-content-center'>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
    }

    public function modalActualizarOperario($codigo,$cedula, $nombre)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar operario</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body pb-0'>";

        echo                 "<form class=''>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idOperario'>Codigo</label>";
        echo                        "<input type='hidden' class='form-control hidden' id='id' value='$codigo'>";
        echo                        "<input type='number' class='form-control' id='idOperario' value='$codigo'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='cedulaOperario'>Cédula</label>";
        echo                        "<input type='number' class='form-control' id='cedulaOperario' value='$cedula'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-12 mb-5'>";
        echo                        "<label for='nombreOperario'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreOperario' value='$nombre'>";
        echo                    "</div>";
        echo                    "<div class='form-group d-flex justify-content-center pb-0'>";
        echo                    "<div class='form-group col-5'>";
        echo                        "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-5'>";
        echo                        "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-operario' value='Actualizar'>";
        echo                    "</div>";
        echo                    "</div>";
        echo                    "<div class='form-group d-flex justify-content-center'>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualizarProduccion($idProduccion, $fecha, $nombre, $codigo, $laborNombre, $idLabor, $labores, $posicion, $tiempo, $tallos, $recetas)
    {
        echo "<div class='modal fade' id='modal-login' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar producción</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='fechaProduccion'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idProduccion' value='$idProduccion'>";
        echo                        "<input type='date' class='form-control' id='fechaProduccion' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombreProduccion'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreProduccion' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='codigoProduccion'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='codigoProduccion' value='$codigo'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='laborProduccion'>Labor</label>";
        echo                        "<select name='laborProduccion' id='laborProduccion' class='form-control' disabled>";
        echo                        "<option value='$idLabor'selected>$laborNombre</option>";
        foreach ($labores as $labores) {
            $id_labor =  $labores['id_labor'];
            $laborProduccion =  $labores['labor'];
            echo                        "<option value='$id_labor'>$laborProduccion</option>";
        }
        echo                        "</select>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='posicionProduccion'>Posicion</label>";
        echo                        "<select name='posicionProduccion' id='posicionProduccion' class='form-control'>";
        echo                        "<option value='$posicion' selected>$posicion</option>";
        for ($i = 1; $i < 17; $i++) {
            echo                        "<option value='$i'>$i</option>";
        }
        echo                        "</select>";
        echo                    "</div>";
        if ($idLabor != 1) {
            echo                            "<div class='form-group col-sm-12 col-md-6 ' id='horasLaborProduccion'>";
            echo                                "<label for='tiempoProduccion'>Horas Trabajadas</label>";
            echo                                "<input type='number' class='form-control' id='horasProduccion' value='$tiempo'>";
            echo                            "</div>";
            echo                            "<div class='form-group col-sm-12 col-md-6' >";
            echo                                "<label for='tallosLabelProduccion' id='tallosLabelProduccion'>Tallos</label>";
            echo                                "<input type='number' class='form-control' id='tallosProduccion' value='$tallos'>";
            echo                            "</div>";
            echo                            "<div class='form-group col-sm-12 col-md-12 mb-4'>";
            echo                                "<label for='recetasLabelProduccion' id='recetasLabelProduccion' style='display: none;'>Recetas</label>";
            echo                                "<textarea  class='form-control' id='recetasProduccion' rows='2' style='display: none; resize: none'>$recetas</textarea>";
            echo                            "</div>";
        } else {
            echo                            "<div class='form-group col-sm-12 col-md-6 ' id='horasLaborProduccion'>";
            echo                                "<label for='tiempoProduccion'>Horas Trabajadas</label>";
            echo                                "<input type='number' class='form-control' id='horasProduccion' value='$tiempo'>";
            echo                            "</div>";
            echo                            "<div class='form-group col-sm-12 col-md-6' >";
            echo                                "<label for='tallosLabelProduccion' id='tallosLabelProduccion'>Tallos</label>";
            echo                                "<input type='number' class='form-control' id='tallosProduccion' value='$tallos' disabled>";
            echo                            "</div>";
            echo                            "<div class='form-group col-sm-12 col-md-12 mb-4'>";
            echo                                "<label for='recetasLabelProduccion' id='recetasLabelProduccion'>Recetas</label>";
            echo                                "<textarea  class='form-control' id='recetasProduccion' rows='2' style='resize: none'>$recetas</textarea>";
            echo                            "</div>";
        }

        echo                    "<div class='form-group col-sm-12 mb-0 col-md-12 d-flex justify-content-center'>";
        echo                        "<div class='form-group col-sm-12 col-md-5'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-Produccion' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-login').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualizarEmpaque($idEmpaque, $fecha, $nombre, $operario, $posicion, $idLabor, $laborNombre, $labores, $hora, $cajas)
    {
        echo "<div class='modal fade' id='modal-empaque' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar empaque</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idEmpaque'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idEmpaque' value='$idEmpaque'>";
        echo                        "<input type='date' class='form-control' id='fechaEmpaque' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombreEmpaque'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreEmpaque' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='operarioEmpaque'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='operarioEmpaque' value='$operario'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='posicionEmpaque'>Posicion</label>";
        echo                        "<select name='posicionEmpaque' id='posicionEmpaque' class='form-control'>";
        echo                        "<option value='$posicion' selected>$posicion</option>";
        echo                        "<option value='Célula 1'>Célula 1</option>";
        echo                        "<option value='Célula 2'>Célula 2</option>";
        echo                        "<option value='Célula 3'>Célula 3</option>";
        echo                        "<option value='Célula 4'>Célula 4</option>";
        echo                        "<option value='Postcosecha'>Postcosecha</option>";
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='laborEmpaque'>Labor</label>";
        echo                        "<select name='laborEmpaque' id='laborEmpaque' class='form-control'>";
        echo                        "<option value='$idLabor' selected>$laborNombre</option>";
        foreach ($labores as $labores) {
            $id_labor =  $labores['id_labor'];
            $laborEmpaque =  $labores['labor'];
            echo                               "<option value='$id_labor'>$laborEmpaque</option>";
        }
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                                "<label for='horaEmpaque'>Horas Trabajadas</label>";
        echo                                "<input type='number' class='form-control' id='horaEmpaque' value='$hora'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6 mb-4'>";
        echo                                "<label for='cajasEmpaque' id='tallosLabelProduccion'>Cajas</label>";
        echo                                "<input type='number' class='form-control' id='cajasEmpaque' value='$cajas'>";
        echo                    "</div>";


        echo                    "<div class='form-group col-sm-12 col-md-12 d-flex justify-content-center mb-3'>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-empaque' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-empaque').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualiarMaterial($id_seco, $fecha, $nombre, $operario, $idLabor, $laborNombre, $labores, $hora, $cantidad)
    {
        echo "<div class='modal fade' id='modal-material' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar material seco</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idSeco'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idSeco' value='$id_seco'>";
        echo                        "<input type='date' class='form-control' id='fechaMaterial' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombreMaterial'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreMaterial' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='operarioMaterial'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='operarioMaterial' value='$operario'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='laborMaterial'>Labor</label>";
        echo                        "<select name='laborMaterial' id='laborMaterial' class='form-control'>";
        echo                        "<option value='$idLabor' selected>$laborNombre</option>";
        foreach ($labores as $labores) {
            $id_labor =  $labores['id_labor'];
            $laborMaterial =  $labores['labor'];
            echo                               "<option value='$id_labor'>$laborMaterial</option>";
        }
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                                "<label for='horaMaterial'>Horas Trabajadas</label>";
        echo                                "<input type='number' class='form-control' id='horaMaterial' value='$hora'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6 mb-4'>";
        echo                                "<label for='cajasMaterial' id='tallosLabelProduccion'>Cajas</label>";
        echo                                "<input type='number' class='form-control' id='cantidadMaterial' value='$cantidad'>";
        echo                    "</div>";


        echo                    "<div class='form-group col-sm-12 col-md-12 d-flex justify-content-center mb-3'>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-material' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-material').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualiarTinturado($id_tinturado, $fecha, $nombre, $operario, $horas, $tallos)
    {
        echo "<div class='modal fade' id='modal-tinturado' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar tinturados</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idTinturado'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idTinturado' value='$id_tinturado'>";
        echo                        "<input type='date' class='form-control' id='fechaTinturado' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombreTinturado'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreTinturado' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='operarioTinturado'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='operarioTinturado' value='$operario'>";
        echo                    "</div>";


        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                                "<label for='horaTinturado'>Horas Trabajadas</label>";
        echo                                "<input type='number' class='form-control' id='horasTinturado' value='$horas'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6 mb-4'>";
        echo                                "<label for='cajasTinturado' id='tallosLabelProduccion'>Tallos</label>";
        echo                                "<input type='number' class='form-control' id='tallosTinturado' value='$tallos'>";
        echo                    "</div>";


        echo                    "<div class='form-group col-sm-12 col-md-12 d-flex justify-content-center mb-3'>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-tinturado' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-tinturado').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualiarPicking($id_Picking, $fecha, $nombre, $operario, $horas, $tallos)
    {
        echo "<div class='modal fade' id='modal-picking' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar picking</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idPicking'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idPicking' value='$id_Picking'>";
        echo                        "<input type='date' class='form-control' id='fechaPicking' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombrePicking'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombrePicking' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='operarioPicking'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='operarioPicking' value='$operario'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                                "<label for='horaPicking'>Horas Trabajadas</label>";
        echo                                "<input type='number' class='form-control' id='horasPicking' value='$horas'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6 mb-4'>";
        echo                                "<label for='cajasPicking' id='tallosLabelProduccion'>Tallos</label>";
        echo                                "<input type='number' class='form-control' id='tallosPicking' value='$tallos'>";
        echo                    "</div>";


        echo                    "<div class='form-group col-sm-12 col-md-12 d-flex justify-content-center mb-3'>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-picking' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-picking').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualiarTmProduccion($id_tmproduccion, $fecha, $nombre, $operario, $laborNombre, $idLabor, $labores, $posicion, $nombreCausa, $causa, $causas, $tiempo)
    {
        echo "<div class='modal fade' id='modal-tmProduccion' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar tiempo muerto</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idTmProduccion'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idTmProduccion' value='$id_tmproduccion'>";
        echo                        "<input type='date' class='form-control' id='fechaTmProduccion' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombreTmProduccion'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreTmProduccion' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='operarioTmProduccion'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='operarioTmProduccion' value='$operario'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='laborTmProduccion'>Labor</label>";
        echo                        "<select name='laborTmProduccion' id='laborTmProduccion' class='form-control'>";
        echo                        "<option value='$idLabor' selected>$laborNombre</option>";
        foreach ($labores as $labores) {
            $id_labor =  $labores['id_labor'];
            $laborTmProduccion =  $labores['labor'];
            echo                               "<option value='$id_labor'>$laborTmProduccion</option>";
        }
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='posicionTmProduccion'>Posicion</label>";
        echo                        "<select name='posicionTmProduccion' id='posicionTmProduccion' class='form-control'>";
        echo                        "<option value='$posicion' selected>$posicion</option>";
        for ($i = 1; $i < 17; $i++) {
            echo                        "<option value='$i'>$i</option>";
        }
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='causaTmProduccion'>Labor</label>";
        echo                        "<select name='causaTmProduccion' id='causaTmProduccion' class='form-control'>";
        echo                        "<option value='$causa' selected>$nombreCausa</option>";
        foreach ($causas as $causas) {
            $id_causa =  $causas['id_causa'];
            $laborCausa =  $causas['causa'];
            echo                               "<option value='$id_causa'>$laborCausa</option>";
        }
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12 mb-4'>";
        echo                                "<label for='tiempoTmProduccion'>Tiempo muerto</label>";
        $tiempoMinutos = round(($tiempo * 60), 0);
        echo                                "<input type='number' class='form-control' id='tiempoTmProduccion' value='$tiempoMinutos'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12 d-flex justify-content-center mb-3'>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-tmProduccion' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-tmProduccion').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualiarTmEmpaque($id_tmproduccioon, $fecha, $nombre, $operario, $nombreCausa, $causa, $causas, $celula, $horas, $minutos)
    {
        echo "<div class='modal fade' id='modal-tmEmpaque' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar tiempo muerto</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idTmEmpaque'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idTmEmpaque' value='$id_tmproduccioon'>";
        echo                        "<input type='date' class='form-control' id='fechaTmEmpaque' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombreTmEmpaque'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreTmEmpaque' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='operarioTmEmpaque'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='operarioTmEmpaque' value='$operario'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='causaTmEmpaque'>Labor</label>";
        echo                        "<select name='causaTmEmpaque' id='causaTmEmpaque' class='form-control'>";
        echo                        "<option value='$causa' selected>$nombreCausa</option>";
        foreach ($causas as $causas) {
            $id_causa =  $causas['id_causa'];
            $laborCausa =  $causas['causa'];
            echo                                "<option value='$id_causa'>$laborCausa</option>";
        }
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='celulaTmEmpaque'>Posicion</label>";
        echo                        "<select name='celulaTmEmpaque' id='celulaTmEmpaque' class='form-control'>";
        echo                        "<option value='$celula' selected>$celula</option>";
        echo                        "<option value='Empaque'>Empaque</option>";
        echo                        "<option value='Postcosecha'>Postcosecha</option>";
        echo                        "</select>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                                "<label for='horasTmEmpaque'>Horas muertas</label>";
        echo                                "<input type='number' class='form-control' id='horasTmEmpaque' value='$horas' disabled>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-6 mb-4'>";
        echo                                "<label for='minutosTmEmpaque'>Minutos muertos</label>";
        echo                                "<input type='number' class='form-control' id='minutosTmEmpaque' value='$minutos'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12 d-flex justify-content-center mb-3'>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-tmEmpaque' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-tmEmpaque').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }

    public function modalActualiarTmGeneral($id_general, $fecha, $nombre, $operario, $laborNombre, $idLabor, $labores, $nombreCausa, $causa, $causas, $tiempo)
    {
        echo "<div class='modal fade' id='modal-tmGeneral' tabindex='-1' style='display: block;' data-keyboard='false' data-backdrop='static'>";
        echo    "<div class='modal-dialog modal-dialog-centered modal-lg'>";
        echo        "<div class='modal-content'>";
        echo            "<div class='modal-header'>";
        echo                "<h6 class='modal-title text-primary'><i class='far fa-edit'></i> Actualizar tiempo muerto</h6>";
        echo            "<button type='button' class='close' id='cerrar' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo            "</div>";
        echo            "<div class='modal-body p-2'>";

        echo                 "<form class='p-1'>";
        echo                    "<div class='form-row'>";
        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='idTmGeneral'>Fecha</label>";
        echo                        "<input type='hidden' class='form-control' id='idTmGeneral' value='$id_general'>";
        echo                        "<input type='date' class='form-control' id='fechaTmGeneral' value='$fecha'>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='nombreTmGeneral'>Nombre</label>";
        echo                        "<input type='text' class='form-control' id='nombreTmGeneral' value='$nombre' disabled>";
        echo                    "</div>";
        echo                    "<div class='form-group col-sm-12 col-md-6'>";
        echo                        "<label for='operarioTmGeneral'>Codigo</label>";
        echo                        "<input type='number' class='form-control' id='operarioTmGeneral' value='$operario'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='laborTmGeneral'>Labor</label>";
        echo                        "<select name='laborTmGeneral' id='laborTmGeneral' class='form-control'>";
        echo                        "<option value='$idLabor' selected>$laborNombre</option>";
        foreach ($labores as $labores) {
            $id_labor =  $labores['id_labor'];
            $laborTmGeneral =  $labores['labor'];
            echo                               "<option value='$id_labor'>$laborTmGeneral</option>";
        }
        echo                        "</select>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12'>";
        echo                        "<label for='causaTmGeneral'>Labor</label>";
        echo                        "<select name='causaTmGeneral' id='causaTmGeneral' class='form-control'>";
        echo                        "<option value='$causa' selected>$nombreCausa</option>";
        foreach ($causas as $causas) {
            $id_causa =  $causas['id_causa'];
            $CausaNombre =  $causas['causa'];
            echo                               "<option value='$id_causa'>$CausaNombre</option>";
        }
        echo                        "</select>";
        echo                    "</div>";


        echo                    "<div class='form-group col-sm-12 col-md-12 mb-4'>";
        echo                                "<label for='tiempoTmGeneral'>Horas Trabajadas</label>";
        $tiempoMinutos = round(($tiempo * 60), 0);
        echo                                "<input type='number' class='form-control' id='tiempoTmGeneral' value='$tiempoMinutos'>";
        echo                    "</div>";

        echo                    "<div class='form-group col-sm-12 col-md-12 d-flex justify-content-center mb-3'>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-dark  btn-block' data-dismiss='modal' id='regresar' value='Regresar'>";
        echo                        "</div>";
        echo                        "<div class='form-group col-sm-12 col-md-5 mb-0'>";
        echo                            "<input type='button' class='btn btn-outline-primary btn-block' id='btn-update-tmGeneral' value='Actualizar'>";
        echo                        "</div>";
        echo                    "</div>";
        echo                    "</div>";
        echo                 "</form>";

        echo            "</div>";
        echo        "</div>";
        echo    "</div>";
        echo "</div>";
        echo "<script>$('#modal-tmGeneral').modal('show')</script>";
        echo "<script>$('#cerrar').click(function(){location.reload()});</script>";
        echo "<script>$('#regresar').click(function(){location.reload()});</script>";
    }
}
