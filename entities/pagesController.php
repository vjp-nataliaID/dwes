<?php

namespace proyecto\entities;

use proyecto\repository\CategoriaRepository;
use proyecto\repository\ImagenGaleriaRepository;

class PagesController{


    public function index(){
        $imagenRepositorio = new ImagenGaleriaRepository();
        $imagenes = $imagenRepositorio->findAll();
        $categoriaRepositorio = new CategoriaRepository();
        $categorias = $categoriaRepositorio->findAll();
        require_once '../views/index.view.php';
    }
}

?>