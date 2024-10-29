<?php

    require 'entities/imagenGaleria.class.php';
    
    
    $arrayImagenes = array();
    for($i=1; $i<=12; $i++){
        $arrayImagenes[] = new ImagenGaleria($i.'.jpg',"descripcion imagen".$i,numAleatorio(),numAleatorio(),numAleatorio());
    }
    function numAleatorio() : int {
        return rand(0,1500);
    }
    require 'utils/utils.php';
    require 'views/index.view.php';
?>