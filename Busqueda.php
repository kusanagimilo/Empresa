<?php
/*
  @$_REQUEST["disponibilidad_tiempo_bus"];
  @$_REQUEST["disponibilidad_viajar_bus"];
  @$_REQUEST["profesion_bus"];
  @$_REQUEST["restriccion_tran_bus"];
  @$_REQUEST["disponibilidad_viajar_bus"]; */
include 'lib/config/config.php';
include 'lib/config/conexion.php';
@include 'lib/Utilidades/Modelo/Utilidades.php';

$valores_busqueda = $_REQUEST;

$obj_utilidades = new Utilidades();
$resul = $obj_utilidades->Busqueda($_REQUEST);
?>
<html class="no-js" lang="es"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Soft-Tect Free Landing Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!--Google fonts links-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />


        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <style>
            .iconcontainer {
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .iconbox {
                background: #ffffff;
                background-color: #ffffff;
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.16), 0 1px 3px 0 rgba(0, 0, 0, 0.12);
                padding: 20px 25px;
                text-align: right;
                display: block;
                margin-top: 60px;
                margin-bottom: 15px;
            }
            .iconbox-icon {
                background-color: #008EED;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                border-radius: 50%;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                margin: 0 auto;
                width: 100px;
                height: 100px;
                margin-top: -70px;
            }
            .iconbox-icon span {
                color: #fff;
                font-size: 42px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                padding-top: 29px;
                text-align: center;
                vertical-align: middle;
            }
            .featureinfo h4 {
                font-size: 26px;
                letter-spacing: 1px;
                text-transform: uppercase;
            }
            .featureinfo > p {
                color: #000000;
                font-size: 16px;
                padding-top: 4px;
                text-align: left;
            }

            div.avatar  {
                /* cambia estos dos valores para definir el tamaño de tu círculo */
                height: 100px;
                width: 100px;
                /* los siguientes valores son independientes del tamaño del círculo */
                background-repeat: no-repeat;
                background-position: 50%;
                border-radius: 50%;
                background-size: 100% auto;
            }

        </style>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Sections -->
        <section id="social" class="social">
            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="social-wrapper">
                        <div class="col-md-6">
                            <div class="social-icon">
                                <!--<a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>-->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="social-contact">

                                <input type="button" onclick="location.href = 'Registro_Empresa.html'" class="btn btn-info" value="Registra tu empresa"> 
                                <input type="button" onclick="location.href = 'Registro.html'" class="btn btn-warning" value="Registra tu hoja de vida"> 


                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container -->       
        </section>

        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="assets/images/logo.png" alt="Logo" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">PERSONAS</a></li>
                        <li><a  href="Empresa.php">EMPRESAS</a></li>
                        <li class="login"><a href="login.html">INICIAR SESION</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!--Home page style-->







        <!-- Sections -->
        <section id="business" class="portfolio sections">
            <div class="container">
                <div class="col-md-3">
                    BUSQUEDA
                </div>
                <div class="col-md-9" id="post-data">
                    <?php include('lib/Utilidades/Vista/data.php'); ?>
                </div>



            </div>
            <div class="ajax-load text-center" style="display:none">
                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Cargando mas perfiles</p>
            </div>
        </section>




        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-wrapper">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-brand">
                                <img src="assets/images/logo.png" alt="logo" />
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="copyright">
                                <p>Made with <i class="fa fa-heart"></i> by <a target="_blank" href="https://bootstrapthemes.co"> Bootstrap Themes </a>2016. All rights reserved.</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </footer>


        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>


        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>

        <script type="text/javascript">
                                    $(window).scroll(function () {
                                        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {

                                            var last_id = $(".iconcontainer:last").attr("id");

                                            loadMoreData(last_id);

                                        }
                                    });


                                    function loadMoreData(last_id) {



                                        var variables = "last_id=" + last_id +
                                                "&profesion_bus=<?php echo $_REQUEST["profesion_bus"]; ?>" +
                                                "&disponibilidad_tiempo_bus=<?php echo $_REQUEST["disponibilidad_tiempo_bus"]; ?>" +
                                                "&disponibilidad_viajar_bus=<?php echo $_REQUEST["disponibilidad_viajar_bus"]; ?>" +
                                                "&restriccion_tran_bus=<?php echo $_REQUEST["restriccion_tran_bus"]; ?>";


                                        $.ajax({
                                            url: 'lib/Utilidades/Vista/loadMoreData.php?' + variables,
                                            type: "get",
                                            async: false,
                                            beforeSend: function ()
                                            {
                                                $('.ajax-load').show();
                                            }
                                        }).done(function (data)
                                        {
                                            if (data != "vacio") {

                                                if (!$("#" + last_id + "").length) {
                                                    $('.ajax-load').hide();
                                                    $("#post-data").append(data);
                                                } else {
                                                    $('.ajax-load').hide();
                                                }

                                            } else {
                                                $('.ajax-load').hide();
                                            }
                                        }).fail(function (jqXHR, ajaxOptions, thrownError)
                                        {
                                            alert('server not responding...');

                                        });
                                    }
        </script>

    </body>
</html>
