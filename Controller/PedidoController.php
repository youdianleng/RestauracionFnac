<?php
    include_once "Model/Usuario.php";
    include_once "Model/ProductoDAO.php";
    include_once "Model/Pedidos.php";
    include_once "config/DB.php";
    include_once "Utils/CalculadoraPrecios.php";
    include_once "Model/UserDAO.php";
    include_once "Model/PedidoDAO.php";
    include_once "Model/IngredienteDAO.php";
    class pedidoController{
        
        //Añadir el producto de carrito de pedido actual y guardarlo en bbdd que cada producto sigue con el
        //numero de pedido que toca
        public function añadirPedido(){
            session_start();
            //Si recibe el Cliente_id y el PrecioTotal relleno entra.
            if(isset($_POST['Cliente_id'],$_POST['PrecioTotal']) && ($_POST['Cliente_id'] != null)){

                //Obtener el usuario segun el ID que tiene
                $usuarioActual = UserDAO::getUsuarioEspecificoNombre($_POST['Cliente_id']);
                //Obtener el permiso de usuario
                $usuarioPermiso = $usuarioActual->getPermisos();

                //Cuando sea 1 como usuario entra
                if($usuarioPermiso == 1){

                
                $usuario = $_POST['Cliente_id'];
                $precioTotal = $_POST['PrecioTotal'];
                //realizar action de añadir el pedido con el usuario actual iniciado 
                PedidoDAO::AñadirPedido($usuario,$precioTotal);
                //Despùes de añadido el Pedido a BBDD añadimos los productos al misma hora
                //Realizar un foregin de todos los productos que hay en carrito actual pasado por validacion
                foreach($_SESSION['Carrito'] as $productoCarrito){
                    //Realizar un busqueda de Pedido mas recientes (Lo que acabamos de crear) de usuario actual
                    $pedido_id = PedidoDAO::PedidoActual($_SESSION['usuario']->getCliente_id());
                    foreach($pedido_id as $pedidoid){
                        //Encontrar el pedido id actual
                        $pedido = $pedidoid->getPedido_id();
                    }
                    //guardar los datos necesarios encontrado desde PedidoDAO
                    $cantidad = $productoCarrito->getCantidad();
                    $precio_Total = ($productoCarrito->getCantidad() * $productoCarrito->getProducto()->getPrecio());
                    $Precio_unidad = $productoCarrito->getProducto()->getPrecio();
                    $producto_id = $productoCarrito->getProducto()->getProdId();
                    $tiempo = $productoCarrito->getProducto()->getTiempo() * $productoCarrito->getCantidad();
                    
                    //Añadir los ingredientes de un pedido con el numero de pedido
                    PedidoDAO::AñadirPedidoProducto($pedido,$cantidad,$precio_Total,$Precio_unidad,$producto_id,$tiempo);

                    //Si el producto contiene Ingrediente entra
                    if($productoCarrito->getIngredientes() != null){
                        //Hacer un separacion de ingredientes desde array
                        foreach($productoCarrito->getIngredientes() as $ingrediente){

                            //llamar al funcion para obtener informaciones de ese ingrediente
                            $ingredienteEncontrada = ingredientesDAO::getIngredientesById($ingrediente);
                            $Descripcion = $ingredienteEncontrada->getDescripcion();
                            $Ingrediente_id = $ingredienteEncontrada->getIngredientes_id();
                            $Nombre = $ingredienteEncontrada->getNombre();

                            //Añadir en la tabla de pedidos_ingredientes
                            ingredientesDAO::setIngredientesPedido($Descripcion, $Ingrediente_id, $Nombre, $pedido);       
                        }
                    }

                    //Añadir los productos con su ingredientes
                    foreach($_SESSION['Carrito'] as $productoCarrito){
                        //Obtener el producto id de ese producto dentro de pedido
                        $producto_id = $productoCarrito->getProducto()->getProdId();

                        //Hacer un bucle para separar los ingredientes de array
                        foreach($productoCarrito->getIngredientes() as $ingrediente){

                            //buscar el ingrediente segun el id pasado
                            $ingredienteEncontrada = ingredientesDAO::getIngredientesById($ingrediente);
                            $Descripcion = $ingredienteEncontrada->getDescripcion();
                            $Ingrediente_id = $ingredienteEncontrada->getIngredientes_id();
                            $Nombre = $ingredienteEncontrada->getNombre();
                            //Añadir en la tabla de pedidos_ingredientes
                            ingredientesDAO::setIngredientesProducto($Descripcion, $Ingrediente_id, $Nombre, $producto_id);       
                        }
                        
                    }
                    
                }
                //Configurar el Cookie para mostrar el ultimo pedido de usuario
                setcookie('UltimoPedido',$pedido,time()+3600);

                //Quitar el carrito despues de añadir los productos en el pedido
                unset($_SESSION['Carrito']);

                //Enviar al pagina siguiente
                header('Location:'.url."?controller=producto&action=carrito");
                }else{
                   //Enviar al pagina siguiente
                    header('Location:'.url."?controller=producto&action=carrito"); 
                    $_SESSION['Carrito'] = null;
                    
                }
            }else{
                //Enviar al pagina siguiente en caso que no se encuentra nada de POST o falta.
                header('Location:'.url."?controller=producto&action=carrito");
            }
            
        
            
        }


        /**
         * Eliminar 
         */
        public function eliminarPedidoEspecificado(){
            
            //Cuando recibe un "POST" de pedidoUser entra
            if(isset($_POST['pedidoUser'])){
                //Realizar el action de eliminar la dicha pedido que ha pasasdo 
                IngredientesDAO::deleteIngredientePedido($_POST['pedidoUser']);
                PedidoDAO::eliminarProductoPedido($_POST['pedidoUser']);
                

                //Enviar al pagina siguiente
                header('Location:'.url."?controller=user&action=controllerPanelUser");
            }
            
        }




        
    }

?>

