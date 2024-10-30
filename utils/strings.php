<?php

define('FILE_TYPE_NON_SUPP',9);
define('UPLOAD_FILE_BY_POST',10);
define('FILE_CANNOT_MOVE',11);
define('FILE_EMPTY',12);
$errorsString[UPLOAD_ERR_OK] =  "No hay errores";
$errorsString[UPLOAD_ERR_INI_SIZE] =  "El fichero excede el tamaño máximo soportado";
$errorsString[UPLOAD_ERR_FORM_SIZE] =  "El fichero excede el tamaño máximo soportado";
$errorsString[UPLOAD_ERR_PARTIAL] =  "El fichero no ha sido subido completo";
$errorsString[UPLOAD_ERR_NO_FILE] =  "No se subió ningún fichero";
$errorsString[UPLOAD_ERR_NO_TMP_DIR] =  "Falta la carpeta temporal";
$errorsString[UPLOAD_ERR_CANT_WRITE] =  "No se pudo escribir el fichero";
$errorsString[UPLOAD_ERR_EXTENSION] =  "Una extensión de PHP detuvo la subida de fichero";
$errorsString[FILE_TYPE_NON_SUPP] =  "Tipo de fichero no soportado";
$errorsString[UPLOAD_FILE_BY_POST] = "El fichero no se ha subido mediante el formulario";
$errorsString[FILE_CANNOT_MOVE] = "No se pudo mover el fichero";
$errorsString[FILE_EMPTY] = "Debes seleccionar un fichero";

define('ERROR_STRINGS', $errorsString);
?>