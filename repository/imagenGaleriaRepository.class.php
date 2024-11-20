<?php

    require_once 'entities/queryBuilder.class.php';

    class ImagenGaleriaRepository extends Querybuilder{
        public function __construct(string $table='imagenes', string $classEntity='ImagenGaleria')
        {
            parent::__construct($table, $classEntity);
        }
    }

?>