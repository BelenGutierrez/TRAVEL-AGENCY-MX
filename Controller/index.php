<?php

session_start();
require_once '../Model/Excursion.php';
require_once '../Model/Usuario.php';


if (isset($_SESSION['logueado'])) {
    $usuario = unserialize($_SESSION['logueado']);
    
    if ($_REQUEST["accion"] == "cerrarsesion") {
        session_destroy();
        header("Location: index.php");
    }
    else  {
        header("Location: ../Controller/Admin/index.php");
//         
    }
} else {
    if ($_REQUEST["accion"] == 'adm') {
        header("Location: ../View/User/login.php");
    } else {
        header("Location: ../View/User/index.php");
    }
}
