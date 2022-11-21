$(document).ready(function () {
    const perfil = $("#perfil").val();
    const title = $(document).attr('title');
    const limit = $("#limit").val();
    const pagina = $("#pagina").val();

    //Carga el menu lateral, dependiendo del rol del usuario
    const spinner = document.querySelector('#spinner');
    spinner.style.display = 'flex';
    $.post('../../roles/control/ctrlMenuLateral.php', {
        perfil: perfil,
        title: title
    }, function (responseText) {
        $('#respuesta-menu').html(responseText);
        spinner.style.display = 'none';
    });

    //Carga la paginación de la vista de picking
    $.post('../control/ctrlPaginacion.php', {
        limit: limit,
        pagina: pagina
    }, (responseText) => {
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

    //Responde la modal con la información de los Pickings
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-buscar-picking") {
            const idPicking = $('#BuscarPicking').val();
            $.post('../control/ctrlBuscarPicking.php', {
                accion: accion,
                idPicking: idPicking
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });


    //Enviar los datos de la vista al control de la inserción 
    $("#btn-ingresar-picking").click(() => {
        const operario = $("#operario").val();
        const fecha = $("#fecha").val();
        const horas = $("#horas").val();
        const tallos = $("#tallos").val();
        $.post('../control/ctrlIngresarPicking.php', {
            operario: operario,
            fecha: fecha,
            horas: horas,
            tallos: tallos
        }, (responseText) => {
            $('#respuesta').html(responseText);
        });
    });

    //Muestra la modal con la informacion de picking
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-editar-picking") {
            const id_picking = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                id_picking: id_picking
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Boton actualizar Picking
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-picking") {
            const idPicking = $('#idPicking').val();
            const operarioPicking = $('#operarioPicking').val();
            const fechaPicking = $('#fechaPicking').val();
            const tallosPicking = $('#tallosPicking').val();
            const horasPicking = $('#horasPicking').val();
            $.post('../control/ctrlActualizarPicking.php', {
                accion: accion,
                idPicking: idPicking,
                operarioPicking: operarioPicking,
                fechaPicking: fechaPicking,
                tallosPicking: tallosPicking,
                horasPicking: horasPicking
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

});