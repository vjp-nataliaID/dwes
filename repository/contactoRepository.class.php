<?php 
require_once 'entities/queryBuilder.class.php';


class ContactoRepository extends Querybuilder{

    public function __construct(string $table='mensajes', string $classEntity='Contacto')
    {
        parent::__construct($table, $classEntity);
    }
}

?>