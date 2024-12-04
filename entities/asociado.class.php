<?php
require_once '../entities/queryBuilder.class.php';
class Asociado implements IEntity{
    private $nombre;
    private $logo;
    private $descripcion;
    private $id;

    public function __construct($nombre='', $logo='', $descripcion='') {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
        $this->id=null;
    }

    const RUTA_IMG_ASOCIADOS= 'images/asociados/';
    
    
    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of logo
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
    public function toArray(): array
    {
        return [
            'nombre' => $this->getNombre(),
            'logo' => $this->getLogo(),
            'descripcion' => $this->getDescripcion()
        ];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUrlAsociados(){
        return self::RUTA_IMG_ASOCIADOS.$this->getLogo();
    }
}

?>