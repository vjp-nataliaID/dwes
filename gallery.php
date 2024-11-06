<?php
require 'utils/utils.php';
require 'entities/file.class.php';
require_once 'utils/strings.php';
require 'entities/connection.class.php';
require_once 'entities/queryBuilder.class.php';
require_once 'entities/app.class.php';
$errores = [];
$descripcion = ''; 
$mensaje='';
try {



  $config = require_once 'app/config.php';
  
  App::bind('config',$config);
  $connection = App::getConnection();

  // $connection = Connection::make($config['database']);



  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados);
    $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
    //$imagen -> copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    //Preparamos la sentencia sql a ejecutar.

    $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
    $pdoStatement = $connection->prepare($sql);
    //El párametro fileName es 'imagen' porque así lo indicamos en el formulario
    $arrayParametrosStatement = [':nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];
    //Lanzamos la sentencia y vemos si se ha ejecutado correctamente.
    $response = $pdoStatement->execute($arrayParametrosStatement);
    if ($response === false) {
      $errores[] = 'No se ha podido guardar la imagen en la base de datos.';
    } else {
      $descripcion = '';
      $mensaje = 'Imagen guardada';
    }
  }
  $querySql = 'SELECT * from imagenes';
  $queryStatement = $connection->query($querySql);

  $queryBuilder = new QueryBuilder($connection);
  $imagenes = $queryBuilder->findAll('imagenes','ImagenGaleria');
} catch (FileException $exception) {
  $errores[] = $exception->getMessage();

} catch (QueryException $exception) {
  $errores [] = $exception->getMessage();

}catch(AppException $exception){
  $errores [] = $exception->getMessage();
  
}




require 'views/gallery.view.php';
