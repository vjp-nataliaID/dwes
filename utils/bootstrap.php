<?php
    require_once 'entities/App.class.php';
    require_once 'entities/Request.class.php';
    require_once 'entities/Router.class.php';
    require_once 'vendor/autoload.php';
    require_once 'repository/MyLog.class.php';
    require_once 'exceptions/NotFoundException.class.php';


    $config  = require_once 'app/config.php';
    App::bind('config', $config);

    $router = Router::load('utils/routes.php');
    App::bind('router', $router);
    
    $logger = MyLog::load('logs/proyecto.log');
    App::bind('logger',$logger);

?>