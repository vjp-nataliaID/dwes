<?php

    require_once 'utils/bootstrap.php';

    $router = new Router();
    require 'utils/routes.php';

    try{
        require Router::load('utils/routes.php')->direct(Request::uri(),Request::method());

    }catch(NotFoundException $exception){
        die($exception->getMessage());
    }
    

?>