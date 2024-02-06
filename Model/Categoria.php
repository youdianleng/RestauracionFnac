<?php
abstract class categoria{

    //Preparar los variables para clase
    protected $Categoria_id;
    protected $NombreCat;
    protected $Descripcion;
    protected $ImagenCategoria;
    
    
     
    /**
     * Get the value of Categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->Categoria_id;
    }

    /**
     * Set the value of Categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($Categoria_id)
    {
        $this->Categoria_id = $Categoria_id;

        return $this;
    }

    /**
     * Get the value of Nombre
     */ 
    public function getNombreCat(){
        return $this->NombreCat;
    }

    /**
     * Set the value of Nombre
     *
     * @return  self
     */ 
    public function setNombreCat($Nombre){
        $this->NombreCat = $Nombre;

        return $this;
    }

    /**
     * Get the value of Descripcion
     */ 
    public function getDescripcion(){
        return $this->Descripcion;
    }

    /**
     * Set the value of Descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;

        return $this;
    }

    /**
     * Get the value of ImagenCategoria
     */ 
    public function getImagenCategoria()
    {
        return $this->ImagenCategoria;
    }

    /**
     * Set the value of ImagenCategoria
     *
     * @return  self
     */ 
    public function setImagenCategoria($ImagenCategoria)
    {
        $this->ImagenCategoria = $ImagenCategoria;

        return $this;
    }
}


?>