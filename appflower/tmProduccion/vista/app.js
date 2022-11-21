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

    //Carga la paginación de la vista de tiempo Produccion
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

    //Responde la modal con la información de la produccion
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-buscar-tmProduccion") {
            const idTmProduccion = $('#BuscartmProduccion').val();
            $.post('../control/ctrlBuscartmProduccion.php', {
                accion: accion,
                idTmProduccion: idTmProduccion
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


    //Enviar los datos de la vista al control de la inserción 
    $("#btn-ingresar-tmProduccion").click((e) => {
        const operario = $("#operario").val();
        const labor = $("#labor").val();
        const posicion = $("#posicion").val();
        const causa = $("#causa").val();
        const fecha = $("#fecha").val();
        const tiempo = $("#tiempo").val();
        $.post('../control/ctrlIngresartmProduccion.php', {
            operario: operario,
            labor: labor,
            posicion: posicion,
            fecha: fecha,
            tiempo: tiempo,
            causa: causa
        }, (responseText) => {
            $('#respuesta').html(responseText);
        });
    });

    //Muestra la modal con la informacion del usuario
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-editar-tmProduccion") {
            const idTmProduccion = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                idTmProduccion: idTmProduccion
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Boton actualizar usuario
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-tmProduccion") {
            const idTmProduccion = $('#idTmProduccion').val();
            const operarioTmProduccion = $('#operarioTmProduccion').val();
            const fechaTmProduccion = $('#fechaTmProduccion').val();
            const laborTmProduccion = $('#laborTmProduccion').val();
            const posicionTmProduccion = $('#posicionTmProduccion').val();
            const causaTmProduccion = $('#causaTmProduccion').val();
            const tiempoTmProduccion = $('#tiempoTmProduccion').val();
            $.post('../control/ctrlActualizartmProduccion.php', {
                accion: accion,
                idTmProduccion: idTmProduccion,
                operarioTmProduccion: operarioTmProduccion,
                fechaTmProduccion: fechaTmProduccion,
                laborTmProduccion: laborTmProduccion,
                posicionTmProduccion: posicionTmProduccion,
                causaTmProduccion: causaTmProduccion,
                tiempoTmProduccion: tiempoTmProduccion
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });


});