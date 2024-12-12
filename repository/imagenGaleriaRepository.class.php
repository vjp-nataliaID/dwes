<?php

namespace proyecto\repository;
use proyecto\entities\QueryBuilder;
use proyecto\entities\Categoria;
use proyecto\entities\ImagenGaleria;
    class ImagenGaleriaRepository extends Querybuilder{

        public function __construct(string $table='imagenes', string $classEntity='ImagenGaleria')
        {
            parent::__construct($table, $classEntity);
        }

        public function getCategoria(ImagenGaleria $imagenGaleria) : Categoria{
            $categoriaRepository = new CategoriaRepository();
            return $categoriaRepository->find($imagenGaleria->getCategoria());

            
        }

        public function guarda(ImagenGaleria $imagenGaleria){

            $fnGuardaImagen = function () use ($imagenGaleria){

                $categoria = $this->getCategoria($imagenGaleria);
                $categoriaRepository = new CategoriaRepository();
                $categoriaRepository->nuevaImagen($categoria);

                $this->save($imagenGaleria); 

            };
            $this->executeTransaction($fnGuardaImagen);
        }
    }

?>