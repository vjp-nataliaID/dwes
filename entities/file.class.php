<?php
require __DIR__.'../../exceptions/FileException.class.php';

class File {
    private $file;
    private $fileName;

    public function __construct(string $fileName, array $arrTypes){
        //con $fileName obtendremos el fichero mediante el array $_FILES que contiene
        //Todos los ficheros que se suben al servidor mediante un formulario.

        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        //Comprobamos que el array contiene el fichero

        if(!isset($this->file)){
            //Mostrar error
            throw new FileException('Debes seleccionar un fichero');
        }

        //Verificamos si ha habido un error durante la subida del fichero

        if($this->file['error'] !== UPLOAD_ERR_OK){
            //Dentro del if verificamos de que tipo ha sido el error
            switch($this->file['error']){
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:{
                    //Algúm problema con el tamaño del fichero
                    throw new FileException('El fichero es demasiado grande');
                    break;
                }
                case UPLOAD_ERR_PARTIAL:{
                    //Error en la tranferencia - subida incompleta
                    throw new FileException('No se ha podido subir el fichero completo');
                    break;
                }
                default:{
                    //Error en la subida del fichero
                    throw new FileException('No se ha podido subir el fichero');
                    break;
                }
            }
        }
        //Comprobamos si el fichero subido es de un tipo de los que tenemos soportados
        if(in_array($this->file['type'], $arrTypes)===false){
            //Error de tipo no soportado
            throw new FileException('Tipo de fichero no soportado');
        }
        
    }
    public function getFileName(){
        return $this->fileName;
    }
    
}