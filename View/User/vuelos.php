
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
            <div class="row bg">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">             
                    <div class="back_title_3 title_white text-center margin_bottom_30 t_sh">Vuelos</div>
                </div>         
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">             
                        <audio id="player" src="../../View/audio/aplausos.mp3"></audio>
                        <div>
                            <button class="btn btn-primary" onclick="document.getElementById('player').play();">Reproducir</button>
                            <button class="btn btn-primary" onclick="document.getElementById('player').pause();">Pausa</button>
                            <button class="btn btn-primary" onclick="document.getElementById('player').volume +=
                                        0.1;">Subir Volumen</button>
                            <button class="btn btn-primary" onclick="document.getElementById('player').volume -=
                                        0.1;">Bajar Volumen</button>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                        <video autoplay loop muted width="">
                            <source src="../../View/video/nubes.mp4" type="video/mp4">
                        </video>
                    </div>          
            </div> 
            <?php require_once './footer.php'; ?>
            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>
            <script src="../../View/js/canvas.js"></script>
        </div> 

    </body>
</html>
