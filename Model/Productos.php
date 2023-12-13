<?php
include_once "Model/Categoria.php";
include_once "Model/Producto.php";
include_once "Model/Usuario.php";
include_once "Model/Pedidos.php";
include_once "Model/PedidoInfo.php";

//Clase para los productos
class productos extends Producto{
    public function __construct(){
        
    }
}


//Clase para los categorias
class categorias extends Categoria{
    public function __construct(){

    }
}

//Clase para los usuarios
class usuarios extends Usuario{
    public function __construct(){
    }
}

//Clase para los pedidos
class pedidos extends PedidosInfo{
    public function __construct(){
        
    }
}


?>