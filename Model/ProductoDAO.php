<?php
include_once "config/DB.php";
class ProductoDAO{
    public static function getAllProducts(){
        $con = DataBase::connect();
        
        if($result = $con->query("SELECT * FROM productos")){

                $res = [];
                 while($producto = $result->fetch_object('productos')){
                    $res[] = $producto;
                 }
                 return $res;
        }
    }

    public static function sendMenssage(){
        if(isset($_POST['Enviar'])){
            echo "Enviar";
        }else if(isset($_POST['Devolver'])){
            echo "Devolver";
        }else{
            echo "No hay indicaciones";
        }
    }
}

class CategoriaDAO{
    public static function getAllCategories(){
        $con = DataBase::connect();
        
        if($result = $con->query("SELECT * FROM categoria")){

                $resC = [];
                 while($Categoria = $result->fetch_object('productos')){
                    $resC[] = $Categoria;
                 }
                 return $resC;
        }
    }
}


?>