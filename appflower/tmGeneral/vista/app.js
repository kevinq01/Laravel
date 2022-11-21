$(document).ready(function () {
    const perfil = $("#perfil").val();
    const title = $(document).attr('title');
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

    //Carga la paginación de la vista de tiempo General
    $.post('../control/ctrlPaginacion.php', {
        limit: limit,
        pagina: pagina
    }, function (responseText) {
        $('#respuesta-paginacion').html(responseText);
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
    $("#btn-ingresar-tmGeneral").click((e) => {
        const operario = $("#operario").val();
        const labor = $("#labor").val();
        const posicion = $("#posicion").val();
        const causa = $("#causa").val();
        const fecha = $("#fecha").val();
        const semana = $("#semana").val();
        const tiempo = $("#tiempo").val();
        $.post('../control/ctrlIngresartmGeneral.php', {
            operario: operario,
            labor: labor,
            posicion: posicion,
            fecha: fecha,
            semana: semana,
            tiempo: tiempo,
            causa: causa
        }, (responseText) => {
            $('#respuesta').html(responseText);
        });
    });

    //Responde la modal con la información de la General
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-buscar-tmGeneral") {
            const idTmGeneral = $('#BuscartmGeneral').val();
            $.post('../control/ctrlBuscartmGeneral.php', {
                accion: accion,
                idTmGeneral: idTmGeneral
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Muestra la modal con la informacion del usuario
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-editar-tmGeneral") {
            const idTmGeneral = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                idTmGeneral: idTmGeneral
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Boton actualizar usuario
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-tmGeneral") {
            const idTmGeneral = $('#idTmGeneral').val();
            const operarioTmGeneral = $('#operarioTmGeneral').val();
            const fechaTmGeneral = $('#fechaTmGeneral').val();
            const semanaTmGeneral = $('#semanaTmGeneral').val();
            const laborTmGeneral = $('#laborTmGeneral').val();
            const causaTmGeneral = $('#causaTmGeneral').val();
            const tiempoTmGeneral = $('#tiempoTmGeneral').val();
            $.post('../control/ctrlActualizartmGeneral.php', {
                accion: accion,
                idTmGeneral: idTmGeneral,
                operarioTmGeneral: operarioTmGeneral,
                fechaTmGeneral: fechaTmGeneral,
                semanaTmGeneral: semanaTmGeneral,
                laborTmGeneral: laborTmGeneral,
                causaTmGeneral: causaTmGeneral,
                tiempoTmGeneral: tiempoTmGeneral
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

});