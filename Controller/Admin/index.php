<?php
  require_once '../../Model/Excursion.php';
  $data['excursiones'] = Excursion::getExcursiones();
  include '../../View/Admin/listado.php';
