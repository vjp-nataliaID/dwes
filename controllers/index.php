<?php
require_once 'utils/utils.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'entities/Asociado.class.php';
require_once 'entities/App.class.php';
require_once 'repository/ImagenAsociadosRepository.class.php';
require_once 'entities/Conection.class.php';

require_once 'init.php';
$conexion  = App::get('config');

$asociadoRepository = new ImagenAsociadoRepository();
$asociados = $asociadoRepository->findAll();
// $arrayImagenes = array();

// for ($i = 1; $i <= 12; $i++) {
//     array_unshift($arrayImagenes, new ImagenGaleria("$i.jpg", "descripcion imagen $i", numAleatorio(), numAleatorio(), numAleatorio()));
// }

// function numAleatorio(): int
// {
//     return rand(0, 1500);
// }



// Seleccionar asociados a mostrar
if (count($asociados) > 3) {
    $asociadosAMostrar = obtenerTresAleatorios($asociados);
} else {
    $asociadosAMostrar = $asociados;
}
require 'views/index.view.php';
