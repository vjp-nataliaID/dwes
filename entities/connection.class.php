<?php
    require_once 'entities/app.class.php';
    class Connection{
        public static function make(){
            try{
                $config = App::get('config')['database'];
                $connection = new PDO(
                    $config['conection'].';dbname='.$config['name'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );

           

            }catch(PDOException $PDOException){
               throw new AppException(getErrorString(ERROR_CON_BD));

            }
            return $connection;
        }
    }

?>