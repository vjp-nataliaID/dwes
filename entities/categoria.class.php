<?php
   namespace proyecto\entities;
   use database\IEntity;
    class Categoria implements IEntity {
        /**
         * @var int
         */
        private $id;

        /**
         * @var string
         */
        private $nombre;

        /**
         * @var int
         */
        private $numImagenes;


        /**
         * @param string $nombre
         * @param int $numImagenes
         */
         public function __construct(string $nombre='', int $numImagenes=0)
         {
            $this->nombre = $nombre;
            $this->numImagenes = $numImagenes;
         }

         public function getId() : int{
            return $this->id;
         }
         public function getNombre() : string{
            return $this->nombre;
         }
         public function getNumImagenes() : int{
            return $this->numImagenes;
         }

         /**
         * Set the value of id
         *
         * @param  int  $id
         *
         * @return  self
         */ 
        public function setId(int $id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Set the value of nombre
         *
         * @param  string  $nombre
         *
         * @return  self
         */ 
        public function setNombre(string $nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Set the value of numImagenes
         *
         * @param  int  $numImagenes
         *
         * @return  self
         */ 
        public function setNumImagenes(int $numImagenes)
        {
                $this->numImagenes = $numImagenes;

                return $this;
        }

         public function toArray(): array
         {
            return [
                'id' => $this->getId(),
                'nombre' => $this->getNombre(),
                'numImagenes' => $this->getNumImagenes()
            ];
         }

        
    }

?>