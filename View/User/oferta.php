
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
                <ul class="redes">
                    <li><a href="https://www.blogger.com" target="_blank" role="button"><span id="elem1"></span></a></li>
                    <li><a href="https://www.skype.com/es" target="_blank" role="button"><span id="elem2"></span></a></li>
                    <li><a href="https://web.whatsapp.com" target="_blank" role="button"><span id="elem3"></span></a></li>
                    <li><a href="http://www.facebook.com" target="_blank" role="button"><span id="elem4"></span></a></li>
                </ul>

                  <div class="col-xs-12 col-sm-12 col-md-12">             
                    <div class="row">
                        <div class="back_title_3 title_white text-center margin_bottom_100 t_sh">Ofertas <h3>Aprovechalas</h3></div>
                    </div>

                   <?php
                    $clear = 0;
                    foreach ($_SESSION['excursiones'] as $articulo) {
                        ?>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 margin_bottom_30 margin_top_20 padding_40">
                            <a class="box-photo img_best" href="" style="background-image:url(../../View/img/excursion/<?= $articulo->getImagen() ?>);"></a>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12 under_img">
                                <h1 class="t_sh"><?= $articulo->getNombre() ?></h1>
                                <span class="subtitle_white"><?= $articulo->getDetalle() ?></span><br><br>
                                <span class="pull-right title_orange">Precio: <?= $articulo->getPrecio() ?> mxn</span>
                            </div>
                        </div>
                        <?php
                        if ($clear % 2 != 0) {
                            echo '<div class="clearfix"></div>';
                        }
                        $clear++;
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
            
            

                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  


                             
                              
