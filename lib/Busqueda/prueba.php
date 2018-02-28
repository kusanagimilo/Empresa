<!DOCTYPE html>
<html>
    <head>
        <title>PHP infinite scroll pagination</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <style type="text/css">
            .ajax-load{
                background: #e1e1e1;
                padding: 10px 0px;
                width: 100%;
            }

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


        <div class="container">
            <h2 class="text-center">PHP infinite scroll pagination</h2>
            <br/>
            <div class="col-md-12" id="post-data">
                <?php
                require('../config/conexion.php');
                $obj_conexion = new BD();
                $link = $obj_conexion->conectar();

                $sql = "SELECT * FROM tdepto
            ORDER BY coddepto DESC LIMIT 8";
                $resul = $obj_conexion->ResultSet($sql, $link);
                ?>


                <?php include('data.php'); ?>


            </div>
        </div>


        <div class="ajax-load text-center" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
        </div>


        <script type="text/javascript">
            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    var last_id = $(".iconcontainer:last").attr("id");
                    loadMoreData(last_id);
                }
            });


            function loadMoreData(last_id) {
                $.ajax({
                    url: 'loadMoreData.php?last_id=' + last_id,
                    type: "get",
                    async: false,
                    beforeSend: function ()
                    {
                        $('.ajax-load').show();
                    }
                }).done(function (data)
                {
                    if (data != "vacio") {

                        $('.ajax-load').hide();
                        $("#post-data").append(data);
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