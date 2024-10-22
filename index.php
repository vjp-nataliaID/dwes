<?php

    require 'utils/utils.php';
    require 'entities/imagenGaleria.class.php';
    
    $arrayImagenes = array();
    function crearImagenes(){
        for($i=1; $i<=12; $i++){
           $imagen = new ImagenGaleria(`{$i}.jpg`,`descrion imagen {$i}`,numAleatorio(),numAleatorio(),numAleatorio());
            array_unshift($arrayImagenes, $imagen);
            
        }
    }
    function numAleatorio() : int {
        return round(0,1500);
    }
    require 'views/index.view.php';
?>