$(document).ready(function (e) {
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


    //Carga la paginación de la vista de tiempo muerto empaque
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

    //Responde la modal con la información de la Empaque
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-buscar-tmEmpaque") {
            const idTmEmpaque = $('#BuscartmEmpaque').val();
            $.post('../control/ctrlBuscartmEmpaque.php', {
                accion: accion,
                idTmEmpaque: idTmEmpaque
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Enviar los datos de la vista al control de la inserción 
    $("#btn-ingresar-tmEmpaque").click((e) => {
        const operario = $("#operario").val();
        const celula = $("#celula").val();
        const causa = $("#causa").val();
        const fecha = $("#fecha").val();
        const semana = $("#semana").val();
        const minutos = $("#minutos").val();
        const horas = $("#horas").val();
        $.post('../control/ctrlIngresartmEmpaque.php', {
            operario: operario,
            celula: celula,
            fecha: fecha,
            semana: semana,
            causa: causa,
            minutos: minutos,
            horas: horas
        }, (responseText) => {
            $('#respuesta').html(responseText);
        });
    });

    //Muestra la modal con la informacion del usuario
    $(document).click(function (e) {
        const accion = e.target.id;
        if (accion === "btn-editar-tmEmpaque") {
            const idTmEmpaque = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                idTmEmpaque: idTmEmpaque
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Boton actualizar usuario
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-tmEmpaque") {
            const idTmEmpaque = $('#idTmEmpaque').val();
            const operarioTmEmpaque = $('#operarioTmEmpaque').val();
            const fechaTmEmpaque = $('#fechaTmEmpaque').val();
            const semanaTmEmpaque = $('#semanaTmEmpaque').val();
            const celulaTmEmpaque = $('#celulaTmEmpaque').val();
            const causaTmEmpaque = $('#causaTmEmpaque').val();
            const minutosTmEmpaque = $('#minutosTmEmpaque').val();
            const horasTmEmpaque = $('#horasTmEmpaque').val();
            $.post('../control/ctrlActualizartmEmpaque.php', {
                accion: accion,
                idTmEmpaque: idTmEmpaque,
                operarioTmEmpaque: operarioTmEmpaque,
                fechaTmEmpaque: fechaTmEmpaque,
                semanaTmEmpaque: semanaTmEmpaque,
                celulaTmEmpaque: celulaTmEmpaque,
                causaTmEmpaque: causaTmEmpaque,
                minutosTmEmpaque: minutosTmEmpaque,
                horasTmEmpaque: horasTmEmpaque
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

});
