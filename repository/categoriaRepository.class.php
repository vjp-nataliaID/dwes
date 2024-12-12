<?php

namespace proyecto\repository;
use proyecto\entities\QueryBuilder;
use proyecto\entities\Categoria;
    class CategoriaRepository extends QueryBuilder {

        public function __construct(string $table='categorias', string $classEntity='Categoria'){

           parent::__construct($table, $classEntity); 
        }

        public function nuevaImagen(Categoria $categoria){
            $categoria->setNumImagenes($categoria->getNumImagenes()+1);
            $this->update($categoria);
        }
        
        
    }

?>