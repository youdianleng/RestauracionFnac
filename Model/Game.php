<?php
include_once "Producto.php";

class Juego extends Producto{

    private $plataforma;

    public function __construct($id,$name,$tipo,$genero,$plataforma){
        parent::__construct($id,$name,$tipo);
        $this->genero = $genero;
        $this->plataforma = $plataforma;
    }

    public function getPlataforma(){
        return $this->plataforma;
    }

    public function setPlataforma($plataforma){
        $this->plataforma = $plataforma;
    }

    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIOGAME;
        return $precioTotal;
    }
    public function devolverPrecioTotal(){
        return self::PRECIOGAME;
    }
}

?>