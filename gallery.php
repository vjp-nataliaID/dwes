<?php
require 'utils/utils.php';
require 'entities/file.class.php';
require __DIR__.'/utils/strings.php';
// $errores = [];
//$descripcion = '';
//$mensaje='';

if($_SERVER['REQUEST_METHOD']=== 'POST'){




      //  try{

    //  $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    //$tiposAceptados=['image/jpeg','image/jpg','image/gif','image/png'];
    //$imagen = new File('imagen', $tiposAceptados);
    //El párametro fileName es 'imagen' porque así lo indicamos en el formulario
    //$mensaje = 'Datos enviados';
    //}catch(FileException $exception){
    //    $errores[]=$exception->getMessage();
    //}
}



require 'views/gallery.view.php';
?>