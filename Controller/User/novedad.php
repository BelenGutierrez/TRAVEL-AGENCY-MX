<?php

session_start();
//session_destroy();
require_once '../../Model/Excursion.php';

$excursiones = Excursion::getNovedades();
$_SESSION['excursiones'] = $excursiones ;

include '../../View/User/novedad.php';

