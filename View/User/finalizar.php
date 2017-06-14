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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="back_title_3 title_white text-center margin_bottom_100 t_sh">Disfrutarás a lo grande</div>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">  
                    <?php
                    $total = 0;
                    $clear = 0;
                    if (isset($_SESSION['carrito'])) {
                        foreach ($_SESSION['excursiones'] as $articulo) {
                            if ($_SESSION['carrito'][$articulo->getCodigo()] > 0) {
                                $total = $total + ($_SESSION['carrito'][$articulo->getCodigo()] * $articulo->getPrecio());
                                ?>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 margin_bottom_30 margin_top_20 padding_40">
                                    <a class="box-photo img_best" href="" style="background-image:url(../../View/img/excursion/<?= $articulo->getImagen() ?>);"></a>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12 under_img">
                                        <h1 class="t_sh"><?= $articulo->getNombre() ?></h1>

                                        <span class="pull-right title_orange">Precio: <?= $articulo->getPrecio() ?> mxn</span>
                                        <span class="subtitle_white">Unidades: <?= $_SESSION['carrito'][$articulo->getCodigo()] ?></span>
                                        <form action="../../Controller/User/addCarrito.php" method="post">
                                            <input type="hidden" name="codigo" value="<?= $articulo->getCodigo() ?>">
                                            <input type="hidden" name="accion" value="eliminar">
                                            <input class="btn btn-danger" type="submit" value="Eliminar">
                                        </form>
                                    </div>
                                </div>
                                <?php
                                if ($clear % 2 != 0) {
                                    echo '<div class="clearfix"></div>';
                                }
                                $clear++;
                            }
                        }
                    } else {
                        echo '<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 text-center padding_40"><br><br><br>'
                        . '<h1>No se ha escogido ninguna excursión</h1><br><br><br><br><br><br><br><br><br></div';
                    }
                    ?>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 margin_bottom_30"> 

                    <b><h2>Total: <?= $total ?> mxn</h2></b><br><br><br>

                    <h3>Escoja la zona de Residencia</h3>
                    <form action="factura.php" method="POST">
                        <select name="opcion">
                            <option value="mx">Mexico /com + 16% iva</option>                           
                            <option value="resto">Resto /com no iva</option>
                        </select>
                        <br><br>

                        <input type="hidden" name="total" value="<?= $total ?>">
                        <input class="btn btn-success" type="submit" value="Comprar" >
                    </form>


                    <form action="../../Controller/User/excursiones.php" method="post">
                        <input class="btn btn-primary" type="submit" value="Volver a Excusiones">
                    </form>
                    <br>

                    <br><br>

                    </form>
                    <form action="../../Controller/User/addCarrito.php" method="post">
                        <input type="hidden" name="accion" value="vaciar">
                        <input class="btn btn-danger" type="submit" value="Vaciar Carrito">
                    </form>


                </div>
            </div>


            <?php require_once '../../View/User/footer.php'; ?>

            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>    




