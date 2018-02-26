/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function InformacionHojaVida(id_persona) {
    var data;
    $.ajax({
        type: "POST",
        url: 'lib/HojaVida/Controlador/HojaVidaControl.php',
        async: false,
        dataType: 'json',
        data: {
            opcion: 'InformacionHojaVida',
            id_persona: id_persona
        },
        success: function (retu) {
            data = retu;
        }
    });
    return data;
}

function AlmacenarDataHojaVida(persona) {

    var confirma = confirm("Esta seguro de almacenar sus datos");
    if (confirma) {
        
        var retorno;
        
        $.ajax({
            type: "POST",
            url: 'lib/HojaVida/Controlador/HojaVidaControl.php',
            async: false,
            data: {
                opcion: 'AlmacenarDataHojaVida',
                id_persona: persona,
                nombres: $("#nombres").val(),
                apellidos: $("#apellidos").val(),
                correo: $("#correo").val(),
                genero: $("#genero").val(),
                estado_civil: $("#estado_civil").val(),
                telefono1: $("#telefono1").val(),
                telefono2: $("#telefono2").val(),
                direccion: $("#direccion").val(),
                departamento: $("#departamento").val(),
                municipio: $("#municipio").val(),
                tipo_identificacion: $("#tipo_identificacion").val(),
                identificacion: $("#identificacion").val(),
                anio: $("#anio").val(),
                mes: $("#mes").val(),
                dia: $("#dia").val(),
                cargo: $("#cargo_hjv").val(),
                perfil_profesional: $("#perfil_pro_hjv").val()
            },
            success: function (retu) {
                retorno = retu;
            }
        });
    }


}
