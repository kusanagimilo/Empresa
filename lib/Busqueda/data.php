<?php
foreach ($resul as $key => $post) {
    ?>

    <div class="iconcontainer" id="<?php echo $post['id_hoja_vida']; ?>">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="iconbox">
                    <div class="iconbox-icon">

                        <div class="avatar" style='background-image: url(assets/images/1.jpg)'></div>

                    </div>
                    <br>
                    <div class="featureinfo">
                        <h4 class="text-center"><?php echo utf8_encode($post['nombres'] . " " . $post["apellidos"]); ?></h4>
                        <p>
                            <?php echo utf8_encode($post['nomdepto']); ?>
                        </p>
                        <a class="btn btn-default btn-sm" href="#" role="button">Ver perfil</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
}
?>

