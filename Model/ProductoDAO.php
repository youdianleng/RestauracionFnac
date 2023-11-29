<?php
//En ProductoDAO realiza todos los acciones relaciona con BBDD
include_once "config/DB.php";
class ProductoDAO{

    //Buscar los Productos por producto_id
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


    //Buscar todos los productos de un categoria por el Categoria_ID
    public static function getAllByID($idCategoria){

        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos where categoria_id = ?");
        $stmt->bind_param("i",$idCategoria);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "productos";
        //Guardar los resultados en un Array
        $listaProductos = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaProductos[] = $productoDB;
        }

        return $listaProductos;

    }


    //Buscar todos los contenido de cada Categoria
    public static function getAllCategoria(){

        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM categoria");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "categorias";
        //Guardar los resultados en un Array
        $listaCategoria = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaCategoria[] = $productoDB;
        }

        return $listaCategoria;

    }

    //Buscar todos los contenido de cada Categoria
    public static function getAllProductos(){

        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "productos";
        //Guardar los resultados en un Array
        $listaProducto = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaProducto[] = $productoDB;
        }

        return $listaProducto;

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

    public static function modificarProductos($producto_id,$nombre,$descripcion,$descripcionCorto,$imagen,$precio){
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET Nombre = ?, Descripcion = ?, DescripcionCorto = ?, Imagen = ?, Precio = ? WHERE Producto_id = ?");
        $stmt->bind_param("ssssdi",$nombre,$descripcion,$descripcionCorto,$imagen,$precio,$producto_id);

        $stmt->execute();

        $result = $stmt->get_result();
        $con->close();

        return $result;
    }

    public static function añadirProductos($producto_id,$Categoria_id,$nombre,$descripcion,$descripcionCorto, $imagen ,$precio){
        $con = DataBase::connect();

        $stmt = mysqli_query($con,"INSERT INTO `productos`(`Producto_id`, `Categoria_id`, `Nombre`, `Descripcion`, `DescripcionCorto`, `Imagen`, `Precio`) VALUES ('$producto_id','$Categoria_id','$nombre','$descripcion','$descripcionCorto','$imagen','$precio')");

        $con->close();
        header("Location: ".url."?controller=producto");
    }

    public static function getUsuarios(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM clientes");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "usuarios";
        //Guardar los resultados en un Array
        $listaUsuarios = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaUsuarios[] = $productoDB;
        }

        return $listaUsuarios;
    }
}





?>