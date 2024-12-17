<?php 
namespace proyecto\repository;
use proyecto\entities\QueryBuilder;
use proyecto\entities\Asociado;
class ImagenAsociadoRepository extends Querybuilder{

    public function __construct(string $table='asociados', string $classEntity= Asociado::class)
    {
        parent::__construct($table, $classEntity);
    }
}

?>