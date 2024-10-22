<?php
    class imagenGaleria {
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownloads;


        public function __construct(string $nombre, string $descripcion,int $numVisualizaciones=0, int $numLikes=0, int $numDownloads=0 )
        {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numVisualizaciones = $numVisualizaciones;
            $this->numLikes = $numLikes;
            $this->numDownloads = $numDownloads;
            
        }


        public function getNombre(): string{
            return $this->nombre;
        }

        public function setNombre(string $nombre):void{
            $this->nombre = $nombre;
        }

        public function getDescripcion(): string{
            return $this->descripcion;
        }
        public function setDescripcion(string $descripcion):void{
            $this->nombre = $descripcion;
        }

        
    }

?>