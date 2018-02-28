var id_formacion = 0;

function DialogAdicionarFormacion() {
    var data;

    $.ajax({
        type: "POST",
        url: 'lib/Formacion/Vista/FormCrearFormacion.php',
        async: false,
        success: function (retu) {
            data = retu;
        }
    });


    $("#modal_formacion").html("");
    $("#modal_formacion").html(data);
}

function SeleccionEstadoEstudio() {
    var estado_estudio = $("#estado_estudio_f").val();

    if (estado_estudio == "") {
        alert("Seleccione un estado de trabajo");
    } else if (estado_estudio == "Culminado") {

        $("#fie_cont").html('<input type="text" class="form-control" id="fecha_inicio_f" name="fecha_inicio_f" placeholder="FECHA INICIO" >');
        $("#ffie_cont").html('<input type="text" class="form-control" id="fecha_fin_f" name="fecha_fin_f" placeholder="FECHA FIN" >');
        EjecutaFechasEstudio(estado_estudio);

    } else if (estado_estudio == "Actualmente") {
        $("#fie_cont").html('<input type="text" class="form-control" id="fecha_inicio_f" name="fecha_inicio_f" placeholder="FECHA INICIO" >');
        $("#ffie_cont").html('<input type="hidden"  id="fecha_fin_f" name="fecha_fin_f" value="no_aplica" >');

        EjecutaFechasEstudio(estado_estudio);
    }

}

function EjecutaFechasEstudio(des) {

    if (des == 'Actualmente') {

        $(function () {
            $("#fecha_inicio_f").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });

    } else if (des == 'Culminado') {
        $(function () {
            var dateFormat = "yy-mm-dd",
                    from = $("#fecha_inicio_f")
                    .datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    })
                    .on("change", function () {
                        to.datepicker("option", "minDate", getDate(this));
                    }),
                    to = $("#fecha_fin_f").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            })
                    .on("change", function () {
                        from.datepicker("option", "maxDate", getDate(this));
                    });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
    }

}

function AdicionarFormacion() {


    id_formacion = id_formacion + 1;

    var centro_educativo = $("#centro_educativo_f").val();
    var nivel_estudios = $("#nivel_estudio_f").val();
    var titulo_obt = $("#titulo_obtenido_f").val();
    var estado_estudio = $("#estado_estudio_f").val();
    var fecha_inicio = $("#fecha_inicio_f").val();
    var fecha_fin = $("#fecha_fin_f").val();

    var html = "<tr id='formacion_" + id_formacion + "'>" +
            "<td>" + centro_educativo + "<input type='hidden' name='for_centro[]' id='for_centro' value='" + centro_educativo + "'></td>" +
            "<td>" + titulo_obt + "<input type='hidden' name='for_titulo[]' id='for_titulo' value='" + titulo_obt + "'></td>" +
            "<td>" + fecha_inicio + " hasta " + fecha_fin + "</td>" +
            "<input type='hidden' name='fecha_inicio_for[]' id='fecha_inicio_for' value='" + fecha_inicio + "'>" +
            "<input type='hidden' name='fecha_fin_for[]' id='fecha_fin_for' value='" + fecha_fin + "'>" +
            "<input type='hidden' name='estado_for[]' id='estado_for' value='" + estado_estudio + "'>" +
            "<input type='hidden' name='nivel_for[]' id='nivel_for' value='" + nivel_estudios + "'>" +
            "<td><input type='button' value='Eliminar' class='btn btn-danger' onclick='EliminarFormacionTab(" + id_formacion + ")'></td>" +
            "</tr>";

    $("#tab_formacion").append(html);

    $("#modal_formacion").modal("toggle");



}
function EliminarFormacionTab(forma) {

    $("#formacion_" + forma + "").remove();
}