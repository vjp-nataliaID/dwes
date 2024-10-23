<?php
    class ImagenGaleria {
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownloads;

        const RUTA_IMAGENES_PORTFOLIO ='images/index/portfolio/';
        const RUTA_IMAGENES_GALLERY='images/index/gallery/';

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
        public function getNumVisualizaciones()
        {
                return $this->numVisualizaciones;
        }
 
        public function setNumVisualizaciones($numVisualizaciones)
        {
                $this->numVisualizaciones = $numVisualizaciones;

                return $this;
        }

        public function getNumLikes()
        {
                return $this->numLikes;
        }

     
        public function setNumLikes($numLikes)
        {
                $this->numLikes = $numLikes;

                return $this;
        }

        public function getNumDownloads()
        {
                return $this->numDownloads;
        }
 
        public function setNumDownloads($numDownloads)
        {
                $this->numDownloads = $numDownloads;

                return $this;
        }


        public function getUrlPortfolio():string{
            return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
        }
        public function getUrlGallery() : string {
            return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
        }
    }

?>