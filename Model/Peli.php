<?php
include_once "Producto.php";

class Peli extends Producto{

    public function __construct($id,$name,$tipo,$genero){
        parent::__construct($id,$name,$tipo,$genero);
    }

    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIOFILM;
        return $precioTotal;
    }
    public function devolverPrecioTotal(){
        return self::PRECIOFILM;
    }
}

?>