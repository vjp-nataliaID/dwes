<?php
    namespace proyecto\entities;
    use proyecto\entities\Connection;
    use proyecto\exceptions\AppException;

    class App{
        private static $container=[];
    
        /**
         * @param $clave
         * @param $valor
         * Recibe tanto la clave donde almacenar el objeto como el propio objeto
         */
        public static function bind($clave, $valor){
            static::$container[$clave] = $valor;
        }

        /**
         * @param string $key
         * @return mixed
         * @throws AppException
         */
        public static function get(string $key){
            //Si existe el elemento lo devuelve sino lanza excepción
            if(!array_key_exists($key,static::$container)){
                throw new AppException("No se ha encontrado la clave en el contenedor");
            }
            return static::$container[$key];
        }
        public static function getConnection(){
            if(!array_key_exists('connection',static::$container)){
                static::$container['connection'] = Connection::make();
            }
            return static::$container['connection'];
        }
    }

?>