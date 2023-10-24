<?php

abstract class Producto{

    protected $Producto_id;
    protected $Categoria_id;
    protected $Nombre;
    protected $Descripcion;
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

    public function getPrecio(){
        return $this->Precio;
    }


}



?>