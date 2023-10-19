<?php
include_once "config/DB.php";
class ProductoDAO{
    public static function getAllProducts(){
        $con = DataBase::connect();
        
        if($result = $con->query("SELECT * FROM productos where tipo = 'GAME'")){
                //return $result->fetch_object('Juego');

                $res = [];
                 while($producto = $result->fetch_object('Juego')){
                    $res[] = $producto;
                //     echo $producto;
                //     //echo $producto['Name'];ç
                 }
                 return $res;
        }
    }
}

?>