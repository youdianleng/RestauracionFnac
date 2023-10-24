<?php
    include_once "Model/Productos.php";
    include_once "Model/ProductoDAO.php";
    include_once "config/DB.php";
    class PedidoController{
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
            $Productos = ProductoDAO::getAllProducts();
            $ProductosMenssage = ProductoDAO::sendMenssage();
            $Categorias = CategoriaDAO::getAllCategories();
              foreach($Categorias as $categoria){
                echo "<tr>";
                        echo "<caption>".$categoria->getNombre()."</caption>";
                echo "</tr>";
              }
              foreach($Productos as $producto){
                    echo "<tr>";
                        echo "<td>".$producto->getProdId()."</td>".
                        "<td>".$producto->getCatId()."</td>".
                        "<td>".$producto->getNombre()."</td>".
                        "<td>".$producto->getDescripcion()."</td>".
                        "<td>".$producto->getPrecio()."</td>".
                        "<td>"."<form method=post>
                            $ProductosMenssage
                            <input type='submit' value='Enviar' name='Enviar'>
                            <input type='submit' value='Devolver' name='Devolver'>
                        </form>"."</td>";
                    echo "</tr>";
              }
            

        }

        public function shop(){
            echo "shop";
        }
    }

?>

