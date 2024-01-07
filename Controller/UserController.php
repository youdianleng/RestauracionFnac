<?php
    include_once "Model/Usuario.php";
    include_once "Model/ProductoDAO.php";
    include_once "config/DB.php";
    include_once "Utils/CalculadoraPrecios.php";
    include_once "Model/UserDAO.php";
    include_once "Model/PedidoDAO.php";
    class userController{
        

        //Mostrar el panel de Usuario
        public function userPanel(){
            //Cuando recibe el usuario y el Contrasenya a la vez entra
            if(isset($_POST['usuario']) && $_POST['usuario'] != null && $_POST['contrasenya'] && $_POST['contrasenya'] != null){

                //Definir los variables para usuario y contrasenya
                $usuarioRegistro = $_POST['usuario'];
                $usuarioContrasenya = $_POST['contrasenya'];

                //buscar en el bbdd el usuario que contiene el contrasenya 
                $usuarios = UserDAO::getUsuarioEspecifico($usuarioRegistro,$usuarioContrasenya);

                //En caso de que usuario devuelve nulo entra
                if($usuarios == null){
                    
                    //Si es nulo crea el ususario
                    UserDAO::nuevaUsuario($usuarioRegistro,$usuarioContrasenya);

                    //Vuelve a panel de Iniciar Usuario
                    header('Location:'.url."?controller=user&action=IniciarSession");
                }else{

                    //Iniciar Session
                    session_start();

                    //En caso de que usuario y Contrasenya recibido esta en bbdd entra
                    if($_SESSION['usuario'] = UserDAO::getUsuarioEspecifico($usuarioRegistro,$usuarioContrasenya) != null){
                        
                        //Iniciar el session de usuario con el resultado encontrada de bbdd
                        $_SESSION['usuario'] = UserDAO::getUsuarioEspecifico($usuarioRegistro,$usuarioContrasenya);

                        //Enviar al Panel de usuario
                        header('Location:'.url."?controller=user&action=controllerPanelUser");
                    }else{

                        //Enviar al panel de Iniciar Session
                        header('Location:'.url."?controller=user&action=IniciarSession");
                    }
                    
                }
            }else{
                //inicar el session
                session_start();

                //Encaso de que usuario esta iniciado entra
                if(isset($_SESSION['usuario'])){
                    //Envia a panel de usuario
                    header('Location:'.url."?controller=user&action=controllerPanelUser");
                }else{
                    //Vuelve a panel de iniciar session
                    header('Location:'.url."?controller=user&action=IniciarSession");
                }
            }
        
            
        }


        //Mostrar el panel de Usuario
        public function controllerPanelUser(){

            //Iniciar el session
            session_start();

            //Mostrar los paneles de usuario por el web
            include_once "View/header.php";
            include_once "userPanel/userDetail.php";
            include_once "View/footer.php";
            
            
        }

        //Mostrar el panel de Pedido
        public function pedidoPanel(){
            //Iniciar el session
            session_start();

            //Si el usuario esta iniciado entra
            if(isset($_SESSION['usuario'])){
                
            // Mostrar todos los pedidos del usuario
            $pedidos = PedidoDAO::getAllPedidoByUser($_SESSION['usuario']->getCliente_id());
            
            // Este paso es para buscar el TiempoEstima de cada pedido
            foreach($pedidos as $pedido){
                $pedidoActs = PedidoDAO::PedidoActualProducto($pedido->getPedido_id());
                $TiempoEstimado = 0;
                foreach($pedidoActs as $pedidoAct){
                    $TiempoEstimado += $pedidoAct->getTiempo_Estimado();
                }
            }

                //En caso de que el Cookie esta configurado
                if(isset($_COOKIE['UltimoPedido'])){



                    //Busca el pedido que esta guardado en bbdd de este usuario y devuelve todos los productos id de este pedido
                    $pedido = $_COOKIE['UltimoPedido'];

                    $productoPedido = PedidoDAO::PedidoActualProducto($pedido);
                    //Crear un array
                    $ProdUltima = array();
                    // Hacer un bucle para sacar los informacion recibido de $pedidoReciente
                    foreach($productoPedido as $producto_id){
                        //Guardar el producto_id de cada producto encontrada de $pedidoReciente
                        $producto_idOne = $producto_id->getProducto_id();

                        //Crear el Pedido con el producto_id
                        $pedido = new Pedido(ProductoDAO::getProductByID($producto_idOne));
                        $pedido->getProducto()->setPrecio($producto_id->getPrecio_Unidad());
                        $pedido->setCantidad($producto_id->getCantidad());

                        //Añadir a array $ProdUltima el $pedido
                        array_push($ProdUltima,$pedido);
                    }
                    
                }
                


               
            }
            
            //Mostrar el panel de Pedido
            include_once "View/header.php";
            include_once "userPanel/pedidoPanel.php";
            include_once "View/footer.php";
            
            
        }


        /*Funcion para buscar los productos guardado en un pedido del cliente que esta iniciado el session */
        public function productoPedidoPanel(){

            //Iniciar el Session
            session_start();

            //Si recibe el pedido que ha enviado el usuario desde su panel de pedido
            if(isset($_POST['pedidoUser'])){

                //Busca el pedido que esta guardado en bbdd de este usuario y devuelve todos los productos id de este pedido
                $pedido = $_POST['pedidoUser'];
                //Crear el array
                $productoEncontrada = [];

                $productoPedido = PedidoDAO::PedidoActualProducto($pedido);
                //Con los productos id recibido realizar un bucle para separarlo
                foreach($productoPedido as $prodIdPedido){

                    
                    //Guardar el producto_id de cada producto encontrada de $pedidoReciente
                    $producto_idOne = $prodIdPedido->getProducto_id();

                    //Crear el Pedido con el producto_id
                    $pedido = new Pedido(ProductoDAO::getProductByID($producto_idOne));

                    //Cambiar el precio de pedido
                    $pedido->getProducto()->setPrecio($prodIdPedido->getPrecio_Unidad());

                    //Cambiar el Cantidad de pedido
                    $pedido->setCantidad($prodIdPedido->getCantidad());

                    
                    array_push($productoEncontrada,$pedido);
                }
                
            }


            //Incluir los paneles que muestra los productos de un pedido
            include_once "View/header.php";
            include_once "userPanel/productoPedido.php";
            include_once "View/footer.php";
        }



        //Mostrar el panel de admin
        public function adminPanel(){

            //Iniciar el session
            session_start();

            //Guardar todos los Categorias
            $Categorias = ProductoDAO::getAllCategoria();
            
            //Guardar todos los Productos
            $Productos = ProductoDAO::getAllProductos();
            

            //Guardar todos los Clientes
            $Usuarios = UserDAO::getUsuarios();


            //Incluir los paneles del admin 
            include_once "View/header.php";
            include_once "userPanel/adminPanel.php";
            include_once "View/footer.php";
            
            
        }


        //Mostrar el panel de iniciar session
        public function IniciarSession(){
            //Inicar el session
            session_start();

            //Incluir de panel de Iniciar el Session
            include_once "View/header.php";
            include_once "userPanel/iniciarSession.php";
            include_once "View/footer.php";
        }

        //Eliminar el usuario 
        public function eliminarUsusario(){
            //Quitar el Cookie de Ultimo pedido de usuario
            setcookie('UltimoPedido','', time()-3600);

            //Eliminar todos los ingredientes que hay en los productos del usuario
            ingredientesDAO::deleteTodosIngredientesUsuario($_POST['cliente_id']);


            //Eliminar primero todos los productos que hay el usuario
            PedidoDAO::eliminarUsuarioPedido($_POST['cliente_id']);

            //Eliminar despues todos los pedidos de usuario
            PedidoDAO::eliminarTodoPedidoUsuario($_POST['cliente_id']);

            //Finalmente eliminar el Usuario desde bbdd
            UserDAO::eliminarUsuario($_POST['cliente_id']);

            //Iniciar el session
            session_start();

            //Borrar el Session de usuario
            unset($_SESSION['usuario']);

            //Borrar el Session de Carrito
            unset($_SESSION['Carrito']);
            
            //Enviar al panel de Iniciar Session
            header('Location:'.url."?controller=user&action=IniciarSession");
        }



        /**
         * Modificar el Usuario
         */
        public function modificarUsusario(){

            //Si recibe correctamente los parametros
            if(isset($_POST['Nombre'],$_POST['Apellido'],$_POST['cliente_id'])){
                //Cambiara el nombre y apellido de usuario segun los parametros pasado por usuario
                UserDAO::editarUsuario($_POST['Nombre'],$_POST['Apellido'],$_POST['cliente_id']);

                //Despues de modificar vuelve a Panel de Iniciar Session
                header('Location:'.url."?controller=user&action=IniciarSession");
            }else{
                //Enviar al panel de Usuario
                header('Location:'.url."?controller=user&action=controllerPanelUser");
            }
            
        }


        /**
         * Cerrar el Session de Usuario
         */
        public function cerrarSession(){

            //Eliminar el Cookie de UltimoPedido
            setcookie('UltimoPedido','', time()-3600);

            //Iniciar el session
            session_start();

            //Quitar los session de usuario y Carrito
            unset($_SESSION['usuario']);
            unset($_SESSION['Carrito']);

            //Envia al panel Principal
            header('Location:'.url."?controller=producto&action=index");
        }
        
    }

?>

