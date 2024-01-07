<?php 
abstract class PedidosInfo extends Pedido{

    //Preparar los variables para la clase
    protected $Cliente_id;
    protected $Pedido_id;
    protected $Precio_total;

    protected $Pedido_Time;

    protected $Precio_Unidad;

    protected $Producto_id;

    protected $Cantidad;

    protected $Tiempo_Estimado;

    //Constructor para poder crear el clase
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
     * Get the value of Pedido_id
     */ 
    public function getPedido_id()
    {
        return $this->Pedido_id;
    }

    /**
     * Set the value of Pedido_id
     *
     * @return  self
     */ 
    public function setPedido_id($Pedido_id)
    {
        $this->Pedido_id = $Pedido_id;

        return $this;
    }

    /**
     * Get the value of Precio_total
     */ 
    public function getPrecio_total()
    {
        return $this->Precio_total;
    }

    /**
     * Set the value of Precio_total
     *
     * @return  self
     */ 
    public function setPrecio_total($Precio_total)
    {
        $this->Precio_total = $Precio_total;

        return $this;
    }

    /**
     * Get the value of Pedido_Time
     */ 
    public function getPedido_Time()
    {
        return $this->Pedido_Time;
    }

    /**
     * Set the value of Pedido_Time
     *
     * @return  self
     */ 
    public function setPedido_Time($Pedido_Time)
    {
        $this->Pedido_Time = $Pedido_Time;

        return $this;
    }

    /**
     * Get the value of Precio_Unidad
     */ 
    public function getPrecio_Unidad()
    {
        return $this->Precio_Unidad;
    }

    /**
     * Set the value of Precio_Unidad
     *
     * @return  self
     */ 
    public function setPrecio_Unidad($Precio_Unidad)
    {
        $this->Precio_Unidad = $Precio_Unidad;

        return $this;
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
     * Get the value of Cantidad
     */ 
    public function getCantidad()
    {
        return $this->Cantidad;
    }

    /**
     * Set the value of Cantidad
     *
     * @return  self
     */ 
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;

        return $this;
    }

    /**
     * Get the value of Tiempo_Estimado
     */ 
    public function getTiempo_Estimado()
    {
        return $this->Tiempo_Estimado;
    }

    /**
     * Set the value of Tiempo_Estimado
     *
     * @return  self
     */ 
    public function setTiempo_Estimado($Tiempo_Estimado)
    {
        $this->Tiempo_Estimado = $Tiempo_Estimado;

        return $this;
    }
}
?>