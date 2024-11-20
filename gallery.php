<?php
require_once 'utils/utils.php';
require_once 'entities/file.class.php';
require_once 'entities/imagenGaleria.class.php';
require_once 'entities/conection.class.php';
require_once 'entities/queryBuilder.class.php';
require_once 'exceptions/appException.class.php';
require_once 'repository/imagenGaleriaRepository.class.php';

$errores = [];
$descripcion = '';
$mensaje = '';

try {
    $config = require 'app/config.php';
   
    App::bind('config', $config);
    $imagenRepository = new ImagenGaleriaRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);

        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


        $imagenGaleria = new ImagenGaleria($imagen->getFileName(),$descripcion);
        $imagenRepository->save($imagenGaleria);
        $descripcion = '';
        $mensaje = 'Imagen Guardada';
    }
    
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
}catch(QueryException $exception){
    $errores[] = $exception->getMessage();
}catch(AppException $exception){
    $errores[] = $exception->getMessage();

}finally{
    $imagenes = $imagenRepository->findAll();
}

require_once 'views/gallery.wiew.php';
