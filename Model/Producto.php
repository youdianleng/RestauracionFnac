<?php

abstract class Producto{

    protected $Producto_id;
    protected $Categoria_id;
    protected $Nombre;
    protected $Descripcion;
    protected $DescripcionCorto;
    protected $Imagen;
    protected $Precio;
    
    public function __construct()
    {
        
    }
    // public function __construct($id,$name,$tipo){
    //     $this->id  = $id;
    //     $this->name  = $name;
    //     $this->tipo  = $tipo;


    // }


    public function getProdId(){
        return $this->Producto_id;
    }

    public function getCatId(){
        return $this->Categoria_id;
    }


    public function getNombre(){
        return $this->Nombre;
    }
    
    public function getDescripcion(){
        return $this->Descripcion;
    }




    /**
     * Get the value of Imagen
     */ 
    public function getImagen()
    {
        return $this->Imagen;
    }

    /**
     * Set the value of Imagen
     *
     * @return  self
     */ 
    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    /**
     * Get the value of DescripcionCorto
     */ 
    public function getDescripcionCorto()
    {
        return $this->DescripcionCorto;
    }

    /**
     * Set the value of DescripcionCorto
     *
     * @return  self
     */ 
    public function setDescripcionCorto($DescripcionCorto)
    {
        $this->DescripcionCorto = $DescripcionCorto;

        return $this;
    }

    /**
     * Get the value of Precio
     */ 
    public function getPrecio()
    {
        return $this->Precio;
    }

    /**
     * Set the value of Precio
     *
     * @return  self
     */ 
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;

        return $this;
    }
}



?>