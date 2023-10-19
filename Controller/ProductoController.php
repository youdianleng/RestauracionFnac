<?php
    include_once 'Model/Peli.php';
    include_once "Model/Game.php";
    include_once "Model/ProductoDAO.php";
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
           $games = ProductoDAO::getAllProducts();
              foreach($games as $game){
                     echo $game->getNombre();
              }

        }

        public function shop(){
            echo "shop";
        }
    }

?>