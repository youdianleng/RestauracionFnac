<?php
    include_once "Model/Productos.php";
    include_once "Model/ProductoDAO.php";
    include_once "config/DB.php";
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
            //echo 'index';
            $allProductos = ProductoDAO::getAllByID(7);
            $Categorias = CategoriaDAO::getAllCategories();
            include_once "View/carrito.php";
        }

        public function shop(){
            include_once "View/product.php";
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
                isset($_POST['precio'])
                ){
    
                $producto_id = $_POST['producto_id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descript'];
                $precio = $_POST['precio'];
                
                ProductoDAO::modificarProductos($producto_id, $nombre, $descripcion, $precio);
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
            $precio = $_POST['precio'];
            ProductoDAO::añadirProductos($producto_id,$categoria_id,$nombre,$descripcion,$precio);
        }
    }

?>

