<?php
    include_once('Model/Peli.php');
    include_once("Model/Game.php");
    class ProductoController{
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
            ProductoDAO::getAllProducts();
            echo "asdfasdsadas";
        }

        public function shop(){
            echo "shop";
        }
    }

?>