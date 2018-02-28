<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$usuario = $_SESSION['usuario'];



if ($usuario['nombre_usuario'] != NULL || $usuario['nombre_usuario'] != '') {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Hojas de vida</title>
            <script type="text/javascript" src="assets/js/jquery.js"></script>
            <script type="text/javascript" src="assets/js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="assets/css/app.css" type="text/css">
            <link rel="stylesheet" href="assets/js/jquery-ui-1.11.4.custom/jquery-ui.css" type="text/css">
            <!--<link rel="stylesheet" href="css/jquery.dataTables.css" type="text/css">-->


            <script type="text/javascript" src="assets/js/vendor/bootstrap.min.js"></script>
            <script type="text/javascript" src="lib/Utilidades/js/Utilidades.js"></script>
            <script type="text/javascript" src="lib/HojaVida/js/HojaVida.js"></script>
            <script type="text/javascript" src="lib/Experiencia/js/Experiencia.js"></script>

            <script type="text/javascript" src="lib/Formacion/js/Formacion.js"></script>
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

                            <li><a href="#" onclick="llamadoHojaVida(<?php echo $usuario['id_persona']; ?>)"><span class="glyphicon glyphicon-book"></span>&nbsp;<strong>Hoja de vida</strong></a></li>

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

            <div class="container" style="margin-top: 100px;" id="codigo_cont">
            </div>




        </body>
    </html>
    <?php
    var_dump($usuario);
} else {
    header('Location: index.html');
}
?>