<?php

    require_once 'utils/bootstrap.php';
    require_once 'utils/routes.php';

    use proyecto\exceptions\NotFoundException;
    use proyecto\entities\Router;
    use proyecto\entities\Request;
    try{
        require Router::load('utils/routes.php')->direct(Request::uri(),Request::method());

    }catch(NotFoundException $exception){
        die($exception->getMessage());
    }
    

?>