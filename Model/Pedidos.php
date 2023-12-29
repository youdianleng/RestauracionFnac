<?php
include_once "Model/PedidoInfo.php";
include_once "Model/Producto.php";
class Pedido {
    private $producto;
    private $cantidad = 1;

    private $ingredientes = [];

    public function __construct($producto,$ingrediente = null){
        $this->producto = $producto;
        $this->ingredientes = $ingrediente;
    }
    
    

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }


    //Me devuelve el Precio total de producto segun el cantidad que tiene
    public function getPrecioTotal(){
        return ($this->producto->getPrecio() * $this->cantidad);
    }


    /**
     * Get the value of ingredientes
     */ 
    public function getIngredientes()
    {
        return $this->ingredientes;
    }

    /**
     * Set the value of ingredientes
     *
     * @return  self
     */ 
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;

        return $this;
    }
}


?>