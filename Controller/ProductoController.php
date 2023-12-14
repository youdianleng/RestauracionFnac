<?php
    include_once "Model/Productos.php";
    include_once "Model/ProductoDAO.php";
    include_once "config/DB.php";
    include_once "Model/Pedidos.php";
    include_once "Utils/CalculadoraPrecios.php";
    include_once "Model/Categoria.php";
    include_once "Model/PedidoDAO.php";
    class productoController{

        public function index(){
            //iniciar el session
            session_start();
            
            //Variables predefinido para si en caso luego usa
            $allProductos = ProductoDAO::getAllByID(1);

            $Categorias = ProductoDAO::getAllCategoria();
            
            $Productos = ProductoDAO::getAllProductos();
            
            //Si el session de usuario existe entra
            if(isset($_SESSION['usuario'])){
                
                //En caso de que el Session de Carrito existe entra
                if(isset($_SESSION['Carrito'])){
                    //Si recibe un "validar" desde panel de carrito, quita el session de carrito
                    if(isset($_POST['validar'])){
                        unset($_SESSION['Carrito']);
                    }

                    //Si recibe un id de producto entra
                    if(isset($_POST['id'])){
                        //Crear el pedido con el producto encontrada de bbdd con el id pasado por parametro
                        $pedido = new Pedido(ProductoDAO::getProductByID($_POST['id']));
                        
                        //Añadir al array Carrito el pedido acaba de crear
                        array_push($_SESSION['Carrito'],$pedido);
                        array_push($_SESSION['CarritoCant'],$pedido);

                    }
                
                
                }else{
                    //En caso de carrito no existe crea el session de Carrito como array
                    $_SESSION['Carrito'] = array();
                    $_SESSION['CarritoCant'] = array();
                    
                }
                
            }
            
            //Incluir los paneles necesarios para mostrar por web
            include_once "View/header.php";
            include_once "View/home.php";
            include_once "View/footer.php";
            
             
        }


        /**
         * Mostrar el panel de Carta
         */
        public function shop(){
            //Inicar el session
            session_start();

            //En caso de que el Session de Carrito existe entra
            if(isset($_SESSION['usuario'])){
                //En caso de que el Session de Carrito existe entra
                if(isset($_SESSION['Carrito'])){
                    //Si recibe un "validar" desde panel de carrito, quita el session de carrito
                    if(isset($_POST['validar'])){
                        unset($_SESSION['Carrito']);
                    }
                    //Si recibe un id de producto entra
                    if(isset($_POST['id'])){
                        //Crear el pedido con el producto encontrada de bbdd con el id pasado por parametro
                        $pedido = new Pedido(ProductoDAO::getProductByID($_POST['id']));

                        //Añadir al array Carrito el pedido acaba de crear
                        array_push($_SESSION['Carrito'],$pedido);
                        array_push($_SESSION['CarritoCant'],$pedido);
                        
                    }
                    
                }else{
                    //En caso de carrito no existe crea el session de Carrito como array
                    $_SESSION['Carrito'] = array();
                    $_SESSION['CarritoCant'] = array();
                    
                }
                
            }


            //si existe en url categoriaId entra
            if(isset($_GET['categoriaId'])){
                //preparar un variable mostrando los productos con el categoria especifica pasado por url
                $Productos = ProductoDAO::getAllByID($_GET['categoriaId']);
            }else{
                //preparar un variable con todos los productos que hay en bbdd
                $Productos = ProductoDAO::getAllProductos();
            }

            //Preparado para parte de Productos Ultimos 
            $ProductosUltimos = ProductoDAO::getAllProductos();

            //Incluir los paneles para mostrar en el web
            include_once "View/header.php";
            include_once "View/carta.php";
            include_once "View/footer.php";
        }
        

        //Mostrar el panel de Carrito
        public function carrito(){

            //Iniciar el session
            session_start();
            $Productos = ProductoDAO::getAllProductos();

            $ingredientes = ingredientesDAO::getAllIngredientes();
            var_dump($ingredientes) ;
            //En caso de que el Session de Carrito existe entra
            if(isset($_SESSION['usuario'])){

                //En caso de que el Session de Carrito existe entra
                if(isset($_SESSION['Carrito'])){

                    //Si recibe un "validar" desde panel de carrito, quita el session de carrito
                    if(isset($_POST['validar'])){

                        //Si recibe un "validar" desde panel de carrito, quita el session de carrito
                        unset($_SESSION['Carrito']);
                    }
                    //Si recibe un id de producto entra
                    if(isset($_POST['id'])){
                        //Crear el pedido con el producto encontrada de bbdd con el id pasado por parametro
                        $pedido = new Pedido(ProductoDAO::getProductByID($_POST['id']));

                        //Añadir al array Carrito el pedido acaba de crear
                        array_push($_SESSION['Carrito'],$pedido);

                        
                    }
                    
                }else{
                    //En caso de carrito no existe crea el session de Carrito como array
                    $_SESSION['Carrito'] = array();
                    
                }
                
            }

            
            //Si recibe post de Add
            if (isset($_POST['Add'])){
                //El producto se va a añadir 1 basado el cantidad que existe ahora mismo en array de Carrito
                $pedido = $_SESSION['Carrito'][$_POST['Add']];
                $pedido->setCantidad($pedido->getCantidad()+1);

            }else if(isset($_POST['Del'])){
                //El producto se va a restar 1 basado el cantidad que existe ahora mismo en array de Carrito
                $pedido = $_SESSION['Carrito'][$_POST['Del']];
                //En caso de cantidad de producto esta en 1 y seguimos haciando Del
                if($pedido->getCantidad()==1){
                    //Borrar el producto desde Carrito
                    unset($_SESSION['Carrito'][$_POST['Del']]);
                    //Tenemos que re-indexar el array
                    $_SESSION['Carrito'] = array_values($_SESSION['Carrito']);
                }else{
                    //En caso de que cantidad de producto no sea 1 resta 1 de su cantidad 
                    $pedido->setCantidad($pedido->getCantidad()-1);
                }
            }

            //Incluir los paneles necesarios para mostrar al web
            include_once "View/header.php";
            include_once "View/carrito.php";
            include_once "View/footer.php";
        }


        //Eliminar un producto desde bbdd
        public function eliminar(){

            //Cuando recibe un producto_id entra
            if(isset($_POST['producto_id'])){
                //Configurar un variable con el producto_id recibido
                $producto_id = $_POST['producto_id'];

                //Eliminar el producto desde bbdd segun el producto_id recibido
                ProductoDAO::deleteProduct($producto_id);

                //Enviar a url 
                header("Location:".url."?controller=user&action=adminPanel");
            }else{
                //Enviar a url 
                header("Location:".url."?controller=user&action=adminPanel");
            }
        }

        public function actualizar(){
            if(isset($_POST['producto_id'])
            ){
                $producto_id = $_POST['producto_id'];
                $producto = ProductoDAO::getProductByID($producto_id);
                include_once "view/editarProductos.php";
            }else{
                header("Location:".url."?controller=producto");
            }
        }

        public function modificar(){

            if (isset($_POST['producto_id'])&
                isset($_POST['nombre'])&
                isset($_POST['descript'])&
                isset($_POST['descriptCorto'])&
                isset($_POST['precio'])&
                isset($_POST['imagen'])
                ){
                $producto_id = $_POST['producto_id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descript'];
                $imagen = $_POST['imagen'];
                $precio = $_POST['precio'];
                $descripcionCorto = $_POST['descriptCorto'];
                
                ProductoDAO::modificarProductos($producto_id, $nombre, $descripcion,$descripcionCorto, $imagen, $precio);
                header("Location:".url."?controller=producto");
            }else{
                header("Location:".url."?controller=producto");
            }
        }

        public function añadir(){
            include_once "View/añadirProductos.php";
        }

        public function agregar(){
            $producto_id = $_POST['producto_id'];
            $categoria_id = $_POST['categoria_id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descript'];
            $descripcionCorto = $_POST['descriptCorto'];
            $imagen = $_POST['imagen'];
            $precio = $_POST['precio'];
            ProductoDAO::añadirProductos($producto_id,$categoria_id,$nombre,$descripcion,$descripcionCorto, $imagen,$precio);
        }
    }

?>

