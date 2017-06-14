<?php

require_once '../../Model/Excursion.php';

switch ($_REQUEST['accion']) {
    case 'listado':
        $respuesta = Excursion::getExcursiones();
        break;
    case 'insertar':
        $datos = [
            "codigo" => $_REQUEST['codigo'],
            "categoria" => $_REQUEST['categoria'],
            "nombre" => $_REQUEST['nombre'],
            "precio" => $_REQUEST['precio'],
            "imagen" => $_REQUEST['imagen'],
            "oferta" => $_REQUEST['oferta'],
            "novedad" => $_REQUEST['novedad'],
            "detalle" => $_REQUEST['detalle'],
            "fecha_publicacion" => $_REQUEST['fecha_publicacion'],
        ];
        // CONCATENAR HORA A LA FECHA ACTUAL ANTES DE MANDARLA
        //$datos['fecha_publicacion'] = $datos['fecha_publicacion'] . ' ';
        // INSERTA UNA EXCURSION //
        Excursion::insertExcursion($datos);

        // LISTADO CON LOS DATOS ACTUALIZADOS //
        $respuesta = Excursion::getExcursiones();
        break;
    case 'eliminar':
        Excursion::deleteExcursion($_REQUEST['codigo']);
        $respuesta = Excursion::getExcursiones();
        break;
    case 'actualizar':
        $datos = [
            "codigo" => $_REQUEST['codigo'],
            "categoria" => $_REQUEST['categoria'],
            "nombre" => $_REQUEST['nombre'],
            "precio" => $_REQUEST['precio'],
            "imagen" => $_REQUEST['imagen'],
            "oferta" => $_REQUEST['oferta'],
            "novedad" => $_REQUEST['novedad'],
            "detalle" => $_REQUEST['detalle'],
            "fecha_publicacion" => $_REQUEST['fecha_publicacion'],
        ];
        $codigoAntiguo = $_REQUEST['codigoAntiguo'];
        Excursion::updateExcursion($datos, $codigoAntiguo);
        $respuesta = Excursion::getExcursiones();
        break;
    case 'detalleExcursion':
        $respuesta = Excursion::getExcursionById($_REQUEST['codigo']);
        break;
    case 'ordenaExcursiones':
        if (filter_var($_REQUEST['orden'], FILTER_VALIDATE_BOOLEAN)) {
            $respuesta = Excursion::getExcursionesOrdenadas($_REQUEST['columna'], "ASC");
        } else {
            $respuesta = Excursion::getExcursionesOrdenadas($_REQUEST['columna'], "DESC");
        }
        break;
    case 'validar':

        // EXTRAER EXCURSIÓN CON ID RECOGIDA
        $excursion = Excursion::getExcursionByID($_REQUEST['codigo']);

        // SI EXISTE Y SU CÓDIGO COINCIDE CON EL CÓDIGO RECOGIDO 
        if ($excursion->getCodigo() == $_REQUEST['codigo']) {
            // ENVIAMOS UN FALSE PARA INDICAR QUE ÉSTE USUARIO EXISTE Y POR TANTO NO SE PUEDE UTILIZAR
            $resultado = "false";
        } else {
            $resultado = "true";
        }
        echo $resultado;
        break;
    case 'filtrarCategoria':
        $respuesta = Excursion::getExcursionesCompletaByCategoria($_REQUEST['categoria']);
        break;
}

if (isset($respuesta)) {
    echo json_encode($respuesta, JSON_PRETTY_PRINT);
}
