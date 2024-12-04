<?php
require_once '../utils/utils.php';
require_once '../entities/file.class.php';
require_once '../entities/imagenGaleria.class.php';
require_once '../entities/conection.class.php';
require_once '../entities/queryBuilder.class.php';
require_once '../exceptions/appException.class.php';
require_once '../repository/imagenGaleriaRepository.class.php';
require_once '../repository/categoriaRepository.class.php';
require_once '../entities/categoria.class.php';

$errores = [];
$descripcion = '';
$mensaje = '';

try {

    $imagenRepository = new ImagenGaleriaRepository();

    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));

    $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados);

    $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

    $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


    $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);

    $imagenRepository->guarda($imagenGaleria);
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
}

header('Location: /gallery');