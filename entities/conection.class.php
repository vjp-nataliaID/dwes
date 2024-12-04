<?php
require_once '../app/config.php';
require_once '../entities/app.class.php';
    class Connection{
        public static function make(){
            //Creamos la conexion a partir del fichero de configuración
            try{
                $config = App::get('config')['database'];
                $connection = new PDO(
                    $config['connection'] . ';dbname=' . $config['name'],
                    $config['username'],
                    $config['password'], 
                    $config['options']
                );
            }catch(PDOException $PDOException){
                throw new AppException('No se ha podido crear la conexión a la BD');
            }
        return $connection;
        }
    }

?>