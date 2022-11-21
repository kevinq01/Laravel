$(document).ready(function () {

    //Inicio de sesion
    $("#btn-login").click(function (e) {
        var correo = $('#correo').val();
        var password = $('#password').val();
        $.post('roles/control/ctrlInicioSesion.php', {
            correo: correo,
            password: password
        }, function (responseText) {
            $('#respuesta').html(responseText);
        });
    });

});