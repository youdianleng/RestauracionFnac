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

            }else if($_POST['accion'] == "getUsuario"){
                $usuario = $_POST['usuario'];
                $propinaDonada = $_POST['propinaDodat'];
                $usuarioEncontrada = valoracionDAO::getUsuarioToPropina($usuario);

                if(!$usuarioEncontrada){
                    valoracionDAO::setPropina($usuario,$propinaDonada);
                    return;
                }else{
                    valoracionDAO::updatePropina($usuario,$propinaDonada);
                    return;
                }
                
            }else if($_POST['accion'] == "FiltrarPorPrecio"){
                $precioFiltrado = $_POST["precioFiltrado"];
                $precioMostrarPrecioFiltrado = ProductoDAO::getProductosByPrecio($precioFiltrado);

                $preMostrarPrecioFiltrado = [];

                foreach ($precioMostrarPrecioFiltrado as $precioMostrarFiltrado){
                    $preMostrarPrecioFiltrado[] = [
                        "producto_id" => $precioMostrarFiltrado->getProdId(),
                        "imgProducto" => $precioMostrarFiltrado->getImagen(),
                        "descripcion" => $precioMostrarFiltrado->getDescripcion(),
                        "precio" => $precioMostrarFiltrado->getPrecio(),
                        "nombre_producto" => $precioMostrarFiltrado->getNombre(),
                        "tiempo_espera" => $precioMostrarFiltrado->getTiempo()
                    ];
                }

                echo json_encode($preMostrarPrecioFiltrado, JSON_UNESCAPED_UNICODE);
                return;

            }else if($_POST['accion'] == "getPropina"){
                $usuario = $_POST['usuario'];

                $puntoUsuario = valoracionDAO::getUsuarioToPropina($usuario);

                $ArrayPunto = [];
                foreach($puntoUsuario as $puntos){
                    $ArrayPunto[] = [
                        "puntosUsuarios" => $puntos->getPunto(),
                    ];
                }

                if($ArrayPunto){
                     // Devolver los datos en formato JSON
                    echo json_encode($ArrayPunto, JSON_UNESCAPED_UNICODE);
                    return;
                }else{
                    return null;
                }
            }else if($_POST['accion'] == "borrarPropina"){
                $usuario = $_POST['usuario'];

                $eliminarPropina = valoracionDAO::eliminarUsuarioPropina($usuario);
                
            }else if($_POST['accion'] == "mostrarReseñasEnProducto"){
                $producto_id = $_POST["prod_id"];

                
                $todosReseñaMostrarProducto = valoracionDAO::getResenyasProductos($producto_id);

                $arrayMostrarReseñasProducto = [];

                foreach ($todosReseñaMostrarProducto as $ReseñaMostrarProducto){
                    $arrayMostrarReseñasProducto[] = [
                        "Valoracion" => $ReseñaMostrarProducto->getValoracion(),
                        "Nombre" => $ReseñaMostrarProducto->getNombre(),
                        "Estrellas" => $ReseñaMostrarProducto->getEstrella()
                    ];
                }

                echo json_encode($arrayMostrarReseñasProducto, JSON_UNESCAPED_UNICODE);
                return;

            }
        }
        
    }

?>