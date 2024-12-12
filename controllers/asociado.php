<?php
    require_once 'utils/utils.php';
    require_once 'entities/asociado.class.php';
    require_once 'entities/File.class.php';
    require_once 'entities/QueryBuilder.class.php';
    require_once 'entities/App.class.php';
    require_once 'repository/ImagenAsociadosRepository.class.php';

    $errores = [];
    $nombre = '';
    $descripcion = '';
    $mensaje = '';

    try{
       
        $asociadoRepository = new ImagenAsociadoRepository();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $nombre = trim(htmlspecialchars($_POST['nombre']));
    
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            $imagen = new File('logo', $tiposAceptados);
    
            $imagen->saveUploadFile(Asociado::RUTA_IMG_ASOCIADOS);
    
            $asociado = new Asociado($nombre,$imagen->getFileName(),$descripcion);
            $asociadoRepository->save($asociado);
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
       $asociados = $asociadoRepository->findAll();
        
    }

 require_once 'views/asociado.view.php';
?>
