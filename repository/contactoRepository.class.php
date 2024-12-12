<?php 
namespace proyecto\repository;
use proyecto\entities\QueryBuilder;

class ContactoRepository extends Querybuilder{

    public function __construct(string $table='mensajes', string $classEntity='Contacto')
    {
        parent::__construct($table, $classEntity);
    }
}

?>