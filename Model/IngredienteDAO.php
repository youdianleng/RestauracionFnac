<?php
//En IngredientesDAO realiza todos los acciones relaciona con Ingredientes de BBDD
include_once "config/DB.php";
class ingredientesDAO{

    //Buscar los Ingredientes
    public static function getAllIngredientes(){
        $con = DataBase::connect();
        //Preparar un consulta SQL para seleccionar los datos de dicho tabla
        $stmt = $con->prepare("SELECT * FROM ingredientes");
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        $obj = "ingrediente";
        //Guardar los resultados en un Array
        $listaPedido = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaPedido[] = $productoDB;
        }

        return $listaPedido;
    }


    //Buscar los Ingredientes por Id
    public static function getIngredientesById($Ingred){
        $con = DataBase::connect();
        //Preparar un consulta SQL para seleccionar los datos de dicho tabla
        $stmt = $con->prepare("SELECT * FROM ingredientes where Ingredientes_id = $Ingred");
        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();
        //Guardar el resultado 
        $listaPedido = $result->fetch_object("ingrediente");

        return $listaPedido;
    }

    //Añadir
    //Añadir el Ingrediente en Pedido_Ingredientes
    public static function setIngredientesPedido($Descripcion, $Ingrediente_id, $Nombre, $Pedido_id){
        $con = DataBase::connect();
        //Preparar un consulta SQL para insertar los datos de dicho tabla
        $stmt = mysqli_query($con,"INSERT INTO `pedidos_ingredientes`(`Descripcion`, `Ingrediente_id`, `Nombre`, `Pedido_id`) VALUES ('$Descripcion','$Ingrediente_id','$Nombre','$Pedido_id')");
        $con->close();
    }

    //Añadir el Ingrediente en Producto_Ingredientes
    public static function setIngredientesProducto($Descripcion, $Ingrediente_id, $Nombre, $Producto_id){
        $con = DataBase::connect();
        //Preparar un consulta SQL para insertar los datos de dicho tabla
        $stmt = mysqli_query($con,"INSERT INTO `producto_ingredientes`(`Descripcion`, `Ingrediente_id`, `Nombre`, `Producto_id`) VALUES ('$Descripcion','$Ingrediente_id','$Nombre','$Producto_id')");
        $con->close();
    }


    //Eliminar
    //Eliminar los ingredientes asignados a un Pedido
    public static function deleteIngredientePedido($id){
        $con = DataBase::connect();
        //Busca y borra el bbdd el tabla productos los que coincide con Where
        $stmt = $con->prepare("DELETE FROM pedidos_ingredientes Where Pedido_id = ?");
        $stmt->bind_param("i",$id);

        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        return $result;
    }

    //Eliminar todos los ingredientes de un usuario
    public static function deleteTodosIngredientesUsuario($id){
        $con = DataBase::connect();
        //Busca y borra el bbdd el tabla productos los que coincide con Where
        $stmt = $con->prepare("DELETE t1 FROM pedidos_ingredientes AS t1 JOIN pedidos AS t2 ON t1.Pedido_id = t2.Pedido_id WHERE t2.Cliente_id = ?");
        $stmt->bind_param("i",$id);

        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        return $result;
    }


}




?>