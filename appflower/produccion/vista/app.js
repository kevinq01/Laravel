$(document).ready(function () {
    const perfil = $("#perfil").val();
    const title = $(document).attr('title');
    const page = $(document).attr('page');
    const limit = $("#limit").val();
    const pagina = $("#pagina").val();

    const spinner = document.querySelector('#spinner');
    spinner.style.display = 'flex';
    $.post('../../roles/control/ctrlMenuLateral.php', {
        perfil: perfil,
        title: title
    }, function (responseText) {
        $('#respuesta-menu').html(responseText);
        spinner.style.display = 'none';
    });

    //Carga la paginación de la vista de operarios
    $.post('../control/ctrlPaginacion.php', {
        limit: limit,
        pagina: pagina
    }, function (responseText) {
        $('#respuesta-paginacion').html(responseText);
    });

    $("#labor").change(function () {
        const value = $(this).val();
        if (value != 1) {
            $("#recetas").hide();
            $("#recetasLabel").hide();
            $("#tallos").show();
            $("#tallosLabel").show();
            $('#horasLabor').removeClass('form-group col-sm-12 col-xl-12').addClass("form-group col-sm-12 col-md-6");
        } else {
            $("#recetas").show();
            $("#recetasLabel").show();
            $("#tallos").hide();
            $("#tallosLabel").hide();
            $('#horasLabor').attr('class', 'form-group col-sm-12 col-xl-12');

        }
    });



    //Modal Para salir de la sesión ctrlModalOut
    $("#btn-logOut").click(function (e) {
        const numero = 1;
        $.post('../../roles/control/ctrlModalOut.php', {
            numero: numero
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    //Cerrar la sesion, volver al index. ctrlSesiónDestroy
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-sesionOut") {
            $.post('../../roles/control/ctrlSesionDestroy.php', {
                accion: accion
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Enviar los datos de la vista al control de la inserción 
    $("#ingresar-produccion").click(function (e) {
        const operario = $("#operario").val();
        const labor = $("#labor").val();
        const posicion = $("#posicion").val();
        const fecha = $("#fecha").val();
        // const semana = $("#semana").val();
        const tallos = $("#tallos").val();
        const hora = $("#hora").val();
        const recetas = $("#recetas").val();
        $.post('../control/ctrlIngresarProduccion.php', {
            operario: operario,
            labor: labor,
            posicion: posicion,
            fecha: fecha,
            // semana: semana,
            tallos: tallos,
            hora: hora,
            recetas: recetas
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });


    //Responde la modal con la información de la produccion
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-buscar-produccion") {
            const idProduccion = $('#BuscarProduccion').val();
            $.post('../control/ctrlBuscarProduccion.php', {
                accion: accion,
                idProduccion: idProduccion
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Muestra la modal con la informacion del usuario
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-editar-produccion") {
            const idProduccion = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                idProduccion: idProduccion
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    $(document).click(function (e) {
        $("#laborProduccion").change(function () {
            const value = $(this).val();
            if (value != 1) {
                $("#recetasProduccion").hide();
                $("#recetasLabelProduccion").hide();
                $("#tallosProduccion").show();
                $("#tallosLabelProduccion").show();
                $('#horasLaborProduccion').removeClass('form-group col-sm-12 col-xl-12').addClass("form-group col-sm-12 col-md-6");
            } else {
                $("#recetasProduccion").show();
                $("#recetasLabelProduccion").show();
                $("#tallosProduccion").hide();
                $("#tallosLabelProduccion").hide();
                $('#horasLaborProduccion').attr('class', 'form-group col-sm-12 col-xl-12');
            }
        });

    });

    //Boton actualizar usuario
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-Produccion") {
            const idProduccion = $('#idProduccion').val();
            const codigoProduccion = $('#codigoProduccion').val();
            const fechaProduccion = $('#fechaProduccion').val();
            const semanaProduccion = $('#semanaProduccion').val();
            const posicionProduccion = $('#posicionProduccion').val();
            const laborProduccion = $('#laborProduccion').val();
            const tallosProduccion = $('#tallosProduccion').val();
            const horasProduccion = $('#horasProduccion').val();
            const recetasProduccion = $('#recetasProduccion').val();
            $.post('../control/ctrlActualizarProduccion.php', {
                accion: accion,
                idProduccion: idProduccion,
                codigoProduccion: codigoProduccion,
                fechaProduccion: fechaProduccion,
                posicionProduccion: posicionProduccion,
                semanaProduccion: semanaProduccion,
                laborProduccion: laborProduccion,
                tallosProduccion: tallosProduccion,
                horasProduccion: horasProduccion,
                recetasProduccion: recetasProduccion
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

});