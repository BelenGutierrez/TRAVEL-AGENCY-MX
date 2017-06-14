<!DOCTYPE html>

<html>
    <head>
        <title>TagTravelling.com - Contacto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../../View/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../View/css/style.css" rel="stylesheet">
    </head>
    <body class="fondo">	
        <!--########## CONTAINER #################-->
        <div class="container principal">
            <!--############ HEADER ############-->
            <?php require_once './header.php'; ?>
            <!--########### MAIN #############-->
            <div class=" container-fluid empty"></div>
             <div class=" container-fluid empty_2 "></div>
            <div class="row container-fluid body_blue_2">    
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 margin_bottom_30">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 registry2">
                        <h1>Información</h1>
                        <h2>Dirección: Avda. Punta Nizuc, Cancún México</h2>
                        <h2>Email: info@islamujeres.com</h2>
                        <h2>Teléfono: 002 00 00 00</h2>
                        <h2>Horario: Lunes a Sábado de 09:30 a 13:30 y de 16:00 a 19:30</h2>
                        <hr><br>
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin_bottom_30">
                        <h1>Mapa Localización</h1>
                        <iframe class="map embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d929.5899947981825!2d-86.75162150420029!3d21.257213685547633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4c30033a9e036d%3A0x76a169722381f110!2sAv+Rueda+Medina+%26+Adolfo+L%C3%B3pez+Mateos%2C+Centro+-+Supmza.+001%2C+Isla+Mujeres%2C+Q.R.%2C+M%C3%A9xico!5e0!3m2!1ses!2ses!4v1496913663158" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="registry2">
                        <h3>Póngase en contacto con nosotros</h3><br>
                        <form name="contacto" action="contacto.php" method="post">
                            <div class="form-group">
                                <label class="small_white" for="name">Nombre: *</label>
                                <input type="text" class="form-control" id="name_contacto" required="" autofocus="" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label class="small_white" for="apellidos">Apellidos: *</label>
                                <input type="text" class="form-control" id="apellidos_contacto" required="" placeholder="Apellidos">
                            </div>
                            <div class="form-group">
                                <label class="small_white" for="telefono">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono_contacto" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label class="small_white" for="email">Email: *</label>
                                <input type="email" class="form-control" id="email_contacto" required="" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label class="small_white" for="obs">Díganos cual es su consulta:</label>
                                <textarea class="form-control" id="obs_comentarios" cols="20" rows="5" placeholder="Escriba aquí sus comentarios"></textarea>
                            </div>
                            <button type="submit" class="btn_send"><h4>Enviar</h4></button>
                        </form>
                    </div>
                </div>
            </div>
            <!--######### FOOTER #########*-->  
            <?php require_once './footer.php'; ?>
            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>

