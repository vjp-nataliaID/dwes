<?php
    class Router{
        private $routes;

        public function __construct()
        {
            $this->routes = [
                'GET' => [],
                'POST' => []
            ];
        }

        public function get(string $uri, string $controller):void{
            $this->routes['GET'][$uri] = $controller;
        }
        public function post(string $uri, string $controller):void{
            $this->routes['POST'][$uri] = $controller;
        }

        public static function load(string $file):Router{
            $router = new Router();
            require $file;
            return $router;
        }


        public function define(array $tablaRutas) : void {
            $this->routes = $tablaRutas;
        }


        public function direct(string $uri, string $method){
            if(array_key_exists($uri, $this->routes[$method])){
                return $this->routes[$method][$uri];
            }else{
                throw new Exception("NO se ha definido la uri solicitada");
            }
        }

        public function redirect(string $path){
            header('location: /'.$path);
        }
    }

?>