<?php
require_once 'utils/utils.php';
require_once 'entities/File.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'entities/Conection.class.php';
require_once 'entities/QueryBuilder.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'repository/ImagenGaleriaRepository.class.php';
require_once 'repository/CategoriaRepository.class.php';
require_once 'entities/Categoria.class.php';

$errores = [];
$descripcion = '';
$mensaje = '';


try {


    $imagenRepository = new ImagenGaleriaRepository();
    $categoriaRepository = new CategoriaRepository();

    $descripcion = '';
    $mensaje = 'Imagen Guardada';
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} finally {
    $imagenes = $imagenRepository->findAll();
    $categorias = $categoriaRepository->findAll();
}

require_once 'views/gallery.view.php';
