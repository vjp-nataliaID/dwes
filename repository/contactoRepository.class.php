<?php 
namespace proyecto\repository;
use proyecto\entities\QueryBuilder;
use proyecto\entities\Contacto;
class ContactoRepository extends Querybuilder{

    public function __construct(string $table='mensajes', string $classEntity=Contacto::class)
    {
        parent::__construct($table, $classEntity);
    }
}

?>