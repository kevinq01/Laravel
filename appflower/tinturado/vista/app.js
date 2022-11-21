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

    //Carga la paginación de la vista de operarios
    $.post('../control/ctrlPaginacion.php', {
        limit: limit,
        pagina: pagina
    }, (responseText) => {
        $('#respuesta-paginacion').html(responseText);
    });

    //Modal Para salir de la sesión ctrlModalOut
    $("#btn-logOut").click((e) => {
        const numero = 1;
        $.post('../../roles/control/ctrlModalOut.php', {
            numero: numero
        }, (responseText) => {
            $('#respuesta').html(responseText);
        });
    });

    //Cerrar la sesion, volver al index. ctrlSesiónDestroy
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-sesionOut") {
            $.post('../../roles/control/ctrlSesionDestroy.php', {
                accion: accion
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });


    //Responde la modal con la información de los tinturados
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-buscar-tinturado") {
            const idTinturado = $('#BuscarTinturado').val();
            $.post('../control/ctrlBuscarTinturado.php', {
                accion: accion,
                idTinturado: idTinturado
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Enviar los datos de la vista al control de la inserción 
    $("#btn-ingresar-tinturados").click(() => {
        const operario = $("#operario").val();
        const fecha = $("#fecha").val();
        const horas = $("#horas").val();
        const tallos = $("#tallos").val();
        $.post('../control/ctrlIngresarTinturados.php', {
            operario: operario,
            fecha: fecha,
            horas: horas,
            tallos: tallos
        }, (responseText) => {
            $('#respuesta').html(responseText);
        });
    });


    //Muestra la modal con la informacion de los tinturados
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-editar-tinturados") {
            const id_tinturado = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                id_tinturado: id_tinturado
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });


    //Boton actualizar usuario
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-tinturado") {
            const idTinturado = $('#idTinturado').val();
            const operarioTinturado = $('#operarioTinturado').val();
            const fechaTinturado = $('#fechaTinturado').val();
            const tallosTinturado = $('#tallosTinturado').val();
            const horasTinturado = $('#horasTinturado').val();
            $.post('../control/ctrlActualizarTinturado.php', {
                accion: accion,
                idTinturado: idTinturado,
                operarioTinturado: operarioTinturado,
                fechaTinturado: fechaTinturado,
                tallosTinturado: tallosTinturado,
                horasTinturado: horasTinturado
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

});