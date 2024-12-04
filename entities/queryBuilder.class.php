<?php
require_once '../exceptions/queryException.class.php';
require_once '../entities/app.class.php';
require_once '../entities/imagenGaleria.class.php';
require_once '../entities/categoria.class.php';

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
       
        return $this->executeQuery($sql);
    }
    public function executeQuery(string $sql) : array{
        $pdoStatement = $this->connection->prepare($sql);

        if($pdoStatement->execute() === false){
            throw new QueryException("No se h podido ejecutar la consulta");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }
    public function save(IEntity $entity) : void{
        try{

            $parameters = $entity->toArray();

            $sql = sprintf('insert into %s (%s) values (%s)',$this->table, implode(', ',
            array_keys($parameters)),
            ':' . implode(',:', array_keys($parameters)));

            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);

        }
        catch(PDOException $exception){
            throw new QueryException('Error al insertar en la BD');
        }

    }
    public function find(int $id) : IEntity {
        $sql = "SELECT * FROM $this->table WHERE id=$id";
        $result = $this->executeQuery($sql);
        if(empty($result)){
            throw new NotFoundException("No se ha encontrado ningun elemento con id $id");
        }
        return $result[0];
    }

    public function executeTransaction(callable $fnExecuteQuerys){
        try{
            $this->connection->beginTransaction();
            $fnExecuteQuerys();
            $this->connection->commit();

        }catch(PDOException $pdoException){
            $this->connection->rollBack();
            throw new QueryException("No se ha podido realizar la operacion");
        }
    }

    public function update(IEntity $entity) : void{

        try{
            $parameters = $entity->toArray();
            $sql = sprintf('UPDATE %s SET %s WHERE id=:id', $this->table, $this->getUpdates($parameters));
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);

        }catch(PDOException $pdoException){
            throw new QueryException("Error al actualizar");
        }
       
    }

    private function getUpdates(array $parameters){
        $updates = '';
        foreach($parameters as $key => $value){
            if($key !== 'id'){
                if($updates !== ''){
                    $updates .= ', ';
                }
                $updates.=$key . '=:' . $key;
            }
        }
        return $updates;
    }
}