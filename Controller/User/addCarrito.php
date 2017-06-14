<?php

session_start();
require_once '../../Model/Excursion.php';

$excursiones = Excursion::getExcursiones();
$_SESSION['excursiones'] = $excursiones ;


if (isset($_REQUEST['codigo'])) {
    $codigo = $_REQUEST['codigo'];
}


if (!isset($_SESSION['carrito'])) {
    foreach ($_SESSION['excursiones'] as $articulo) {
        $_SESSION['carrito'][$articulo->getCodigo()] = 0;
    }
}


if (isset($_REQUEST['accion'])) {
    $accion = $_REQUEST['accion'];

    if ($accion == "comprar") {
        $_SESSION['carrito'][$codigo] ++;
    }


    if ($accion == "eliminar") {
        $_SESSION['carrito'][$codigo] = 0;
    }


    if ($accion == "vaciar") {

        foreach ($_SESSION['excursiones'] as $articulo) {
            $_SESSION['carrito'][$articulo->getCodigo()] = 0;
            session_destroy();
        }
    }

    if ($accion == "finalizar") {

        foreach ($_SESSION['excursiones'] as $articulo) {
            $_SESSION['carrito'][$articulo->getCodigo()] = 0;
            session_destroy();
        }
    }
}


header("Location: ../../Controller/User/excursiones.php");

