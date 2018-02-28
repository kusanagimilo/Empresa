/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ListaDepartamentos(id_control) {
    var data;


    $.ajax({
        type: "POST",
        url: 'lib/Utilidades/Controlador/UtilidadesControl.php',
        async: false,
        dataType: 'json',
        data: {
            opcion: 'ListaDepartamentos'
        },
        success: function (retu) {
            data = retu;
        }
    });

    $.each(data, function (key, datap) {
        $("#" + id_control + "").append('<option value="' + datap.coddepto + '">' + datap.nomdepto + '</option>');
    });

}

function ListaMunicipio(id_control, id_control_departamento) {
    var data;

    var coddepto = $("#" + id_control_departamento + "").val();

    $.ajax({
        type: "POST",
        url: 'lib/Utilidades/Controlador/UtilidadesControl.php',
        async: false,
        dataType: 'json',
        data: {
            opcion: 'ListaMunicipio',
            coddepto: coddepto
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#" + id_control + "").html("");
    $("#" + id_control + "").append('<option value="">seleccione</option>');

    $.each(data, function (key, datap) {
        $("#" + id_control + "").append('<option value="' + datap.codmuncpio + '">' + datap.nommpio + '</option>');
    });

}