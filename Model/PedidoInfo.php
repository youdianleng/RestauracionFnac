<?php 
abstract class PedidosInfo extends Pedido{
    protected $Cliente_id;
    protected $Pedido_id;
    protected $Precio_total;

    protected $Pedido_Time;

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
}
?>