<?php
//En ProductoDAO realiza todos los acciones relaciona con BBDD
include_once "config/DB.php";
class PedidoDAO{
    /*Buscar / Consultar*/
    //Busca los pedido de un cliente segun el Id de Cliente
    public static function getPedido($usuario,$pedido){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT pedidos_id FROM clientes");

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
    

    //Encontrar todos los pedidos de dicha usuario
    public static function getAllPedidoByUser($usuario){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE Cliente_id = ?");
        $stmt->bind_param("i",$usuario);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "pedidos";
        //Guardar los resultados en un Array
        $listaPedido = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaPedido[] = $productoDB;
        }

        return $listaPedido;
    }



    //Muestra todos los pedidos existentes asignados para que administrador puedan gestionar
    public static function getAllPedido($pedido = null){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos");

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

        //Retornar el array
        return $listaUsuarios;
    }

    //Muestra todos los pedidos existentes asignados para que administrador puedan gestionar
    public static function getAllPedidoAdmin(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "pedidos";
        //Guardar los resultados en un Array
        $listaUsuarios = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaUsuarios[] = $productoDB;
        }

        //Retornar el array
        return $listaUsuarios;
    }

    //Buscar una o varias pedido en concreta de un Usuario y que se devuelve los productos que hay en dentro
    public static function productosActualPedido($usuario,$pedidoActual){
        $con = DataBase::connect();

        //Preparar una consulta SQL para seleccionar Producto_id de tabla corresponente
        $stmt = $con->prepare("SELECT pedido_producto.Producto_id FROM pedido_producto JOIN pedidos ON pedido_producto.Pedido_id = pedidos.Pedido_id JOIN clientes ON clientes.Cliente_id = pedidos.Cliente_id WHERE pedidos.Cliente_id = ? and pedido_producto.Pedido_id = ?;");
        $stmt->bind_param("ii",$usuario,$pedidoActual);
        
        //Ejecutar la consulta
        $stmt->execute();

        //Guardar el resultado en un variable
        $result = $stmt->get_result();
        $con->close();
        //Indicar el clase que vamos usar para crear 
        $obj = "productos";
        //Guardar los resultados en un Array
        $listaPedidoProducto = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaPedidoProducto[] = $productoDB;
        }

        return $listaPedidoProducto;
    }


    //Buscar el ultimo pedido hecho por usuario
    public static function PedidoActual($usuario){
        $con = DataBase::connect();

        //Preparar una consulta SQL para seleccionar Pedido_id cuando el cliente_id con el ordre de tiempo mas cercana de ahora
        $stmt = $con->prepare("SELECT Pedido_id FROM pedidos  WHERE Cliente_id = ? ORDER BY ABS(TIMESTAMPDIFF(SECOND, Pedido_Time, NOW())) LIMIT 1 ;");
        $stmt->bind_param("i",$usuario);

        //Ejecutar la consulta
        $stmt->execute();

        //Guardar el resultado en un variable
        $result = $stmt->get_result();
        $con->close();
        $obj = "pedidos";
        //Guardar los resultados en un Array
        $listaPedido = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaPedido[] = $productoDB;
        }

        return $listaPedido;
    }


    //Buscar todos los datos de pedido_producto depende de pedido_id pasado
    public static function PedidoActualProducto($PedId){
        $con = DataBase::connect();

        //hacer un consulta SQL para seleccionar todos lo informacion de dicho tala
        $stmt = $con->prepare("SELECT * FROM pedido_producto WHERE Pedido_id = ?");
        $stmt->bind_param("i",$PedId);

        //Ejecutar la consulta
        $stmt->execute();

        //Guardar el resultado al variable
        $result = $stmt->get_result();
        $con->close();
        $obj = "pedidos";
        //Guardar los resultados en un Array
        $listaPedido = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaPedido[] = $productoDB;
        }

        return $listaPedido;
    }



    /*Añadir */
    /**
     * Es para Añadir el producto al pedido
     */
    public static function AñadirPedidoProducto($pedido_id,$cantidad,$Precio_total,$precio_unidad,$product_id,$estimado){
        $con = DataBase::connect();
        //hacer un consulta Insetar los informaciones al tabla.
        $stmt = mysqli_query($con,"INSERT INTO `pedido_producto`(`Cantidad`, `Pedido_id`, `Precio_total`, `Precio_Unidad`, `Producto_id`, `Tiempo_Estimado`) VALUES ('$cantidad','$pedido_id','$Precio_total','$precio_unidad','$product_id','$estimado')");
        $con->close();
        header("Location: ".url."?controller=user&action=IniciarSession");
    }

    /**
     * Es para añadir Pedido a dentro de BBDD
     */
    public static function AñadirPedido($usuario,$precioTotal){
        $con = DataBase::connect();
        //hacer un consulta Insetar los informaciones al tabla.
        $stmt = mysqli_query($con,"INSERT INTO `pedidos`(`Cliente_id`, `Precio_Total`) VALUES ('$usuario','$precioTotal')");

        $con->close();
        header("Location: ".url."?controller=producto&action=carrito");
    }


    /*Eliminar*/
    //Eliminar todos los pedidos hecho por usuario
    public static function eliminarTodoPedidoUsuario($usuario){
        $con = DataBase::connect();
        //Hacer un consulta SQL que elimina datos de dicho tabla
        $stmt = $con->prepare("DELETE pedido_producto FROM pedido_producto JOIN pedidos on pedido_producto.Pedido_id = pedidos.Pedido_id Where pedidos.Cliente_id = ?");
        //Hacer un consulta SQL que elimina datos de dicho tabla
        $stmt2 = $con->prepare("DELETE FROM pedidos Where Cliente_id = ?");
        $stmt->bind_param("i",$usuario);
        $stmt2->bind_param("i",$usuario);

        $stmt->execute();
        $stmt2->execute();
        $con->close();
    }



    //Cuando se elimina el Usuario se elimina todos los pedidos que tenga ese usaurio
    public static function eliminarUsuarioPedido($usuario){
        $con = DataBase::connect();
        //Hacer un consulta SQL que elimina datos de dicho tabla
        $stmt = $con->prepare("DELETE FROM pedidos Where Pedido_id = ?");
        $stmt->bind_param("i",$usuario);

        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        return $result;
    }

    //Eliminar los productos de este pedido y el pedido de usuario especificado
    public static function eliminarProductoPedido($pedidoActual){
        $con = DataBase::connect();
        //Hacer un consulta SQL que elimina datos de dicho tabla
        $stmt = $con->prepare("DELETE FROM pedido_producto Where Pedido_id = ?;");
        //Hacer un consulta SQL que elimina datos de dicho tabla
        $stmt2 = $con->prepare("DELETE FROM pedidos Where Pedido_id = ?;");
        $stmt->bind_param("i",$pedidoActual);
        $stmt2->bind_param("i",$pedidoActual);


        $stmt->execute();
        $stmt2->execute();
        $con->close();

    }


}

