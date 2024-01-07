<?php
//Productos
//Usaurio
//Pedidos
//Ingredientes
include_once "Controller/ProductoController.php";
include_once "Controller/UserController.php";
include_once "Controller/PedidoController.php";
include_once "Controller/IngredienteController.php";
include_once "config/parameter.php";

    //Si existe el parametro controller en Url
    if(!isset($_GET["controller"])){
        //si en url no ha recibido el parametro Controller se redirecciona a ruta siguiente
        header("Location: ".url."?controller=producto");
        
    }else{
        //Si recibe el controller pues se une el parametro con Controller y guarda en un variable
        $Controlle_name = $_GET['controller'].'Controller';

        //Cuando el clase existe entra al if
        if(class_exists($Controlle_name)){
            
            //Crear un nueva variable con el clase de $Controlle_name
            $Controller = new $Controlle_name;
            
            //Si en Url existe un parametro action y que el clase de variable $Controller existe ese action entra
            if(isset($_GET["action"]) && method_exists($Controller,$_GET["action"])){
                //Guarda el $action con el valor de parametro action
                $action = $_GET["action"];
            }else{
                //Envia a un url prediseñada
                $action = default_action;
            }
            //Ejecutar el funcion de action que esta en clase asignada en $Controller
            $Controller->$action();
        }else{
            //Redireccionar al ruta siguiente
           header("Location:".url."?controller=producto");
        }
    }

?>