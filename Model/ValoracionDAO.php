<?php
//En ProductoDAO realiza todos los acciones relaciona con BBDD
include_once "config/DB.php";
class valoracionDAO{
    public static function getResenyasProductos($producto_id){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM producto_valoracion INNER JOIN clientes ON producto_valoracion.Cliente_id = clientes.Cliente_id WHERE producto_valoracion.Producto_id = $producto_id");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "valoracion";
        //Guardar los resultados en un Array
        $listaResenya = [];
        while ($valoracionDB = $result->fetch_object($obj)){
            $listaResenya[] = $valoracionDB;
        }

        return $listaResenya;
    }


    public static function getResenyas(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM producto_valoracion INNER JOIN clientes on clientes.Cliente_id = producto_valoracion.Cliente_id INNER JOIN productos ON productos.Producto_id = producto_valoracion.Producto_id");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "valoracion";
        //Guardar los resultados en un Array
        $listaResenya = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaResenya[] = $productoDB;
        }

        return $listaResenya;
    }



    
    public static function getResenyasByEstrella($estrella){
        $con = DataBase::connect();
        $listaResenya = [];
        $listaEstrellaStr = $estrella[0];
        $estrella = explode(",",$listaEstrellaStr);
        foreach($estrella as $est){
            $stmt = $con->prepare("SELECT * FROM producto_valoracion INNER JOIN clientes on clientes.Cliente_id = producto_valoracion.Cliente_id INNER JOIN productos ON productos.Producto_id = producto_valoracion.Producto_id WHERE producto_valoracion.estrella = $est");

            //Ejecutar el select, guardar el resultado y cerrar el conecxion
            $stmt->execute();
            $result=$stmt->get_result();
    

            $obj = "valoracion";
            //Guardar los resultados en un Array
            
            while ($productoDB = $result->fetch_object($obj)){
                $listaResenya[] = $productoDB;
            }
            
        }
        $con->close();

        return $listaResenya;

    }


    public static function getCategoriaResenya($cat_id){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM producto_valoracion INNER JOIN productos ON producto_valoracion.producto_id = productos.producto_id INNER JOIN categoria ON productos.categoria_id = categoria.categoria_id where categoria.categoria_id = $cat_id");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "valoracion";
        //Guardar los resultados en un Array
        $listaResenya = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaResenya[] = $productoDB;
        }

        return $listaResenya;

    }


    public static function setValoracionProducto($prod_id,$comentario,$estrella,$user_id){
        $con = DataBase::connect();

        //Insertar al BBDD los contenidos al tabla que corresponde
        $stmt = mysqli_query($con,"INSERT INTO `producto_valoracion`(`Producto_id`, `Valoracion`, `Estrella`, `Cliente_id`) VALUES ('$prod_id','$comentario','$estrella','$user_id')");

        $con->close();
    }


    /**
     * Consultas para tema propìnas
     */
    //Buscar usuario si anteriomente ha donado propina

    public static function getUsuarioToPropina($usuario){
        $sad = $usuario;
        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM puntosusuario where Cliente_id = ?");
        $stmt->bind_param("i",$usuario);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();
        $con->close();
        $obj = "valoracion";
        //Guardar los resultados en un Array
        $listaResenya = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaResenya[] = $productoDB;
        }

        return $listaResenya;
    }



    //Aplicar Propina de los usuarios
    public static function setPropina($usuario,$propina){
        $con = DataBase::connect();

        //Insertar al BBDD los contenidos al tabla que corresponde
        $stmt = mysqli_query($con,"INSERT INTO `puntosusuario`(`Cliente_id`, `Punto`) VALUES ('$usuario','$propina')");

        $con->close();
    }

    //Renovar el propina de usuario
    public static function updatePropina($usuario,$propina){
        $con = DataBase::connect();

        //Insertar al BBDD los contenidos al tabla que corresponde
        $stmt = mysqli_query($con,"UPDATE puntosusuario SET Punto = Punto + $propina WHERE Cliente_id = $usuario");

        $con->close();
    }


    //Eliminar propina de usuario
    public static function eliminarUsuarioPropina($usuario){
        $con = DataBase::connect();
        //Hacer un consulta SQL que elimina datos de dicho tabla
        $stmt = $con->prepare("DELETE FROM puntosusuario Where Cliente_id = ?");
        $stmt->bind_param("i",$usuario);

        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        return $result;
    }
}
?>