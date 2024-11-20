<?php
require_once 'exceptions/queryException.class.php';
require_once 'entities/app.class.php';

abstract class QueryBuilder{
    private $connection;
    private $table;
    private $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->table=$table;
        $this->connection= App::getConnection();
        $this->classEntity = $classEntity;
    }

    public function findAll () : array{
        $sql = "SELECT * FROM $this->table";
        //El método prepare devuelve un objeto PDO
        $pdoStatement = $this->connection->prepare($sql);

        if($pdoStatement->execute() === false){
            throw new QueryException("No se ha podido ejecutar la consulta");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$this->classEntity);
    }
    public function save(IEntity $entity) : void{
        try{

            $parameters = $entity->toArray();

            $sql = printf("INSERT INTO %s (%s) values (%s)",$this->table, implode(', ',
            array_keys($parameters)),
            ':' . implode(',:', array_keys($parameters)));
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);

        }
        catch(PDOException $exception){
            throw new QueryException('Error al insertar en la BD');
        }

    }

}