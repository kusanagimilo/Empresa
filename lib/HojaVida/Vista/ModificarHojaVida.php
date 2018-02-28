<?php
$anio = date('Y');
$persona = $_POST['persona'];
?>

<div class="row">

    <div class="col-sm-12 col-md-12">


        <div class="panel panel-default">


            <div class="panel-heading">
                <div class="panel-title">DATOS PERSONALES</div>
            </div>

            <div class="panel-body form-horizontal" >

                <br style="clear:both">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Nombres</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="nombres_m" name="nombres_m" placeholder="NOMBRES" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Apellidos</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="apellidos_m" name="apellidos_m" placeholder="APELLIDOS" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Correo</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="correo_m" name="correo_m" placeholder="Correo electronico" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Tipo identificacion</label>  
                    <div class="col-md-4">
                        <select class="form-control" id="tipo_identificacion_m"  name="tipo_identificacion_m" >
                            <option value="">Seleccione</option>
                            <option value="1">Cédula de ciudadanía</option>
                            <option value="2">Cédula de extranjería</option>
                            <option value="3">Tarjeta de identidad</option>
                            <option value="4">Pasaporte</option>
                            <option value="5">Número de Identificación </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="identificacion_m" name="identificacion_m" placeholder="NUMERO IDENTIFICACION" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Fecha nacimiento</label>  
                    <div class="col-md-2">

                        <select class="form-control" id="dia_m" name="dia_m">
                            <option value="">Seleccion el dia</option>
                            <?php
                            for ($index = 1; $index < 32; $index++) {
                                echo " <option value='$index'>$index</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="mes_m" name="mes_m">
                            <option value="">Seleccion el mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" id="anio_m" name="anio_m">
                            <option value="">Seleccion el año</option>
                            <?php
                            for ($index1 = 1920; $index1 < $anio + 1; $index1++) {
                                echo " <option value='$index1'>$index1</option>";
                            }
                            ?>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Genero</label>  
                    <div class="col-md-7">
                        <select class="form-control" id="genero_m"  name="genero_m" >
                            <option value="">Seleccione</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Estado civil</label>  
                    <div class="col-md-7">
                        <select class="form-control" id="estado_civil_m"  name="estado_civil_m" >
                            <option value="">Seleccione</option>
                            <option value="Soltero(a)">Soltero(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Telefono</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="telefono1_m" name="telefono1_m" placeholder="TELEFONO" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Telefono 2</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="telefono2_m" name="telefono2_m" placeholder="TELEFONO 2" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Departamento</label>  
                    <div class="col-md-7">
                        <select onchange="ListaMunicipio('municipio_m', 'departamento_m')" class="form-control" id="departamento_m"  name="departamento_m" >
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Municipio</label>  
                    <div class="col-md-7">
                        <select class="form-control" id="municipio_m"  name="municipio_m" >
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Direccion</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="direccion_m" name="direccion_m" placeholder="DIRECCION" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Foto</label>  
                    <div class="col-md-7">
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="FOTO" >
                    </div>
                </div>



            </div>
            <div class="panel-heading">
                <div class="panel-title">PERFIL PROFESIONAL</div>
            </div>

            <div class="panel-body form-horizontal" >
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Cargo o titulo breve de su hoja de vida</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="cargo_hjv_m" name="cargo_hjv_m" placeholder="Ej: Programador,etc." required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Descripción breve de su perfil profesional</label>  
                    <div class="col-md-7">
                        <textarea style="height: 150px;" class="form-control" id="perfil_pro_hjv_m" name="perfil_pro_hjv_m">
                                                                                                                                                                                                                                                                            
                        </textarea>
                    </div>
                </div>



            </div>

            <div class="panel-heading">
                <div class="panel-title">EXPERIENCIA PROFESIONAL</div>
            </div>

            <div class="panel-body form-horizontal" >
                <center><input type="button" onclick="DialogAdicionarExperiencia()" value="ADICIONAR EXPERIENCIA" data-toggle="modal" data-target="#modal_experiencia" class="btn btn-primary" ></center>
                <br>
                <table  class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>

                            <th colspan="6">
                    <center>
                        Experiencia profesional 
                    </center>
                    </th>

                    </tr>
                    <tr>
                        <th>Empresa</th>
                        <th>Cargo</th>
                        <th>Area</th>
                        <th>Periodo</th>
                        <th>Eliminar</th>

                    </tr>
                    </thead>
                    <tbody id="experiencia_tab">

                    </tbody>

                </table>

            </div>


            <div class="panel-heading">
                <div class="panel-title">FORMACION</div>
            </div>

            <div class="panel-body form-horizontal" >
                <center><input onclick="DialogAdicionarFormacion()" data-toggle="modal" data-target="#modal_formacion" type="button" value="ADICIONAR FORMACION" class="btn btn-primary" ></center>
                <br>
                <table  class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th colspan="4">
                    <center>
                        Formacion

                    </center>
                    </th>
                    </tr>
                    <tr>
                        <th>Centro educativo</th>
                        <th>Titulo obtenido</th>
                        <th>Periodo</th>
                        <th>Eliminar</th>

                    </tr>
                    </thead>
                    <tbody id="tab_formacion">

                    </tbody>

                </table>


            </div>

            <!--                            <div class="panel-heading">
                                            <div class="panel-title">CONOCIMIENTOS Y HABILIDADES</div>
                                        </div>
            
                                        <div class="panel-body form-horizontal" >
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="textinput">Ingrese el conocimiento o habilidad</label>  
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" id="cargo_hjv" name="cargo" placeholder="Conocimiento o habilidad" required>
            
                                                </div>
                                                <div class="col-md-2">
                                                    <center><input type="button" class="btn btn-primary" value="Adicionar"></center>
                                                </div>
                                            </div>
                                        </div>-->

            <div class="panel-heading">
                <div class="panel-title">PREFERENCIAS LABORALES</div>
            </div>
            <div class="panel-body form-horizontal" >
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Disponibilidad de tiempo</label>  
                    <div class="col-md-7">
                        <select id="disponibilidad_tiempo_m" class="form-control">
                            <option value="">seleccione</option>
                            <option value="1">Tiempo completo</option>
                            <option value="2">Tiempo parcial</option>
                            <option value="3">Por horas</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Valor minimo aceptado menusal</label>  
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="valor_minimo_mensual_m" name="valor_minimo_mensual_m" placeholder="Salario minimo aceptado mensualemnte" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Disponibilidad para viajar</label>  
                    <div class="col-md-7">
                        <select id="disponibilidad_viajar_m" name="disponibilidad_viajar_m" class="form-control">
                            <option value="">seleccione</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>

                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Disponibilidad para cambiar de residencia</label>  
                    <div class="col-md-7">
                        <select id="cambia_residencia_m" name="cambia_residencia_m" class="form-control">
                            <option value="">seleccione</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>

                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="textinput">Restriccion de transporte</label>  
                    <div class="col-md-7">
                        <select id="restriccion_transporte_m" name="restriccion_transporte_m" class="form-control">
                            <option value="">seleccione</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>

                        </select>

                    </div>
                </div>





            </div>

            <div class="panel-footer">
                <center><input type="button" onclick="ModificarHojaVida()" value="GUARDAR" class="btn btn-success btn-lg"></center>
            </div>




        </div>

    </div>

</div>


<script>

    var json_data_hoja_vida = InformacionHojaVida(<?php echo $persona; ?>);

    console.log(json_data_hoja_vida);

    ListaDepartamentos('departamento_m');

    $("#nombres_m").val(json_data_hoja_vida.nombres);
    $("#apellidos_m").val(json_data_hoja_vida.apellidos);
    $("#correo_m").val(json_data_hoja_vida.correo);
    $("#tipo_identificacion_m").val(json_data_hoja_vida.tipo_identificacion);
    $("#identificacion_m").val(json_data_hoja_vida.identificacion);
    $("#genero_m").val(json_data_hoja_vida.genero);
    $("#estado_civil_m").val(json_data_hoja_vida.estado_civil);
    $("#telefono1_m").val(json_data_hoja_vida.telefono1);
    $("#telefono2_m").val(json_data_hoja_vida.telefono2);
    $("#departamento_m").val(json_data_hoja_vida.id_departamento);
    $("#direccion_m").val(json_data_hoja_vida.direccion);

    var fecha_nacimiento = json_data_hoja_vida.fecha_nacimiento.split("-");

    $("#dia_m").val(fecha_nacimiento[2]);
    $("#mes_m").val(fecha_nacimiento[1]);
    $("#anio_m").val(fecha_nacimiento[0]);

    ListaMunicipio('municipio_m', 'departamento_m');

    $("#municipio_m").val(json_data_hoja_vida.id_municipio);
    $("#cargo_hjv_m").val(json_data_hoja_vida.cargo_hoja_vida);
    $("#perfil_pro_hjv_m").val(json_data_hoja_vida.descripcion_perfil_profesional);
    /*$("#tipo_identificacion_m").val(json_data_hoja_vida.tipo_identificacion);
     $("#tipo_identificacion_m").val(json_data_hoja_vida.tipo_identificacion);*/


</script>