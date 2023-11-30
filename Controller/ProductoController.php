<?php
    include_once "Model/Productos.php";
    include_once "Model/ProductoDAO.php";
    include_once "config/DB.php";
    include_once "Model/Pedidos.php";
    include_once "Utils/CalculadoraPrecios.php";
    include_once "Model/Categoria.php";
    class productoController{
        public function header(){
            echo "header";
        }

        public function panel(){
            echo "panel";
        }

        public function footer(){
            echo "footer";
        }

        public function index(){
            
            session_start();
            //echo 'index';
            $allProductos = ProductoDAO::getAllByID(7);

            $Categorias = ProductoDAO::getAllCategoria();
            
            $Productos = ProductoDAO::getAllProductos();

            if(!isset($_SESSION['selecciones'])){
                $_SESSION['selecciones'] = array();
            }else{
                if(isset($_POST['id'])){
                    $pedido = new Pedido(ProductoDAO::getProductByID($_POST['id']));
                    array_push($_SESSION['selecciones'],$pedido);
                }
            }
            
            include_once "View/header.php";
            include_once "View/home.php";
            
             
        }

        public function PanelMod(){
            session_start();
            $allProductos = ProductoDAO::getAllByID(7);

            $Categorias = ProductoDAO::getAllCategoria();
            
            $Productos = ProductoDAO::getAllProductos();
            include "View/trashCan.php";
            include "View/OrderPanelPhp.php";
        }

        public function shop(){
            session_start();
            if(isset($_GET['categoriaId'])){
                $Productos = ProductoDAO::getAllByID($_GET['categoriaId']);
            }else{
                $Productos = ProductoDAO::getAllProductos();
            }


            include_once "View/header.php";
            include_once "View/carta.php";
        }
        
        public function carrito(){
            session_start();

            

            $allProductos = ProductoDAO::getAllByID(7);

            $Categorias = ProductoDAO::getAllCategoria();
            
            $Productos = ProductoDAO::getAllProductos();

            
            if (isset($_POST['Add'])){
                //Añadimos dia
                $pedido = $_SESSION['selecciones'][$_POST['Add']];
                $pedido->setCantidad($pedido->getCantidad()+1);
            }else if(isset($_POST['Del'])){
                $pedido = $_SESSION['selecciones'][$_POST['Del']];
                if($pedido->getCantidad()==1){
                    unset($_SESSION['selecciones'][$_POST['Del']]);
                    //Tenemos que re-indexar el array
                    $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
                }else{
                    $pedido->setCantidad($pedido->getCantidad()-1);
                }
            }
            include_once "View/header.php";
            include_once "View/carrito.php";
        }

        public function eliminar(){
            if(isset($_POST['producto_id'])){
                $producto_id = $_POST['producto_id'];
                ProductoDAO::deleteProduct($producto_id);
                header("Location:".url."?controller=producto");
            }else{
                header("Location:".url."?controller=producto");
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

