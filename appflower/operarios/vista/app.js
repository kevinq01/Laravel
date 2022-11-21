$(document).ready(function () {
    var perfil = $("#perfil").val();
    var title = $(document).attr('title');
    var limit = $("#limit").val();
    var pagina = $("#pagina").val();

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
        var numero = 1;
        $.post('../../roles/control/ctrlModalOut.php', {
            numero: numero
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

    //Cerrar la sesion, volver al index. ctrlSesiónDestroy
    $(document).click(function (e) {
        var accion = e.target.id;
        if (accion === "btn-sesionOut") {
            $.post('../../roles/control/ctrlSesionDestroy.php', {
                accion: accion
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


    $("#btn-ingresar-operario").click(function (e) {
        var codigo = $('#codigo').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellidos').val();
        var cedula = $('#cedula').val();
        $.post('../control/ctrlIngresarOperario.php', {
            codigo: codigo,
            nombre: nombre,
            apellido: apellido,
            cedula: cedula
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });


    //Muestra la modal con la informacion del operario //update
    $(document).click(function (e) {
        var accion = e.target.id;
        if (accion === "btn-editar-operario") {
            var codigo = e.target.value;
            $.post('../control/ctrlModalActualizar.php', {
                accion: accion,
                codigo: codigo
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    //Responde la modal con la información del operario
    $(document).click(function (e) {
        var accion = e.target.id;
        if (accion === "btn-buscar-operario") {
            var codigo = $('#BuscarOperario').val();
            $.post('../control/ctrlBuscarOperario.php', {
                accion: accion,
                codigo: codigo
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


    //Boton actualizar usuario
    $(document).click(function (e) {
        var accion = e.target.id;
        if (e.target.id === "btn-update-operario") {
            var idOperario = $('#idOperario').val();
            var id = $('#id').val();
            var nombreOperario = $('#nombreOperario').val();
            var cedulaOperario = $('#cedulaOperario').val();
            $.post('../control/ctrlActualizarOperario.php', {
                accion: accion,
                id: id,
                idOperario: idOperario,
                nombreOperario: nombreOperario,
                cedulaOperario: cedulaOperario
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });


    //Muestra la modal con la informacion del usuario
    $(document).click(function (e) {
        var accion = e.target.id;
        if (accion === "btn-eliminar-operario") {
            var codigo = e.target.value;
            $.post('../control/ctrlModalEliminar.php', {
                accion: accion,
                codigo: codigo
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });

    $(document).click(function (e) {
        var accion = e.target.id;
        if (e.target.id === "btn-delete-operario") {
            var codigo = e.target.value;
            $.post('../control/ctrlEliminarOperario.php', {
                accion: accion,
                codigo: codigo
            }, function (responseText) {
                $('#respuesta').html(responseText);
            });
        }
    });



    $('#import_excel_form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "../control/ctrlCargarOperarios.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#import').attr('disabled', 'disabled');
                $('#import').val('cargando...');
                $('#import').addClass('text-dark');
            },
            success: function (data) {
                $('#message').html(data);
                $('#import_excel_form')[0].reset();
                $('#import').attr('disabled', false);
                $('#import').val('Cargar información');
                $('#import').removeClass('text-dark');
            }
        })
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

});