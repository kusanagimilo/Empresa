
var id_experiencia = 0;

function DialogAdicionarExperiencia() {
    var data;

    $.ajax({
        type: "POST",
        url: 'lib/Experiencia/Vista/FormAgregarExperiencia.php',
        async: false,
        success: function (retu) {
            data = retu;
        }
    });


    $("#modal_experiencia").html("");
    $("#modal_experiencia").html(data);
}

function SeleccionEstadoTrabajo() {
    var estado_trabajo = $("#estado_trabajo_l").val();

    if (estado_trabajo == "") {
        alert("Seleccione un estado de trabajo");
    } else if (estado_trabajo == "Culminado") {

        $("#fi_cont").html('<input type="text" class="form-control" id="fecha_inicio_l" name="fecha_inicio_l" placeholder="FECHA INICIO" >');
        $("#ffi_cont").html('<input type="text" class="form-control" id="fecha_fin_l" name="fecha_fin_l" placeholder="FECHA FIN" >');
        EjecutaFechas(estado_trabajo);

    } else if (estado_trabajo == "Actualmente") {
        $("#fi_cont").html('<input type="text" class="form-control" id="fecha_inicio_l" name="fecha_inicio_l" placeholder="FECHA INICIO" >');
        $("#ffi_cont").html('<input type="hidden"  id="fecha_fin_l" name="fecha_fin_l" value="no_aplica" >');

        EjecutaFechas(estado_trabajo);
    }

}

function EjecutaFechas(des) {

    if (des == 'Actualmente') {

        $(function () {
            $("#fecha_inicio_l").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });

    } else if (des == 'Culminado') {
        $(function () {
            var dateFormat = "yy-mm-dd",
                    from = $("#fecha_inicio_l")
                    .datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    })
                    .on("change", function () {
                        to.datepicker("option", "minDate", getDate(this));
                    }),
                    to = $("#fecha_fin_l").datepicker({
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

function AdicionarExperiencia() {


    id_experiencia = id_experiencia + 1;


    var empresa = $("#empresa_l").val();
    var departamento = $("#departamento_l").val();
    var sector = $("#sector_l").val();
    var cargo = $("#cargo_l").val();
    var area = $("#area_l").val();
    var funcion = $("#funcion_l").val();
    var fecha_fin = $("#fecha_fin_l").val();
    var fecha_inicio = $("#fecha_inicio_l").val();
    var estado = $("#estado_trabajo_l").val();




    var html = "<tr id='experiencia_p" + id_experiencia + "'>" +
            "<td>" + empresa + "<input type='hidden' name='empresa_ex[]' id='empresa_ex' value='" + empresa + "'></td>" +
            "<td>" + cargo + "<input type='hidden' name='cargo_ex[]' id='cargo_ex' value='" + cargo + "'></td>" +
            "<td>" + area + "<input type='hidden' name='area_ex[]' id='area_ex' value='" + area + "'></td>" +
            "<td>" + fecha_inicio + " hasta " + fecha_fin +
            "<input type='hidden' name='fecha_inicio_ex[]' id='fecha_inicio_ex' value='" + fecha_inicio + "'>" +
            "<input type='hidden' name='fecha_fin_ex[]' id='fecha_fin_ex' value='" + fecha_fin + "'>" +
            "<input type='hidden' name='funcion_ex[]' id='funcion_ex' value='" + funcion + "'></td>" +
            "<input type='hidden' name='depto_ex[]' id='depto_ex' value='" + departamento + "'></td>" +
            "<input type='hidden' name='sector_ex[]' id='sector_ex' value='" + sector + "'></td>" +
            "<input type='hidden' name='estado_ex[]' id='estado_ex' value='" + estado + "'></td>" +
            "<td><input type='button' value='Eliminar' class='btn btn-danger' onclick='EliminarExperienciaTab(" + id_experiencia + ")'></td>" +
            "</tr>";

    $("#experiencia_tab").append(html);

    $('#modal_experiencia').modal('toggle');



}
function EliminarExperienciaTab(exp) {

    $("#experiencia_p" + exp + "").remove();
}

