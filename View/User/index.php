<?php
session_start();
session_destroy();
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
            <div class="row container bg">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Carousel-->
                    <!-- =================================== -->
                    <div id="myCarousel2" class="carousel slide carousel-fade margin_bottom_20">                  
                        <div class="carousel-inner carousel_2 ">
                            <div class="item active"><a class="box-photo_2 img-box_carousel_2 thumbnail" href="#" target="_self" style="background-image: url(../../View/img/carousel_portada/galeria1.jpg);"></a></div>
                            <div class="item"><a class="box-photo_2 img-box_carousel_2 thumbnail" href="#" target="_self" style="background-image: url(../../View/img/carousel_portada/galeria2.jpg);"></a></div>                
                            <div class="item"><a class="box-photo_2 img-box_carousel_2 thumbnail" href="#" target="_self" style="background-image: url(../../View/img/carousel_portada/galeria3.jpg);"></a></div>
                            <div class="item"><a class="box-photo_2 img-box_carousel_2 thumbnail" href="#" target="_self" style="background-image: url(../../View/img/carousel_portada/galeria4.jpg);" alt=""></a></div>
                            <div class="item"><a class="box-photo_2 img-box_carousel_2 thumbnail" href="#" target="_self" style="background-image: url(../../View/img/carousel_portada/galeria5.jpg);"></a></div>
                            <div class="item"><a class="box-photo_2 img-box_carousel_2 thumbnail" href="#" target="_self" style="background-image: url(../../View/img/carousel_portada/galeria6.jpg);"></a></div>
                            <div class="item"><a class="box-photo_2 img-box_carousel_2 thumbnail" href="#" target="_parent" style="background-image: url(../../View/img/carousel_portada/galeria7.jpg);"></a></div>
                        </div>
                        <!-- Indicators -->
                        <a class="left carousel-control" href="#myCarousel2" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#myCarousel2" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel2" data-slide-to="1"></li>
                            <li data-target="#myCarousel2" data-slide-to="2"></li>
                            <li data-target="#myCarousel2" data-slide-to="3"></li>
                            <li data-target="#myCarousel2" data-slide-to="4"></li>
                            <li data-target="#myCarousel2" data-slide-to="5"></li>
                            <li data-target="#myCarousel2" data-slide-to="6"></li>
                        </ol>                                                                 
                    </div><!-- End Carousel --> 

                    

                </div>     
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="box-photo_2 img-box_carousel_3  empty_3">
                        <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2 margin_top_50 margin_bottom_30">
                            <div>
                                <a class="box-photo_2 img-box_hotel " href="http://www.nautibeachcondos.com" target="_blank" style="background-image: url(../../View/img/hotel/hot1.jpg);"></a>
                            </div>    
                            <div class="col-xs-12 col-sm-12 col-md-12 under_img_offer margin_bottom_30">
                                <a href="http://www.nautibeachcondos.com" target="_blank"><h2>Nautibeach</h2></a>
                                <br>
                                <span class="pull-right"><h3>desde 3900 mxn</h3></span>                           
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 margin_top_50">
                            <div>
                                <a class="box-photo_2 img-box_hotel " href="http://www.nautibeachcondos.com" target="_blank" style="background-image: url(../../View/img/hotel/hot2.jpg);"></a>
                            </div>  
                            <div class="col-xs-12 col-sm-12 col-md-12 under_img_offer ">
                                <a href="http://www.privilegehotels.com/es" target="_blank"><h2>Privilege Aluxes</h2></a>
                                <br>
                                <span class="pull-right"><h3>desde 4000 mxn</h3></span>                           
                            </div>
                            <div class="clearfix "></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">             
                    <div class="empty_4"></div>
                </div>
            </div> 
            <?php require_once './footer.php'; ?>
            <script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="../../View/js/jquery-3.2.0.min.js"></script>
            <script src="../../View/js/bootstrap.min.js"></script>
        </div> 
        <script>
            $('#myCarousel2').carousel({
                interval: 5000
            });
        </script>
    </body>
</html>
