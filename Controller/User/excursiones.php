<?php

session_start();
//session_destroy();
require_once '../../Model/Excursion.php';

$excursiones = Excursion::getExcursiones();
$_SESSION['excursiones'] = $excursiones ;

include '../../View/User/excursiones.php';


