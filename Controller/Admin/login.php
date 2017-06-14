<?php

ini_set('error_reporting', 0);
session_start();

require_once '../../Model/Usuario.php';

if (!isset($_SESSION['logueado'])) {
    $_SESSION['logueado'] = false;
}

$usuarios = Usuario::getUsuarios();


$count = 0;
foreach ($usuarios as $usuario) {
    if ($usuario->getUsuario() == $_REQUEST['usuario'] && $usuario->getPassword() == $_REQUEST['password']) {
        $count++;
    }
}


if (isset($_REQUEST['usuario'])) {
    if ($count == 1) {
        $_SESSION['logueado'] = true;
        header("Location: ../index.php");
    } else {
        header("Location: ../../View/User/login.php");
    }
}
