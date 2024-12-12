<?php 
namespace proyecto\repository;
use proyecto\entities\QueryBuilder;

class ImagenAsociadoRepository extends Querybuilder{

    public function __construct(string $table='asociados', string $classEntity='Asociado')
    {
        parent::__construct($table, $classEntity);
    }
}

?>