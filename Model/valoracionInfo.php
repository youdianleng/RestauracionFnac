<?php

    abstract class ValoracionInfo extends Usuario{

    //Preparar los variables que usaremos para crear clases
    protected $Producto_id;
    protected $Valoracion;
    protected $Estrella;
    protected $Cliente_id;
    protected $Apellido;

    protected $Nombre;
    protected $Punto;

    //Contructor para crear clase
    public function __construct(){
    }

    /**
     * Get the value of Producto_id
     */ 
    public function getProducto_id()
    {
        return $this->Producto_id;
    }

    /**
     * Set the value of Producto_id
     *
     * @return  self
     */ 
    public function setProducto_id($Producto_id)
    {
        $this->Producto_id = $Producto_id;

        return $this;
    }

    /**
     * Get the value of Valoracion
     */ 
    public function getValoracion()
    {
        return $this->Valoracion;
    }

    /**
     * Set the value of Valoracion
     *
     * @return  self
     */ 
    public function setValoracion($Valoracion)
    {
        $this->Valoracion = $Valoracion;

        return $this;
    }

    /**
     * Get the value of Estrella
     */ 
    public function getEstrella()
    {
        return $this->Estrella;
    }

    /**
     * Set the value of Estrella
     *
     * @return  self
     */ 
    public function setEstrella($Estrella)
    {
        $this->Estrella = $Estrella;

        return $this;
    }

    /**
     * Get the value of Cliente_id
     */ 
    public function getCliente_id()
    {
        return $this->Cliente_id;
    }

    /**
     * Set the value of Cliente_id
     *
     * @return  self
     */ 
    public function setCliente_id($Cliente_id)
    {
        $this->Cliente_id = $Cliente_id;

        return $this;
    }

    /**
     * Get the value of Punto
     */ 
    public function getPunto()
    {
        return $this->Punto;
    }

    /**
     * Set the value of Punto
     *
     * @return  self
     */ 
    public function setPunto($Punto)
    {
        $this->Punto = $Punto;

        return $this;
    }


    /**
     * Get the value of Apellido
     */ 
    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * Set the value of Apellido
     *
     * @return  self
     */ 
    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;

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
    }


?>