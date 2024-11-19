<?php
require_once 'utils/utils.php';
require_once 'entities/imagenGaleria.class.php';
require_once 'entities/asociado.class.php';

$arrayImagenes = array();
$arrayAsociados = array();
for ($i = 1; $i <= 12; $i++) {
    array_unshift($arrayImagenes, new ImagenGaleria("$i.jpg", "descripcion imagen $i", numAleatorio(), numAleatorio(), numAleatorio()));
}

function numAleatorio(): int
{
    return rand(0, 1500);
}



// Crear algunos asociados
$arrayAsociados[] = new Asociado("Asociado 1","log1.jpg", "Asociado 1");
$arrayAsociados[] = new Asociado("Asociado 2","log2.jpg" , "Asociado 2");
$arrayAsociados[] = new Asociado("Asociado 3","log3.jpg", "Asociado 3");
$arrayAsociados[] = new Asociado("Asociado 4","log1.jpg", "Asociado 4");
$arrayAsociados[] = new Asociado("Asociado 5","log3.jpg", "Asociado 5");

// Seleccionar asociados a mostrar
if (count($arrayAsociados) > 3) {
    $asociadosAMostrar = obtenerTresAleatorios($arrayAsociados);
} else {
    $asociadosAMostrar = $arrayAsociados;
}
require 'views/index.view.php';
