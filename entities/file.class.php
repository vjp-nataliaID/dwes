<?php
require_once '../exceptions/FileException.class.php';


class File
{
    private $file;
    private $fileName;

    public function __construct(string $fileName, array $arrTypes)
    {
        //con $fileName obtendremos el fichero mediante el array $_FILES que contiene
        //Todos los ficheros que se suben al servidor mediante un formulario.

        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        //Comprobamos que el array contiene el fichero

        if (!isset($this->file)) {
            throw new FileException('Debes seleccionar un fichero');
        }

        //Verificamos si ha habido un error durante la subida del fichero

        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE: {
                        throw new FileException('El fichero es demasiado grande');
                        break;
                    }
                case UPLOAD_ERR_PARTIAL: {
                        throw new FileException('No se ha podido subir el fichero completo');
                        break;
                    }
                default: {
                        throw new FileException('No se ha podido subir el fichero');
                        break;
                    }
            }
        }
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
        //Comprobamos si el fichero subido es de un tipo de los que tenemos soportados


    }
    public function getFileName()
    {
        return $this->fileName;
    }
    public function saveUploadFile(string $rutaDestino)
    {
        //Comprueba que el fichero temporal con el que vamos a trabajar se haya subido
        //previamente por peticion POST
        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException('El archivo no se ha subido mediante el formulario');
        }
        //Cargamos el nombre del fichero
        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;
        $version = 1;



        // Bucle para generar un nombre único
        while (is_file($ruta)) {
            $ext = substr($this->fileName, -4); // Obtiene los últimos 4 caracteres
            $baseName = substr($this->fileName, 0, -4); // Obtiene el nombre sin la extensión
            // Generamos un nuevo nombre con el número de versión
            $this->fileName = $baseName . "($version)" . $ext;
            $ruta = $rutaDestino . $this->fileName; // Actualiza la ruta con el nuevo nombre
            $version++;
        }
        //muevo el fichero subido del directorio temporal (definido en php.ini)
        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            //devuelve false si no se ha podido mover
            throw new FileException('No se puede mover el fichero a su destino');
        }
    }

    public function copyFile(string $rutaOrigen, string $rutaDestino)
    {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        if (is_file($origen) === false) {
            throw new FileException("No existe el fichero $origen que intentas copiar");
        }
        if (is_file($destino) === true) {
            throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
        }
        if (copy($origen, $destino) === false) {
            throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
    }
}
