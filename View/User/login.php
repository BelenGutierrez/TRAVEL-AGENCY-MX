<?php
//ini_set('error_reporting', 0);
//session_start();
//require_once "../../Model/Usuario.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../View/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../View/css/style.css" rel="stylesheet" type="text/css" />
        
        <title></title>
    </head>
    <body class="body_blue_2">
        <!--########## CONTAINER #################-->
        <div class="container principal">
    
            <?php require_once './header.php'; ?>
            
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
                    <div class="registry">
                        <div <span class="title_orange">Acceso zona privada</span><br>                                                              
                            
                            <span class="small_grey">Por favor introduzca los datos para acceder</span>
                        </div>
                        <form class="margin_bottom_20" name="email" action="../../Controller/Admin/login.php" method="post">
                            <div class="form-group">
                                <label for="email">Usuario</label>
                                <input type="text" name="usuario" class="form-control" required="" autofocus="" placeholder="Usuario">
                            </div>
                            <label for="password">Password</label>
                            <input type="password" name="password" required="" class="form-control" placeholder="Password">
                            <input class="btn btn-primary"type="submit" value="OK">
                        </form>                           
                        <div class="politic">
                            <input type="checkbox" checked="checked"><span class="small_white">Acepto</span> 
                            <span class="small_red"><a href="#">política</a></span>

                        </div>
                    </div>
                </div>
            </div>
            <?php require_once './footer.php'; ?>
            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>
           
        </div>
    </body>
</html>
