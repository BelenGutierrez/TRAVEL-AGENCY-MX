
<header> 
    <div class="container-fluid">
        <div class="row "> 
            <!--BOX-1 LOGO-->

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed navbar-right" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"> 
                <a class="navbar-brand" href="../../View/User/index.php" title="IslaMujeres" target="_self"><img class="img-responsive center-block img_logo_header" src="../../View/img/loga.png"  alt="Logo IslaMujeres"></a>
                <div class="pull-left">
                    <h1 class="t_sh">Isla Mujeres</h1>
                    <h3 class="t_sh">Travel Agency MX</h3>
                </div>
            </div>
            <div class="pull-right col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                <div class="pull-right visible-xs visible-sm"> 
                    <a href="../../View/User/carrito.php" title="carrito" target="_self"><img class="img-responsive padding_left_10 margin_bottom_20" src="../../View/img/carrito.png"  alt="carrito"></a>
                </div>
                <div class="clearfix"></div>
                <div class="pull-right">
                    <form action="../../Controller/index.php" method="post">
                        <input type="hidden" name="accion" value="adm">                          
                        <input class="adm"  type="submit" value="Acceder">
                    </form>
                </div>
                <div class="clearfix margin_bottom_20"></div>
                <div class="pull-right info visible-md visible-lg"> 
                    <!--SOCIAL-->
                    <a class="pull-left" href="https://www.blogger.com" target="_blank"><img class="netw" src="../../View/img/redes/blogger.png" title="Blog IslaMujeres"></a>                
                    <a class="pull-left" href="http://www.facebook.com" target="_blank"><img class="netw" src="../../View/img/redes/facebook.png" title="facebook IslaMujeres"></a>           
                    <a class="pull-left" href="https://twitter.com" target="_blank"><img class="netw" src="../../View/img/redes/twitter.png" title="twitter IslaMujeres" ></a>
                </div>
            </div>
        </div>

        <!--################# NAV ###################-->

        <div class="row">
            <nav class="navbar">                                   
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class=" nav navbar-nav"> 
                        <li class="bt"><a href="../../View/User/index.php">INICIO</a></li>
                        <li class="bt"><a href="../../View/User/hoteles.php">HOTELES</a></li>
                        <li class="bt"><a href="../../View/User/vuelos.php">VUELOS</a></li>
                        <li class="bt"><a href="../../View/User/traslados.php">TRASLADOS</a></li>
                        <li class=" dropdown bt">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">EXCURSIONES<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="bt"><a href="../../Controller/User/excursiones.php">Todas</a></li>
                            <li class="bt"><a href="../../Controller/User/novedad.php">Novedad</a></li>
                            <li class="bt"><a href="../../Controller/User/oferta.php">Oferta</a></li>
                        </ul>
                        </li>
                    </ul>
                    <ul class="pull-right nav navbar-nav"> 
                        <li class="bt"><a href="../../View/User/somos.php">SOMOS</a></li>
                        <li class="bt"><a href="../../View/User/contacto.php">CONTACTO</a></li>
                        <li class="btn"><a href="../../View/User/carrito.php" title="carrito" target="_self"><img class="img-responsive visible-md visible-lg" src="../../View/img/carrito.png"  alt="carrito"></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
