<?php

    require_once 'utils/bootstrap.php';

    $routes = new Router();
    require 'utils/routes.php';

    require $routes[Request::uri()];
    

?>