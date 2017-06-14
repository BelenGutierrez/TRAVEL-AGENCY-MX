
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
            <ul class="redes">
                <li><a href="https://www.blogger.com" target="_blank" role="button"><span id="elem1"></span></a></li>
                <li><a href="https://www.skype.com/es" target="_blank" role="button"><span id="elem2"></span></a></li>
                <li><a href="https://web.whatsapp.com" target="_blank" role="button"><span id="elem3"></span></a></li>
                <li><a href="http://www.facebook.com" target="_blank" role="button"><span id="elem4"></span></a></li>
            </ul>
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">             
                    <div class="back_title_3 title_white text-center margin_bottom_100 t_sh">Excursiones</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                    <?php
                    foreach ($_SESSION['excursiones'] as $articulo) {
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margin_bottom_30 margin_top_20 padding_40">
                            <a class="box-photo img_best " href="" style="background-image:url(../../View/img/excursion/<?= $articulo->getImagen() ?>);"></a>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12 under_img">
                                <h1 class="t_sh"><?= $articulo->getNombre() ?></h1>
                                <br><br>
                                <span class="pull-right title_orange">Precio: <?= $articulo->getPrecio() ?> mxn</span>
                                <form action="../../Controller/User/addCarrito.php" method="get">
                                    <input type="hidden" name="codigo" value="<?= $articulo->getCodigo() ?>">
                                    <input type="hidden" name="accion" value="comprar">                          
                                    <input class="btn btn-primary" type="submit" value="Comprar">
                                </form>

                                <form action="../../View/User/detalle.php" method="post">
                                    <input type="hidden" name="codigo" value="<?= $articulo->getCodigo() ?>">
                                    <input type="hidden" name="accion" value="detalle">                          
                                    <input class="btn btn-warning" type="submit" value="Detalle">
                                </form>
                            </div>
                        </div>
                        <?php
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
