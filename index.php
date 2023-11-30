<?php
//Productos
//Usaurio
//Pedidos
//Ingredientes
include_once "Controller/ProductoController.php";
include_once "Controller/UserController.php";
include_once "config/parameter.php";
    if(!isset($_GET["controller"])){
        //If theres no sending controller redirect to home pages
        header("Location: ".url."?controller=producto");
        
    }else{
        $Controlle_name = $_GET['controller'].'Controller';
        if(class_exists($Controlle_name)){
            //echo "Realize a action about".$Controlle_name;
            //Watch if theres any action
            //if theres nothing show the default action
            $Controller = new $Controlle_name;
            
            if(isset($_GET["action"]) && method_exists($Controller,$_GET["action"])){
                $action = $_GET["action"];
            }else{
                $action = default_action;
            }
            $Controller->$action();
        }else{
           header("Location:".url."?controller=producto");
        }
    }

?>