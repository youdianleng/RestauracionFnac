<?php
abstract class Usuario{
    protected $Cliente_id;
    protected $Nombre;
    protected $Apellido;
    protected $Permisos;

    public function __construct(){
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
     * Get the value of Permisos
     */ 
    public function getPermisos()
    {
        return $this->Permisos;
    }

    /**
     * Set the value of Permisos
     *
     * @return  self
     */ 
    public function setPermisos($Permisos)
    {
        $this->Permisos = $Permisos;

        return $this;
    }
}


?>