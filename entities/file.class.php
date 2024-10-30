<?php

require __DIR__.'../../utils/strings.php';

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
            throw new Exception(ERROR_STRINGS[FILE_EMPTY]);
           
        }

        //Verificamos si ha habido un error durante la subida del fichero

        if($this->file['error'] !== UPLOAD_ERR_OK){
                throw new FileException(ERROR_STRINGS[$this->file['error']]);
  
        }
        if(in_array($this->file['type'], $arrTypes) === false){
            throw new FileException(ERROR_STRINGS[$this->file['error']]);
        }
        //Comprobamos si el fichero subido es de un tipo de los que tenemos soportados
        if(in_array($this->file['type'], $arrTypes)===false){
            //Error de tipo no soportado
            throw new FileException(ERROR_STRINGS[FILE_TYPE_NON_SUPP]);
        }
        
    }
    public function getFileName(){
        return $this->fileName;
    }
    public function saveUploadFile(string $rutaDestino){
        //Comprueba que el fichero temporal con el que vamos a trabajar se haya subido
        //previamente por peticion POST
        if(is_uploaded_file($this->file['tmp_name']) === false){
            throw new FileException(ERROR_STRINGS[UPLOAD_FILE_BY_POST]);
        }
        //Cargamos el nombre del fichero
        $this->fileName=$this->file['name'];
        $ruta=$rutaDestino.$this->fileName;
        $version = 1;
        //Comprobamos que la ruta no se corresponde con un fichero que ya exista
        if(is_file($ruta)==true){
            //no sobreescribo, sino que se genera una nueva añadiendo numero de 'version'
            $this->fileName=$this->fileName.'('.$version.')';
        }
        //muevo el fichero subido del directorio temporal (definido en php.ini)
        if(move_uploaded_file($this->file['tmp_name'],$ruta)===false){
            //devuelve false si no se ha podido mover
            throw new FileException(ERROR_STRINGS[FILE_CANNOT_MOVE]);
        }
    }
}