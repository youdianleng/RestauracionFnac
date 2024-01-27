<?php
include_once "Model/Productos.php";
include_once "Model/ProductoDAO.php";
include_once "config/DB.php";
include_once "Model/Pedidos.php";
include_once "Utils/CalculadoraPrecios.php";
include_once "Model/Categoria.php";
include_once "Model/PedidoDAO.php";
include_once "Model/IngredienteDAO.php";
include_once "Model/ValoracionDAO.php";


    class APIController{    
    
        public function api() {
            if ($_POST['accion'] == "consultaReseñas") {
                $todosResenya = valoracionDAO::getResenyas();
        
                $ArrayResenyas = [];
                foreach ($todosResenya as $resenya) {
                    $ArrayResenyas[] = [
                        "user_id" => $resenya->getApellido(),
                        "prod_Nombre" => $resenya->getNombre(),
                        "prod_id" => $resenya->getProducto_id(),
                        "valoracion" => $resenya->getValoracion(),
                        "estrella" => $resenya->getEstrella()
                    ];
                }
        
                // Devolver los datos en formato JSON
                echo json_encode($ArrayResenyas, JSON_UNESCAPED_UNICODE);
                return;
            }else if($_POST['accion'] == "consultaReseñasEstrella"){
                $estreObtenido = [];
                $estrella[] = $_POST['estrella'];
                foreach($estrella as $estre){
                    $estreObtenido[] = $estre;
                }

                $todosResenya = valoracionDAO::getResenyasByEstrella($estreObtenido);
        
                $ArrayResenyas = [];
        
                foreach ($todosResenya as $resenya) {
                    $ArrayResenyas[] = [
                        "user_id" => $resenya->getApellido(),
                        "prod_Nombre" => $resenya->getNombre(),
                        "prod_id" => $resenya->getProducto_id(),
                        "valoracion" => $resenya->getValoracion(),
                        "estrella" => $resenya->getEstrella()
                    ];
                }
                // Devolver los datos en formato JSON
                echo json_encode($ArrayResenyas, JSON_UNESCAPED_UNICODE);
                return;
            }else if($_POST['accion'] == "categoria"){
                $cat_id = $_POST['selCategoria'];
                $todosResenya = valoracionDAO::getCategoriaResenya($cat_id);
        
                $ArrayResenyas = [];
        
                foreach ($todosResenya as $resenya) {
                    $ArrayResenyas[] = [
                        "user_id" => $resenya->getCliente_id(),
                        "prod_id" => $resenya->getProducto_id(),
                        "valoracion" => $resenya->getValoracion(),
                        "estrella" => $resenya->getEstrella()
                    ];
                }
        
                // Devolver los datos en formato JSON
                echo json_encode($ArrayResenyas, JSON_UNESCAPED_UNICODE);
                return;
            }else if($_POST['accion'] == "TodoCategoria"){
                $todosCategoria = ProductoDAO::getAllCategoria();

                $ArrayResenyas = [];

                foreach ($todosCategoria as $categoria) {
                    $ArrayResenyas[] = [
                        "NombreCategoria" => $categoria->getNombre(),
                        "categoria_id" => $categoria->getCategoria_id()
                    ];
                }
        
                // Devolver los datos en formato JSON
                echo json_encode($ArrayResenyas, JSON_UNESCAPED_UNICODE);
                return;
            }else if($_POST['accion'] == "añadirValoracion"){
                
                $producto = $_POST['producto'];
                $comentario = $_POST['comentario'];
                $estrella = $_POST['estrella'];
                $usuario = $_POST['usuario'];

                valoracionDAO::setValoracionProducto($producto,$comentario,$estrella,$usuario);

            }else if($_POST['accion'] == "aplicarPropina"){
                $usuraio = $_POST['user_id'];
                $propina = $_POST['propina'];
                valoracionDAO::setPropina($usuraio,$propina);

            }else if($_POST['accion'] == "getUsuario"){
                $usuraio = $_POST['user_id'];
                $usuarioEncontrada = valoracionDAO::getUsuarioToPropina($usuraio);

                $devuelveUsuario = $usuarioEncontrada;
                echo json_encode($devuelveUsuario, JSON_UNESCAPED_UNICODE);
                return;
                
            }
        }
        
    }

?>