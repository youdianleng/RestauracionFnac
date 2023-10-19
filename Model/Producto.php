<?php

abstract class Producto{
    const PRECIOFILM = 3;
    const PRECIOGAME = 2;

    protected $id;
    protected $nombre;
    protected $tipo;
    protected $genero;
    
    public function __construct()
    {
        
    }
    // public function __construct($id,$name,$tipo){
    //     $this->id  = $id;
    //     $this->name  = $name;
    //     $this->tipo  = $tipo;


    // }


    public function getId(){

    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getTipo(){
        
    }

    public function getGenero(){
        
    }
    public abstract function calculaPrecioTotal($numDias);
    public abstract function devolverPrecioTotal();
}



?>