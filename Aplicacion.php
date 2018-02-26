<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$usuario = $_SESSION['usuario'];
$anio = date('Y');

if ($usuario['nombre_usuario'] != NULL || $usuario['nombre_usuario'] != '') {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Hojas de vida</title>
            <script type="text/javascript" src="assets/js/jquery.js"></script>
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="assets/css/app.css" type="text/css">
            <link rel="stylesheet" href="css/menu.css" type="text/css">
            <link rel="stylesheet" href="assets/js/jquery-ui-1.11.4.custom/jquery-ui.css" type="text/css">
            <!--<link rel="stylesheet" href="css/jquery.dataTables.css" type="text/css">-->


            <script type="text/javascript" src="assets/js/vendor/bootstrap.min.js"></script>
            <script type="text/javascript" src="lib/Utilidades/js/Utilidades.js"></script>
            <script type="text/javascript" src="lib/HojaVida/js/HojaVida.js"></script>
    <!--            <script type="text/javascript" src="js/Usuario.js"></script>
            <script type="text/javascript" src="js/Docente.js"></script>
            <script type="text/javascript" src="js/HojaVida.js"></script>
            <script type="text/javascript" src="js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
            <script type="text/javascript" src="js/jquery.dataTables.js"></script>
            <script type="text/javascript" src="js/jquery_validate.js"></script>-->

        </head>
        <body>
            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container"> 
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                        </button>
                        <a target="_blank" href="#" class="navbar-brand"><b>Hojas de vida </b></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">           
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span> 
                                    <strong><?php echo $usuario['nombres'] . " " . $usuario['apellidos']; ?></strong>
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <p class="text-center">
                                                        <span class="glyphicon glyphicon-user icon-size"></span>
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="text-left"><strong><?php echo $usuario['nombres'] . " " . $usuario['apellidos']; ?></strong></p>
                                                    <p class="text-left small"><?php echo $usuario['nombre_usuario']; ?></p>
    <!--                                                    <p class="text-left">
                                                        <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                                    </p>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        <a href="lib/cerrar_sesion.php" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container" style="margin-top: 100px;">
                <div class="row">

                    <div class="col-sm-10 col-md-10">


                        <div class="panel panel-default">


                            <div class="panel-heading">
                                <div class="panel-title">DATOS PERSONALES</div>
                            </div>

                            <div class="panel-body form-horizontal" >

                                <br style="clear:both">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Nombres</label>  
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="NOMBRES" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Apellidos</label>  
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="APELLIDOS" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Correo</label>  
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Tipo identificacion</label>  
                                    <div class="col-md-4">
                                        <select class="form-control" id="tipo_identificacion"  name="tipo_identificacion" >
                                            <option value="">Seleccione</option>
                                            <option value="1">Cédula de ciudadanía</option>
                                            <option value="2">Cédula de extranjería</option>
                                            <option value="3">Tarjeta de identidad</option>
                                            <option value="4">Pasaporte</option>
                                            <option value="5">Número de Identificación </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="NUMERO IDENTIFICACION" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Fecha nacimiento</label>  
                                    <div class="col-md-2">

                                        <select class="form-control" id="dia" name="dia">
                                            <option value="">Seleccion el dia</option>
                                            <?php
                                            for ($index = 1; $index < 32; $index++) {
                                                echo " <option value='$index'>$index</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" id="mes" name="mes">
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
                                        <select class="form-control" id="anio" name="anio">
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
                                        <select class="form-control" id="genero"  name="genero" >
                                            <option value="">Seleccione</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Estado civil</label>  
                                    <div class="col-md-7">
                                        <select class="form-control" id="estado_civil"  name="estado_civil" >
                                            <option value="">Seleccione</option>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Telefono</label>  
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="telefono1" name="telefono1" placeholder="TELEFONO" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Telefono 2</label>  
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="telefono2" name="telefono2" placeholder="TELEFONO 2" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Departamento</label>  
                                    <div class="col-md-7">
                                        <select onchange="ListaMunicipio('municipio', 'departamento')" class="form-control" id="departamento"  name="departamento" >
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Municipio</label>  
                                    <div class="col-md-7">
                                        <select class="form-control" id="municipio"  name="municipio" >
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Direccion</label>  
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="DIRECCION" >
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
                                        <input type="text" class="form-control" id="cargo_hjv" name="cargo" placeholder="Ej: Programador,etc." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Descripción breve de su perfil profesional</label>  
                                    <div class="col-md-7">
                                        <textarea style="height: 150px;" class="form-control" id="perfil_pro_hjv" name="perfil_pro">
                                                                                                                
                                        </textarea>
                                    </div>
                                </div>



                            </div>

                            <div class="panel-heading">
                                <div class="panel-title">EXPERIENCIA PROFESIONAL</div>
                            </div>

                            <div class="panel-body form-horizontal" >
                                <center><input type="button" value="ADICIONAR EXPERIENCIA" class="btn btn-primary" ></center>
                            </div>


                            <div class="panel-heading">
                                <div class="panel-title">FORMACION</div>
                            </div>

                            <div class="panel-body form-horizontal" >
                                <center><input type="button" value="ADICIONAR FORMACION" class="btn btn-primary" ></center>
                            </div>

                            <div class="panel-heading">
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
                            </div>

                            <div class="panel-footer">
                                <center><input type="button" onclick="AlmacenarDataHojaVida(<?php echo $usuario['id_persona'] ?>)" value="GUARDAR" class="btn btn-success btn-lg"></center>
                            </div>




                        </div>

                    </div>

                </div>
            </div>
        </div>


        <script>
            ListaDepartamentos('departamento');


            var json_data_hoja_vida = InformacionHojaVida(<?php echo $usuario['id_persona'] ?>);

            $("#nombres").val(json_data_hoja_vida.nombres);
            $("#apellidos").val(json_data_hoja_vida.apellidos);
            $("#correo").val(json_data_hoja_vida.correo);

        </script>

    </body>
    </html>
    <?php
} else {
    header('Location: index.php');
}
?>