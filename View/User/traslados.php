
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../View/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../View/css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body class=" body_blue_2">

        <!--########## CONTAINER #################-->
        <div class="container principal">
            <!--############ HEADER ############-->
            <?php require_once './header.php'; ?>
            <!--########### MAIN #############-->
            <ul class="redes">
                <li><a href="https://www.blogger.com" target="_blank" role="button"><span id="elem1"></span></a></li>
                <li><a href="https://www.skype.com/es" target="_blank" role="button"><span id="elem2"></span></a></li>
                <li><a href="https://web.whatsapp.com" target="_blank" role="button"><span id="elem3"></span></a></li>
                <li><a href="http://www.facebook.com" target="_blank" role="button"><span id="elem4"></span></a></li>
            </ul>
            <div class="row  bg">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">             
                    <div class="back_title_3 title_white text-center margin_bottom_30 t_sh">Traslados</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">             
                    <canvas id="lienzo" width="400" height="50">
                        Su navegador no soporta el elemento canvas
                    </canvas>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right">
                        <div>
                        <a href="https://www.ultramarferry.com" target="_blank"><img class="img-responsive center-block" src="../img/traslado/precio.jpg" ></a>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right ">
                        <div>
                        <a href="https://www.ultramarferry.com" target="_blank"><img class="img-responsive margin_top_20 margin_bottom_10" src="../img/traslado/barco2.jpg" ></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once './footer.php'; ?>
            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>
            <script src="../../View/js/canvas.js"></script>
        </div> 
        <script>
            $('#myCarousel2').carousel({
                interval: 8000
            });
        </script>
        <script>
            function iniciar() {
                var elemento = document.getElementById('lienzo');
                lienzo = elemento.getContext('2d');
                lienzo.font = "bold 24px verdana, sans-serif";
                lienzo.textAlign = "start";
                lienzo.fillText("OFERTA ONLINE", 100, 20);
            }
            window.addEventListener("load", iniciar, false);

        </script>
    </body>
</html>
