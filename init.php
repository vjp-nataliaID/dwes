<?php
// Cargar la configuración solo una vez
$config = require 'app/config.php';

// Registrar la configuración
App::bind('config', $config);
?>