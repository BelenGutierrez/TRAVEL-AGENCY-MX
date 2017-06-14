<?php
require_once '../../Model/Excursion.php';
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../View/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../View/css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body class="fondo_2">

        <!--########## CONTAINER #################-->
        <div class="container principal">

            <!--############ HEADER ############-->
            <?php require_once '../../View/User/header.php'; ?>
            <!--########### MAIN #############-->
            <div class="row bg_blue">
                <div class="col-xs-12 col-sm-12 col-md-12">                          
                        <div class="back_title_3 title_white text-center margin_bottom_30 t_sh">Detalle de la excursión</div>             
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <form action="../../Controller/User/excursiones.php" method="post">
                            <input class="btn btn-primary" type="submit" value="Volver a Excusiones">
                        </form>
                    </div>

                    <?php
                    $codigo = $_POST['codigo'];
                    $clear = 0;
                    foreach ($_SESSION['excursiones'] as $articulo) {
                        if ($articulo->getCodigo() == $codigo) {
                            ?>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin_bottom_30 margin_top_20 padding_40">
                                <a class="box-photo img_best_hight" href="" style="background-image:url(../../View/img/excursion/<?= $articulo->getImagen() ?>);"></a>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-12 under_img">
                                    <h1 class="t_sh"><?= $articulo->getNombre() ?></h1>
                                    <span class="subtitle_white"><?= $articulo->getDetalle() ?></span><br><br>
                                    <span class="pull-right title_orange">Precio: <?= $articulo->getPrecio() ?> mxn</span>
                                    <form action="../../Controller/User/addCarrito.php" method="get">
                                        <input type="hidden" name="codigo" value="<?= $articulo->getCodigo() ?>">
                                        <input type="hidden" name="accion" value="comprar">                          
                                        <input class="btn btn-primary" type="submit" value="Comprar">
                                    </form>

                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>               
                </div>
            </div>
            <?php require_once '../../View/User/footer.php'; ?>

            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>
        </div>    
    </body>
</html>



