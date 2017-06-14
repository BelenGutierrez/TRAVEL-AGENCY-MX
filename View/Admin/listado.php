<?php
ini_set('error_reporting', 0);

session_start();
require_once '../../Model/Excursion.php';
if (!isset($_SESSION['logueado'])) {

    header("Location: ../View/login.php");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../../View/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../View/css/style.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="../js/ui-lightness/jquery-ui-1.10.3.custom.css">

        <script src="../../View/js/jquery-2.1.3.min.js"></script>
        <script src="../../View/js/jquery-ui-1.10.3.custom.js"></script>

        <script src="../../View/js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
        <script src="../../View/js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        <link rel="stylesheet" href="../../View/js/jquery-ui-1.12.1.custom/jquery-ui.css">
        <script src="../../View/js/jquery-validation-1.15.0/dist/jquery.validate.min.js"></script>
        <script src="../../View/js/ajax.js"></script>
        <title>index</title>


    </head>
    <body class="body_blue">
        <div class="container principal">
            <header> 
                <div class="row"> 
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">  
                        <a class="navbar-brand" href="#" title="IslaMujeres" target="_self"><img class="img-responsive center-block img_logo_header" src="../../View/img/loga.png"  alt="Logo IslaMujeres"></a>
                        <div class="pull-left">
                            <h1 class="t_sh">Isla Mujeres</h1>
                            <h3 class="t_sh">Travel Agency MX</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
                        <div class="text-center">
                            <h3 class="">Dashboard Excursiones</h3>
                            <form action="../../Controller/index.php" method="post">
                                <input type="hidden" name="accion" value="cerrarsesion">                        
                                <input class="detalle adm"  type="submit" value="Cerrar Sesion">
                            </form>
                        </div>
                    </div>
                    <div class="clearfix margin_bottom_20"></div>
                </div>
            </header>

            <div class="row container ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!--<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">-->
                    <select id="selectorNElementos">
                        <option value="1">1 filas</option>
                        <option value="2">2 filas</option>
                        <option value="4">4 filas</option>
                        <option selected value="7">7 filas</option>
                    </select>
                    <button id="paginaAnterior" class="btn btn-primary">Back</button>
                    <button id="paginaSiguiente" class="btn btn-primary">Next</button>

                    <!-------AUTOCOMPLETE ------------>

                    <button type="submit" class="btn btn-success">
                        <span class='glyphicon glyphicon-search' aria-hidden='true'></span>
                    </button>
                    <input type="text" id="autocomplete">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table  class="table table-striped">    
                            <thead>
                                <tr>
                                    <th class="columna" data-column="codigo">CODIGO</th>
                                    <th class="columna" data-column="categoria">CATEGORIA</th>
                                    <th class="columna" data-column="nombre">NOMBRE</th>
                                    <th class="columna" data-column="precio">PRECIO</th>
                                    <th class="columna" data-column="imagen">IMAGEN</th>
                                    <th class="columna" data-column="oferta">OFERTA</th>
                                    <th class="columna" data-column="novedad">NOVEDAD</th>
                                    <th class="columna" data-column="detalle">DETALLE</th>
                                    <th class="columna" data-column="fecha_publicacion">FECHA_PUBLICACION</th>
                                    <th colspan="2">                            
                                        <button type="submit" id="nuevaExcursion" class="btn btn-success">
                                            <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Añadir
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>                       
                        </table>
                    </div>
                </div>
            </div>
            <br><br>
            <!--Número de excursiones: <span id="totalExcursiones"></span>-->
            <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->

            <footer>
                <div class="row footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!--BOX-1 -->         
                        <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-0 col-md-4 col-md-offset-0 col-lg-3 col-lg-offset-0 text-center margin_bottom_20">
                            <a href="#"><img class="img-responsive center-block img_logo_footer" src="../../View/img/loga.png" alt="IslaMujeres"></a>
                            <span class="small_white"><br>Isla Mujeres S.A.<br>Lic.Nº 000XX RFC XXX000000XX0</span>
                        </div>
                        <!--BOX-2 -->
                        <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-3 col-lg-offset-6 text-center margin_bottom_30">
                            <a href="#"><img class="img-responsive center-block img_logo_footer" alt="Diseño Web Agencias de Viajes" title="Diseño Páginas Agencias de Viajes" src="../../View/img/lo.png"></a>   
                            <span class="small_white">&copy;2017- Islamujeres.com</span><br>
                            <span class="small_white">Powered By Belen Gutierrez</span>        
                        </div>
                    </div>
                </div>
            </footer>


        </div>



        <!--------------------- MODAL PARA INSERTAR NUEVA EXCURSION --------------------------------------------------------------->
 
        <div id="alta" title="Nueva excursión:">
            <form id="formularioAlta" method="post" action="">
                <div class="inputFormularioAlta"><p>Codigo: </p><input id="codigoAlta" type="text" name="codigo"></div>
                <div class="inputFormularioAlta"><p>Categoria: </p><input id="categoriaAlta" type="text" name="categoria"></div>
                <div class="inputFormularioAlta"><p>Nombre: </p><input id="nombreAlta" type="text" name="nombre"></div>
                <div class="inputFormularioAlta"><p>Precio: </p><input id="preciotAlta" type="number" name="precio"></div>
                <div class="inputFormularioAlta"><p>Imagen: </p><input id="imagenAlta" type="text" name="imagen"></div>
                <div class="inputFormularioAlta"><p>Oferta: </p><input id="ofertaAlta" type="text" name="oferta"></div>
                <div class="inputFormularioAlta"><p>Novedad: </p><input id="novedadAlta" type="text" name="novedad"></div>
                <div class="inputFormularioAlta"><p>Detalle: </p><input id="detalleAlta" type="text" name="detalle"></div>
                <div class="inputFormularioAlta"><p>Fecha de Publicación: </p><input id="fechaPubliAlta" type="text" name="fecha_publicacion"></div>
            </form>
        </div>


        <!--------------------- MODAL PARA CONFIRMAR BORRADO DE LA EXCURSION ----------------------------------------------------->

        <div id="baja" title="Confirmación de borrado: ">
            <h3>¿Está seguro de que desea borrar la excusión?</h3>
        </div>


        <!--------------------- MODIFICAR UNA EXCURSION ------------------------------------------------------------------------>

        <div id="modificar" title="Modificar excursión: ">
            <form id="formularioModificacion" method="post" action="">
                <div><p>Codigo:</p><input name="codigo" id="codigoModificacion" type="text"></div>
                <div><p>Categoria:</p><input name="categoria" id="categoriaModificacion" type="text"></div>
                <div><p>Nombre:</p><input name="nombre" id="nombreModificacion" type="text"></div>
                <div><p>Precio:</p><input name="precio" id="precioModificacion" type="number"></div>
                <div><p>Imagen:</p><input name="imagen" id="imagenModificacion" type="text"></div>
                <div><p>Oferta:</p><input name="oferta" id="ofertaModificacion" type="text"></div>
                <div><p>Novedad:</p><input name="novedad" id="novedadModificacion" type="text"></div>
                <div><p>Detalle:</p><input name="detalle" id="detalleModificacion" type="text"></div>
                <div><p>Fecha de Publicación:</p><input name="fecha" id="fechaPubliModificacion" type="text"></div>
            </form>
        </div>

    </body>
</html>
