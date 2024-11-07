

<?php
    require_once 'entities/dabase/IEntity.class.php';
class ImagenGaleria implements IEntity{
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDescargas;
        private $id;  

        const RUTA_IMAGENES_PORTFOLIO ='images/index/portfolio/';
        const RUTA_IMAGENES_GALLERY='images/index/gallery/';

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

        public function getNumDescargas()
        {
                return $this->numDescargas;
        }
 
        public function setNumD($numDescargas)
        {
                $this->numDescargas = $numDescargas;

                return $this;
        }
        public function toArray() : array {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'descripcion' => $this->getDescripcion(),
                'numVisualizaciones' => $this->getNumVisualizaciones(),
                'numLikes' => $this->getNumLikes(),
                'numDownloads' => $this->getNumDescargas(),

            
            ];


        }

        public function getUrlPortfolio():string{
            return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
        }
        public function getUrlGallery() : string {
            return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
        }

      
      public function getId()
      {
            return $this->id;
      }

      /**
       * Set the value of id
       *
       * @return  self
       */ 
      public function setId($id)
      {
            $this->id = $id;

            return $this;
      }
    }

?>