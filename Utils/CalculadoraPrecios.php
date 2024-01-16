<?php
Class CalculadoraPrecios{

    //funcion para calcular un total de precio de parametro pasado
    //el parametro debe ser un array
    public static function calculadorPrecioPedido($pedidos){
        //preparar un variable para hacer acumulacion de precio
        $precioTotal = 0;
        //Bucle para separar los contenidos de array
        foreach ($pedidos as $pedido){
            //Llamar al funcion de objeto, para sacar el precio
            $precioTotal += $pedido->getPrecioTotal();
        }

        //Devolver el precio acumulado
        return $precioTotal;
    }

    //funcion para calcular un total de precio de parametro pasado pero aplicando IVA
    //el parametro debe ser un array
    public static function calculadorPrecioPedidoConIVA($pedidos){
        //preparar un variable para hacer acumulacion de precio
        $precioTotal = 0;
        //Bucle para separar los contenidos de array
        foreach ($pedidos as $pedido){
            //Llamar al funcion de objeto, para sacar el precio
            $precioTotal += $pedido->getPrecioTotal();
        }
        //Aplicar IVA
        $precioTotal = $precioTotal + ($precioTotal*0.21);
        //Devolver el precio acumulado
        return $precioTotal;
    }
}


?>