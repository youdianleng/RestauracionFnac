<?php
//En IngredientesDAO realiza todos los acciones relaciona con Ingredientes de BBDD
include_once "config/DB.php";
class ingredientesDAO{

    //Buscar los Productos por producto_id
    public static function getAllIngredientes(){
        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM ingredientes");
        $stmt->bind_param("i",$idProducto);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();
        $result = $result->fetch_object("ingredientes");
        $con->close();

        return $result;
    }
}




?>