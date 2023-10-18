<?php
include_once "config/DB.php";
class ProductoDAO{
    public static function getAllProducts(){
        $con = DataBase::connect();
        
        if($result = $con->query("SELECT * FROM Clientes")){
                while($producto = $result->fetch_array()){
                    echo $producto['Name'];
                }
        }
    }
}

?>