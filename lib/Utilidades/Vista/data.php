<?php
foreach ($resul as $key => $post) {


    $disponibilidad = "";

    if ($post['disponibilidad_tiempo'] == 1) {
        $disponibilidad = "Tiempo completo";
    } else if ($post['disponibilidad_tiempo'] == 2) {
        $disponibilidad = "Tiempo parcial";
    } else if ($post['disponibilidad_tiempo'] == 3) {
        $disponibilidad = "Por horas";
    }
    ?>

    <div class="iconcontainer" id="<?php echo $post['id_hoja_vida']; ?>">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="iconbox">
                    <div class="iconbox-icon">

                        <div class="avatar" style='background-image: url(assets/images/pp.jpeg)'></div>

                    </div>
                    <br>
                    <div class="featureinfo">
                        <h4 class="text-center"><?php echo utf8_encode($post['nombres'] . " " . $post["apellidos"]); ?></h4>
                        <h4 class="text-center"><span class="label label-warning"><?php echo $post['cargo_hoja_vida']; ?></span></h4>
                        <br>
                        <p>
                            <?php echo utf8_encode($post['descripcion_perfil_profesional']); ?><br>

                        </p>
                        <br>
                        <span style="float:left;margin-right: 2px; font-size: medium" class="label label-info">Disponibilidad de tiempo : <?php echo $disponibilidad; ?></span>
                        <span style="float:left; font-size: medium" class="label label-success">Disponibilidad de transporte : <?php echo $post['disponible_viajar']; ?></span>
                        <a class="btn btn-default btn-sm" href="#" role="button">Ver perfil</a>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
}
?>

