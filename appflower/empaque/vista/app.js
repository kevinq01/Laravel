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
    $("#btn-ingresar-Empaque").click(() => {
        const posicion = $("#posicion").val();
        const labor = $("#labor").val();
        const operario = $("#operario").val();
        const fecha = $("#fecha").val();
        const hora = $("#hora").val();
        const cajas = $("#cajas").val();
        $.post('../control/ctrlIngresarEmpaque.php', {
            operario: operario,
            labor: labor,
            posicion: posicion,
            fecha: fecha,
            hora: hora,
            cajas: cajas
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    //Muestra la modal con la informacion de los empaques
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-editar-empaque") {
            const idEmpaque = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                idEmpaque: idEmpaque
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Boton actualizar usuario
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-empaque") {
            const idEmpaque = $('#idEmpaque').val();
            const operarioEmpaque = $('#operarioEmpaque').val();
            const fechaEmpaque = $('#fechaEmpaque').val();
            const posicionEmpaque = $('#posicionEmpaque').val();
            const laborEmpaque = $('#laborEmpaque').val();
            const cajasEmpaque = $('#cajasEmpaque').val();
            const horaEmpaque = $('#horaEmpaque').val();
            $.post('../control/ctrlActualizarEmpaque.php', {
                accion: accion,
                idEmpaque: idEmpaque,
                operarioEmpaque: operarioEmpaque,
                fechaEmpaque: fechaEmpaque,
                posicionEmpaque: posicionEmpaque,
                laborEmpaque: laborEmpaque,
                cajasEmpaque: cajasEmpaque,
                horaEmpaque: horaEmpaque
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Responde la modal con la información de la produccion
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-buscar-empaque") {
            const idEmpaque = $('#buscarEmpaque').val();
            $.post('../control/ctrlBuscarEmpaque.php', {
                accion: accion,
                idEmpaque: idEmpaque
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });


});