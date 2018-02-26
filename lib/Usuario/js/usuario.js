function AlmacenarUsuario() {

    var clave = $("#clave").val();
    var re_clave = $("#re_clave").val();

    if (clave == re_clave) {

        var data;
        $.ajax({
            type: "POST",
            url: "lib/Usuario/Controlador/UsuarioControl.php",
            async: false,
            data: {
                opcion: 'AlmacenarUsuario',
                nombres: $("#nombres").val(),
                apellidos: $("#apellidos").val(),
                correo: $("#correo").val(),
                clave: $("#clave").val()

            },
            success: function (retu) {
                data = retu;
            }
        });

        if (data == 1) {

            alert("Se ingreso correctamente el usuario");


        } else if (data == 2)
        {
            alert("Este usuario ya existe cambielo");
        } else
        {
            alert("No se logro ingresar el usuario, comuniquese con soporte");
        }


    } else {
        alert("Las claves no coinciden");
    }

}