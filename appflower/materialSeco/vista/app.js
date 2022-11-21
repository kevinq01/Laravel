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

    //Carga la paginación de la vista de material
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
    $("#btn-ingresar-materialSeco").click(() => {
        const labor = $("#labor").val();
        const operario = $("#operario").val();
        const fecha = $("#fecha").val();
        const hora = $("#hora").val();
        const cantidad = $("#cantidad").val();
        $.post('../control/ctrlIngresarMaterialSeco.php', {
            operario: operario,
            labor: labor,
            fecha: fecha,
            hora: hora,
            cantidad: cantidad
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    //Muestra la modal con la informacion del material Seco
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-editar-materialSeco") {
            const id_seco = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                id_seco: id_seco
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Responde la modal con la información de la produccion
    $(document).click((e) => {
        const accion = e.target.id;
        if (accion === "btn-buscar-material") {
            const idSeco = $('#buscarMaterial').val();
            $.post('../control/ctrlBuscarMaterial.php', {
                accion: accion,
                idSeco: idSeco
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Boton actualizar usuario
    $(document).click((e) => {
        const accion = e.target.id;
        if (e.target.id === "btn-update-material") {
            const idSeco = $('#idSeco').val();
            const operarioMaterial = $('#operarioMaterial').val();
            const fechaMaterial = $('#fechaMaterial').val();
            const laborMaterial = $('#laborMaterial').val();
            const cantidadMaterial = $('#cantidadMaterial').val();
            const horaMaterial = $('#horaMaterial').val();
            $.post('../control/ctrlActualizarMaterial.php', {
                accion: accion,
                idSeco: idSeco,
                operarioMaterial: operarioMaterial,
                fechaMaterial: fechaMaterial,
                laborMaterial: laborMaterial,
                cantidadMaterial: cantidadMaterial,
                horaMaterial: horaMaterial
            }, (responseText) => {
                $('#respuesta').html(responseText);
            });
        }
    });


});