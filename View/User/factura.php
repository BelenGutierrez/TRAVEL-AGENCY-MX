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
            <div class="row container">

                <div class="col-xs-12 col-sm-12 col-md-12 bg_blue">             
                    <div class="row">
                        <div class="back_title_3 title_white text-center margin_bottom_30 t_sh">Gracias por su compra !!
                            <h3>Detalles de la compra</h3><hr></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 subtitle_white text-center margin_bottom_30">  
                        <form action="../../Controller/User/addCarrito.php" method="post">
                            <input type="hidden" name="accion" value="vaciar">
                            <input class="btn btn-default" type="submit" value="Salir">
                        </form>
                        <br><br><br>
                        <?php
                        $total = $_POST['total'];
                        $ivaCom = 0;
                        $descuento = 0;
                        ?>
                        <div class="table-responsive">
                            <table  class="table table-condensed">    
                                <tr><th colspan="2">ISLA MUJERES TRAVEL AGENCY</th></tr>
                                <tr><th>DOMICILIO: Isla Mujeres</th><td>FECHA: 13/06/2017</td></tr>
                                <tr><th>FACTURA Nº 20170613A</th><td></td></tr>
                                <tr><td colspan="2"></td></tr>
                                <tr><th>SUBTOTAL</th><td><?= $total ?> mxn</td></tr>
                                <tr><th>DESCUENTO</th><td><?php
                                        if ($total >= 20000) {
                                            echo $descuento = $total * 5 / 100 . " mxn";
                                        } else {
                                            echo $descuento . " mxn";
                                        }
                                        ?>
                                    </td></tr>
                                <tr><td colspan="2"></td></tr>
                                <tr><th>NETO</th><td><?= $neto = $total - $descuento ?> mxn</td></tr>
                                <tr><th>IVA 16%</th><td><?= $iva = $neto * 16 / 100 ?> mxn</td></tr>
                                <tr><th>COMISION</th><td><?= $comision = $total * 10 / 100 + $ivaCom ?> mxn</td></tr>
                                <tr><th>COM IVA</th><td><?php
                                        switch ($_POST['opcion']) {
                                            case "mx" :
                                                $ivaCom = 16;
                                                break;
                                            case "resto" :
                                                $ivaCom = 0;
                                                break;
                                            default :
                                                break;
                                        }
                                        echo $ivaCom = $comision * $ivaCom / 100 . " mxn";
                                        ?></td></tr>
                                <tr><th>TOTAL</th><td><?= $totalApagar = $neto + $iva + $comision + $ivaCom ?> mxn</td></tr>
                            </table><br>

                        </div>
                    </div>
                </div>
            </div>

            <?php require_once '../../View/User/footer.php'; ?>

            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>

        </div>
    </body>
</html>    

