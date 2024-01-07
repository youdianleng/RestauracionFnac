<?php
include_once "Model/Ingredientes.php";
abstract Class IngredientesInfo extends Ingredientes{

    //Preparar los variables para clase
    protected $Descripcion;
    protected $Ingredientes_id;
    protected $Nombre;
    protected $Precio;

    //El constructor para crear clase
    public function __construct(){
        
    }

    /**
     * Get the value of Descripcion
     */ 
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * Set the value of Descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;

        return $this;
    }

    /**
     * Get the value of Ingredientes_id
     */ 
    public function getIngredientes_id()
    {
        return $this->Ingredientes_id;
    }

    /**
     * Set the value of Ingredientes_id
     *
     * @return  self
     */ 
    public function setIngredientes_id($Ingredientes_id)
    {
        $this->Ingredientes_id = $Ingredientes_id;

        return $this;
    }

    /**
     * Get the value of Nombre
     */ 
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set the value of Nombre
     *
     * @return  self
     */ 
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

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