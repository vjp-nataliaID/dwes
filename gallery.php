<?php
require 'utils/utils.php';
require 'entities/file.class.php';
require_once 'utils/strings.php';
require 'entities/connection.class.php';
require_once 'entities/queryBuilder.class.php';
require_once 'entities/app.class.php';
require_once 'entities/imagenGaleria.class.php';
$errores = [];
$descripcion = '';
$mensaje = '';




$config = require_once 'app/config.php';

App::bind('config', $config);
$connection = App::getConnection();

// $connection = Connection::make($config['database']);


try {
  $connection = Connection::make();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados);
    $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
    $imagen -> copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    //Preparamos la sentencia sql a ejecutar.

    $sqlStatement = "INSERT INTO imagenes (nombre, descripcion) VALUES ('" . $imagen->getFileName() . "', '$descripcion')";
    $pdoStatement = $connection->prepare($sqlStatement);
    $parametros = [':nombre'=>$imagen->getFileName(),':descripcion'=>$descripcion];
    if ($pdoStatement->execute($parametros) === false) {
      $errores[] = 'No se ha podido guardar la imagen en la BD';
    } else {
      $descripcion = '';
      $mensaje = 'Imagen Guardada';
    }
  }
  $queryBuilder = new QueryBuilder($connection);
  $imagenes = $queryBuilder->findAll('imagenes','ImagenGaleria');

} catch (FileException $exception) {
  $errores[] = $exception->getMessage();

} catch (QueryException $exception) {
  $errores[] = $exception->getMessage();

} catch (AppException $exception) {
  $errores[] = $exception->getMessage();
} catch (PDOException $exception){
  $errores[] = $exception->getMessage();
}



require 'views/gallery.view.php';
