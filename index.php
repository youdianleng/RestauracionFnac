<?php
//Productos
//Usaurio
//Pedidos
//Ingredientes
include_once "Controller/OrderController.php";
include_once "config/parameter.php";
    if(isset($_GET["controller"])){
        //If theres no sending controller redirect to home pages
        header("Location");
        
    }else{
        $Controlle_name = $_GET['controller'].'Controller';
        if(class_exists($Controlle_name)){
            echo "Realize a action about".$Controlle_name;
            //Watch if theres any action
            //if theres nothing show the default action
            $Controller = new OrderController();
            if(isset($_GET["action"]) && method_exists($Controller,$_GET["action"])){
                $action = $_GET["action"];
            }else{
                $action = "index";
            }

            $Controller->shop();
        }else{
            echo "Controller Name didnt exist";
        }
    }

?>