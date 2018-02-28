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


        var arreglo_experiencia_empresas = [];
        $('input[name^="empresa_ex"]').each(function () {
            arreglo_experiencia_empresas.push($(this).val());
        });

        var arreglo_experiencia_cargo = [];
        $('input[name^="cargo_ex"]').each(function () {
            arreglo_experiencia_cargo.push($(this).val());
        });

        var arreglo_experiencia_area = [];
        $('input[name^="area_ex"]').each(function () {
            arreglo_experiencia_area.push($(this).val());
        });
        var arreglo_experiencia_sector = [];
        $('input[name^="sector_ex"]').each(function () {
            arreglo_experiencia_sector.push($(this).val());
        });

        var arreglo_experiencia_fecha_inicio = [];
        $('input[name^="fecha_inicio_ex"]').each(function () {
            arreglo_experiencia_fecha_inicio.push($(this).val());
        });

        var arreglo_experiencia_fecha_fin = [];
        $('input[name^="fecha_fin_ex"]').each(function () {
            arreglo_experiencia_fecha_fin.push($(this).val());
        });

        var arreglo_experiencia_departamento = [];
        $('input[name^="depto_ex"]').each(function () {
            arreglo_experiencia_departamento.push($(this).val());
        });

        var arreglo_experiencia_funcion = [];
        $('input[name^="funcion_ex"]').each(function () {
            arreglo_experiencia_funcion.push($(this).val());
        });

        var arreglo_experiencia_estado = [];
        $('input[name^="estado_ex"]').each(function () {
            arreglo_experiencia_estado.push($(this).val());
        });

        /* Arreglos formacion */

        var arreglo_formacion_centro = [];
        $('input[name^="for_centro"]').each(function () {
            arreglo_formacion_centro.push($(this).val());
        });

        var arreglo_formacion_nivel = [];
        $('input[name^="nivel_for"]').each(function () {
            arreglo_formacion_nivel.push($(this).val());
        });
        var arreglo_formacion_titulo = [];
        $('input[name^="for_titulo"]').each(function () {
            arreglo_formacion_titulo.push($(this).val());
        });
        var arreglo_formacion_estado = [];
        $('input[name^="estado_for"]').each(function () {
            arreglo_formacion_estado.push($(this).val());
        });
        var arreglo_formacion_fecha_inicio = [];
        $('input[name^="fecha_inicio_for"]').each(function () {
            arreglo_formacion_fecha_inicio.push($(this).val());
        });
        var arreglo_formacion_fecha_fin = [];
        $('input[name^="fecha_fin_for"]').each(function () {
            arreglo_formacion_fecha_fin.push($(this).val());
        });

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
                perfil_profesional: $("#perfil_pro_hjv").val(),
                arreglo_experiencia_empresas: arreglo_experiencia_empresas,
                arreglo_experiencia_cargo: arreglo_experiencia_cargo,
                arreglo_experiencia_area: arreglo_experiencia_area,
                arreglo_experiencia_sector: arreglo_experiencia_sector,
                arreglo_experiencia_fecha_inicio: arreglo_experiencia_fecha_inicio,
                arreglo_experiencia_fecha_fin: arreglo_experiencia_fecha_fin,
                arreglo_experiencia_departamento: arreglo_experiencia_departamento,
                arreglo_experiencia_funcion: arreglo_experiencia_funcion,
                arreglo_experiencia_estado: arreglo_experiencia_estado,
                arreglo_formacion_centro: arreglo_formacion_centro,
                arreglo_formacion_nivel: arreglo_formacion_nivel,
                arreglo_formacion_titulo: arreglo_formacion_titulo,
                arreglo_formacion_estado: arreglo_formacion_estado,
                arreglo_formacion_fecha_inicio: arreglo_formacion_fecha_inicio,
                arreglo_formacion_fecha_fin: arreglo_formacion_fecha_fin,
                disponibilidad_tiempo: $("#disponibilidad_tiempo").val(),
                valor_minimo_mensual: $("#valor_minimo_mensual").val(),
                disponible_viajar: $("#disponibilidad_viajar").val(),
                cambio_residencia: $("#cambia_residencia").val(),
                restriccion_transporte: $("#restriccion_transporte").val()



            },
            success: function (retu) {
                retorno = retu;
            }
        });

        if (retorno == "bien") {
            alert("SE INGRESO CORRECTAMENTE LA HOJA DE VIDA");
            llamadoHojaVida(persona);
        } else {
            alert("OCURRIO UN ERROR AL TRATAR DE ALMACENAR LA HOJA DE VIDA");
        }
    }


}

function llamadoHojaVida(persona) {
    var json = InformacionHojaVida(persona);
    var data;

    if (json.hv == 'N') {

        $.ajax({
            type: "POST",
            url: 'lib/HojaVida/Vista/CrearHojaVida.php',
            async: false,
            data: {
                persona: persona
            },
            success: function (retu) {
                data = retu;
            }
        });
        $("#codigo_cont").html(data);


    } else {

        $.ajax({
            type: "POST",
            url: 'lib/HojaVida/Vista/ModificarHojaVida.php',
            async: false,
            data: {
                persona: persona
            },
            success: function (retu) {
                data = retu;
            }
        });
        $("#codigo_cont").html(data);

    }
}
