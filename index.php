<?php
//Productos
//Usaurio
//Pedidos
//Ingredientes
include_once "Controller/ProductoController.php";
include_once "config/parameter.php";
    if(!isset($_GET["controller"])){
        //If theres no sending controller redirect to home pages
        header("Location: ".url."?controller=Pedido");
        
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
            
        }else{
           header("Location:".default_action."?controller=Pedido");
        }
    }

?>

<html>

<head>

</head>


<body>
    <table border=1 style="text-align: center;">
        <tr>
            <th>Producto_id</th>
            <th>Categoria_id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>
        <?php $Controller->index(); ?>
    </table>
</body>
</html>