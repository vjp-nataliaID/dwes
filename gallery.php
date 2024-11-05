<?php
require 'utils/utils.php';
require 'entities/file.class.php';
require __DIR__.'/utils/strings.php';
require 'entities/connection.class.php';
// $errores = [];
//$descripcion = '';
//$mensaje='';

if($_SERVER['REQUEST_METHOD']=== 'POST'){

   try{

      $descripcion = trim(htmlspecialchars($_POST['descripcion']));
      $tiposAceptados=['image/jpeg','image/jpg','image/gif','image/png'];
      $imagen = new File('imagen', $tiposAceptados);
      $imagen -> saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
      //$imagen -> copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
      //Preparamos la sentencia sql a ejecutar.
      $connection = Connection::make();
      $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
      $pdoStatement = $connection->prepare($sql);
      //El párametro fileName es 'imagen' porque así lo indicamos en el formulario
      $arrayParametrosStatement = [':nombre'=>$imagen->getFileName(), ':descripcion'=>$descripcion];
      //Lanzamos la sentencia y vemos si se ha ejecutado correctamente.
      $response = $pdoStatement->execute($arrayParametrosStatement);
      if($response === false){
        $errores[] = 'No se ha podido guardar la imagen en la base de datos.';

      }else{
        $descripcion = '';
        $mensaje = 'Imagen guardada';
      }
      $querySql = 'SELECT * from imagenes';
      $queryStatement = $connection->query($querySql);
      while($fila = $queryStatement->fetch()){

        echo 'id: ' . $fila['id'];
        echo 
        // $fila = ['id'=>1, 'nombre'=>'asd, 'descripcion'=>'dasder',
        // numVisualizaciones=>0, numLikes=>0, numDownsloads=>0]
        
      }
    }catch(FileException $exception){
        $errores[]=$exception->getMessage();
    }
}



require 'views/gallery.view.php';
?>