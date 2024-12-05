<?php

    class Router{
        private $routes;

        public function define(array $tablaRutas):void{
            $this->routes = $tablaRutas;
        }


        public function direct(string $uri):string{
            if(array_key_exists($uri,$this->routes)){
                return $this->routes[$uri];
            }else{
                throw new NotFoundException('No se ha definido una ruta para la uri solicitada');
            }
        }
    }

?>