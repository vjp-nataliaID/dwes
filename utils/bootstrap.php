<?php
    require_once 'entities/app.class.php';
    require_once 'entities/request.class.php';
    require_once 'vendor/autoload.php';
    require_once 'repository/myLog.class.php';

    $config  = require_once 'app/config.php';
    App::bind('config', $config);

    App::bind('logger', new MyLog('logs/proyecto.log'));

?>