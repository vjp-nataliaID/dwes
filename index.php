<?php
    require_once 'utils/bootstrap.php';
    require_once 'entities/router.class.php';


    try{
        
        require Router::load('utils/routes.php')->direct(Request::uri(),Request::method());

    }catch(Exception $e){
        die($e->getMessage());
    }
    

?>