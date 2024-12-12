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
require_once 'entities/App.class.php';

$descripcion = '';



try {

   
    $imagenRepository = new ImagenGaleriaRepository();

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);

        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


        $imagenGaleria = new ImagenGaleria($imagen->getFileName(),$descripcion,$categoria);
        $imagenRepository->guarda($imagenGaleria);

        $message = "Se ha guardado una nueva imagen: " . $imagenGaleria->getNombre();
        App::get('logger')->add($message);

    
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
}catch(QueryException $exception){
    $errores[] = $exception->getMessage();
}catch(AppException $exception){
    $errores[] = $exception->getMessage();

}
App::get('router')->redirect('imagenes-galeria');

require_once 'views/gallery.view.php';
?>