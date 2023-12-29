<?php
include_once "Model/IngredientesInfo.php";
Class Ingredientes{

    //Guardar el Ingrediente actual que pasa por parametro
    protected $ingredientes;

    //Cantidad actual de este Ingrediente
    protected $cantidad = 1;

    public function __construct($ingrediente){
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