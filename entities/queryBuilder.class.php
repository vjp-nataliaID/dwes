<?php
require_once 'exceptions/queryException.class.php';

class QueryBuilder{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;    
    }

    public function findAll (string $table, string $classEntity) : array{
        $sql = "SELECT * FROM $table";
        //El método prepare devuelve un objeto PDO
        $pdoStatement = $this->connection->prepare($sql);

        if($pdoStatement->execute() === false){
            throw new QueryException("No se ha podido ejecutar la consulta");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$classEntity);
    }
}