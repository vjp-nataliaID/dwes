<?php 
require_once 'entities/QueryBuilder.class.php';


class ImagenAsociadoRepository extends Querybuilder{

    public function __construct(string $table='asociados', string $classEntity='Asociado')
    {
        parent::__construct($table, $classEntity);
    }
}

?>