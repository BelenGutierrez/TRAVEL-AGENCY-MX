<?php

session_start();
//session_destroy();
require_once '../../Model/Excursion.php';

$excursiones = Excursion::getOfertas();
$_SESSION['excursiones'] = $excursiones ;

include '../../View/User/oferta.php';

