<?php
//En ProductoDAO realiza todos los acciones relaciona con BBDD
include_once "config/DB.php";
class ProductoDAO{


    public static function getProductByID($idProducto){
        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos where producto_id = ?");
        $stmt->bind_param("i",$idProducto);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();
        $result = $result->fetch_object("productos");
        $con->close();

        return $result;
    }

    public static function getAllByID($id){

        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos where categoria_id = ?");
        $stmt->bind_param("i",$id);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "";
        echo $obj;
        if($id = 1 ){
            $obj = "productos";
        }elseif($id = 2){
            $obj = "Categorias";
            echo $obj;
        }
        //Guardar los resultados en un Array
        $listaProductos = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaProductos[] = $productoDB;
        }

        return $listaProductos;

    }

    public static function deleteProduct($id){
        $con = DataBase::connect();
        $stmt = $con->prepare("DELETE FROM productos Where producto_id = ?");
        $stmt->bind_param("i",$id);

        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        return $result;
    }

    public static function modificarProductos($producto_id,$nombre,$descripcion,$precio){
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET Nombre = ?, Descripcion = ?, Precio = ? WHERE Producto_id = ?");
        $stmt->bind_param("ssdi",$nombre,$descripcion,$precio,$producto_id);

        $stmt->execute();

        $result = $stmt->get_result();
        $con->close();

        return $result;
    }

    public static function añadirProductos($producto_id,$Categoria_id,$nombre,$descripcion,$precio){
        $con = DataBase::connect();

        $stmt = mysqli_query($con,"INSERT INTO `productos`(`Producto_id`, `Categoria_id`, `Nombre`, `Descripcion`, `Precio`) VALUES ('$producto_id','$Categoria_id','$nombre','$descripcion','$precio')");

        $con->close();
        header("Location: ".url."?controller=producto");
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