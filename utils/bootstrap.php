<?php
    namespace proyecto\utils;
    use proyecto\entities\App;
    use proyecto\entities\Router;
    use proyecto\repository\MyLog;
    require_once 'utils/utils.php';
    require_once 'vendor/autoload.php';
  


    $config  = require_once 'app/config.php';
    App::bind('config', $config);

    $router = Router::load('utils/routes.php');
    App::bind('router', $router);
    
    $logger = MyLog::load('logs/proyecto.log');
    App::bind('logger',$logger);

?>