<?php
Class CalculadoraPrecios{
    public static function calculadorPrecioPedido($pedidos){
        $precioTotal = 0;
        foreach ($pedidos as $pedido){
            $precioTotal += $pedido->getPrecioTotal();
        }
        return $precioTotal;
    }
}


?>