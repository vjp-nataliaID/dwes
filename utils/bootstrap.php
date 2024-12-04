<?php
    require_once 'entities/app.class.php';
    require_once '../entities/request.class.php';

    $config  = require_once '../app/config.php';
    App::bind('config', $config);

    App::bind('router',Router::load('utils/routes.php'));

?>