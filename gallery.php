<?php
require_once 'utils/utils.php';
require_once 'entities/file.class.php';
require_once 'entities/imagenGaleria.class.php';
require_once 'entities/conection.class.php';
require_once 'entities/queryBuilder.class.php';
require_once 'entities/app.class.php';
require_once 'exceptions/appException.class.php';
$errores = [];
$descripcion = '';
$mensaje = '';

try {
    $config = require_once 'app/config.php';

    App::bind('config', $config);
    $connection = App::getConnection();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);

        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


        $sqlStatement = "INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre, :descripcion)";

        $pdoStatement = $connection->prepare($sqlStatement);
        $parametros = [':nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];

        if ($pdoStatement->execute($parametros) === false) {
            $errores[] = "No se ha podido guardar la imaen en la BD";
        } else {
            $descripcion = "";
            $mensaje = "Imagen guardada";
        }
    }
    $queryBuilder = new QueryBuilder($connection);
    $imagenes = $queryBuilder->findAll('imagenes', 'ImagenGaleria');
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
}catch(QueryException $exception){
    $errores[] = $exception->getMessage();
}catch(AppException $exception){
    $errores[] = $exception->getMessage();

}

require_once 'views/gallery.wiew.php';
