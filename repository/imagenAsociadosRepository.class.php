<?php 
require_once 'entities/queryBuilder.class.php';


class ImagenAsociadoRepository extends Querybuilder{

    public function __construct(string $table='asociados', string $classEntity='Asociado')
    {
        parent::__construct($table, $classEntity);
    }
}

?>