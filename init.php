<?php
// Cargar la configuración solo una vez
$config = require 'app/config.php';

// Registrar la configuración en el contenedor
App::bind('config', $config);
?>