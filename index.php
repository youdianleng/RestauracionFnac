<?php
//Productos
//Usaurio
//Pedidos
//Ingredientes
include_once "Controller/ProductoController.php";
include_once "config/parameter.php";
    if(!isset($_GET["controller"])){
        //If theres no sending controller redirect to home pages
        header("Location: ".url."?controller=index");
        
    }else{
        $Controlle_name = $_GET['controller'];
        if($Controlle_name == true){
            echo "Realize a action about".$Controlle_name;
            //Watch if theres any action
            //if theres nothing show the default action
            $Controller = new ProductoController();
            if(isset($_GET["action"]) && method_exists($Controller,$_GET["action"])){
                $action = $_GET["action"];
            }else{
                //header("Location: ".default_action);
            }
        }else{
            //header("Location: ".default_action);
        }
    }

?>