<?php

    namespace proyecto\repository;
    class MyLog{
        private $log;

        public function __construct(string $filename)
        {
            $this->log = new Logger('name');
            $this->log->pushHandler(
                new StreamHandler($filename, Logger::Info));            
        }

        public static function load(string $filename):MyLog{
        
            return new MyLog($filename);
        
        }

        public function add(string $message):void{
            $this->log->info($message);
        }

    }

?>