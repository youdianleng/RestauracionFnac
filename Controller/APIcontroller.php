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
            if ($_POST['accion'] == "consultaReseñas") { //Realizar el accion de obtener todos los resenyas guardados en bbdd
                //Buscar en bbdd los resenyas que existe
                $todosResenya = valoracionDAO::getResenyas();
                
                //Preparar un array
                $ArrayResenyas = [];

                //Guardar todos los informaciones encontrada en array
                //porque cuando nos devuelve de busqueda sera un Object y no podemos realizar json con tipo Object
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
            }else if($_POST['accion'] == "consultaReseñasEstrella"){ // Buscar todos los resenyas con el estrella pasado
                
                //Prepara un array para los estrellas
                $estreObtenido = [];

                //Guarda a dentro de array el estrella que nos pasa
                $estrella[] = $_POST['estrella'];

                //sacar el numero de estrella de post
                foreach($estrella as $estre){
                    $estreObtenido[] = $estre;
                }

                //BUscar todos los resenyas que coincide con el estrella
                $todosResenya = valoracionDAO::getResenyasByEstrella($estreObtenido);
                
                //Preparar un array para guardar los resenyas
                $ArrayResenyas = [];
                
                //Sacar los informaciones en array
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
            }else if($_POST['accion'] == "categoria"){ // Accion para buscar resenyas con categoria seleccionado
                //Obtener el id de categoria
                $cat_id = $_POST['selCategoria'];

                //Realizar la busqueda de categoria
                $todosResenya = valoracionDAO::getCategoriaResenya($cat_id);
                
                //Preparar el array para informaciones
                $ArrayResenyas = [];
                
                //Sacar los informaciones encontrada y guardarlo en array
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
            }else if($_POST['accion'] == "TodoCategoria"){ //Obtener todos los categorias

                //Obtener todos los categorias que hay en bbdd
                $todosCategoria = ProductoDAO::getAllCategoria();

                //Preparar array 
                $ArrayResenyas = [];

                //Sacar los informaciones que ha encontrado en busqueda y guardarlo en Array
                foreach ($todosCategoria as $categoria) {
                    $ArrayResenyas[] = [
                        "NombreCategoria" => $categoria->getNombreCat(),
                        "categoria_id" => $categoria->getCategoria_id()
                    ];
                }
        
                // Devolver los datos en formato JSON
                echo json_encode($ArrayResenyas, JSON_UNESCAPED_UNICODE);
                return;
            }else if($_POST['accion'] == "añadirValoracion"){ //Accion para insertar resenya a bbdd
                
                //Obtener los datos que necesitamos para insertar
                $producto = $_POST['producto'];
                $comentario = $_POST['comentario'];
                $estrella = $_POST['estrella'];
                $usuario = $_POST['usuario'];
                
                //Pasamos los parametro para realizar la insertacion de resenya
                valoracionDAO::setValoracionProducto($producto,$comentario,$estrella,$usuario);

            }else if($_POST['accion'] == "getUsuario"){ //Obtener el usuario para aplicar su propina como punto

                //Obtenemos los datos necesarios para realizar accion
                $usuario = $_POST['usuario'];
                $propinaDonada = $_POST['propinaDodat'];

                //Realizar el busque da usuario
                $usuarioEncontrada = valoracionDAO::getUsuarioToPropina($usuario);

                //Si no encuentra
                if(!$usuarioEncontrada){
                    //Aplicar al usuario el punto de propina que ha dado este vez
                    valoracionDAO::setPropina($usuario,$propinaDonada);
                    return;
                }else{//Si encuentra
                    //Sumar el punto que hay de usuario
                    valoracionDAO::updatePropina($usuario,$propinaDonada);
                    return;
                }
                
            }else if($_POST['accion'] == "FiltrarPorPrecio"){ //Realziar el accion de filtrar productos por precio

                //Obtenemos el precio que ha filtrado
                $precioFiltrado = $_POST["precioFiltrado"];

                //Realizar la busqueda de productos que tenga menos precio que parametro
                $precioMostrarPrecioFiltrado = ProductoDAO::getProductosByPrecio($precioFiltrado);

                //Preparar un array
                $preMostrarPrecioFiltrado = [];

                //Guardar todos los informaciones sacado en array
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

                //Convertirlo en json y devuelve el dato
                echo json_encode($preMostrarPrecioFiltrado, JSON_UNESCAPED_UNICODE);
                return;

            }else if($_POST['accion'] == "getPropina"){ //Obtener el propina de usuario

                //Obtenemos el usuario_id
                $usuario = $_POST['usuario'];

                //Buscar el punto de usuario depende de id pasado
                $puntoUsuario = valoracionDAO::getUsuarioToPropina($usuario);

                //Preparar el array 
                $ArrayPunto = [];

                //Guardar los informaciones sacado en array
                foreach($puntoUsuario as $puntos){
                    $ArrayPunto[] = [
                        "puntosUsuarios" => $puntos->getPunto(),
                    ];
                }

                //Encaso de el usuario si tiene punto
                if($ArrayPunto){
                     // Devolver los datos en formato JSON
                    echo json_encode($ArrayPunto, JSON_UNESCAPED_UNICODE);
                    return;
                }else{ // En caso que usuario no tiene punto
                    return null;
                }
            }else if($_POST['accion'] == "borrarPropina"){ // Borrar los propinas de usuario
                //Obtenemos el id de usuario y punto de usuario
                $usuario = $_POST['usuario'];   
                $puntosUsaUsuario = $_POST['puntosUsuarioUsa'];

                //realizar el operacion de buscar en bbdd el usuario y eliminar el punto que ha gastado
                $eliminarPropina = valoracionDAO::actualizarUsuarioPropina($usuario,$puntosUsaUsuario);
                
            }else if($_POST['accion'] == "mostrarReseñasEnProducto"){ //Mostrar los resenyas segun el producto

                //Obtenemos el producto id
                $producto_id = $_POST["prod_id"];

                //Buscamos en resenyas todos los que tenga el id de producto
                $todosReseñaMostrarProducto = valoracionDAO::getResenyasProductos($producto_id);

                //Preparar el array
                $arrayMostrarReseñasProducto = [];

                //Guardar en array todos los informaciones sacado
                foreach ($todosReseñaMostrarProducto as $ReseñaMostrarProducto){
                    $arrayMostrarReseñasProducto[] = [
                        "Valoracion" => $ReseñaMostrarProducto->getValoracion(),
                        "Nombre" => $ReseñaMostrarProducto->getNombre(),
                        "Estrellas" => $ReseñaMostrarProducto->getEstrella()
                    ];
                }

                //Devuelve el array de forma Json
                echo json_encode($arrayMostrarReseñasProducto, JSON_UNESCAPED_UNICODE);
                return;

            }else if($_POST['accion'] == "categoriasSeleccionados"){ //Buscar los productos segun el categoria
                //Obtenemos el categoria que tenemos que buscar
                $categoriaSelect = $_POST['categoriaFiltrado'];

                //Buscamos en bbdd los categorias que coincide
                $productosByCategoria = ValoracionDAO::getProductoByCategoria($categoriaSelect);

                //Prepara un array
                $arrayMostrarProductoCategoria = [];

                //Guardar en array todos los informaciones que hemos sacado
                foreach ($productosByCategoria as $productoByCategoria){
                    $arrayMostrarProductoCategoria[] = [
                        "producto_id" => $productoByCategoria->getProdId(),
                        "Nombre" => $productoByCategoria->getNombre(),
                        "Descripcion" => $productoByCategoria->getDescripcion(),
                        "Imagen" => $productoByCategoria->getImagen(),
                        "Precio" => $productoByCategoria->getPrecio(),
                        "Tiempo" => $productoByCategoria->getTiempo(),
                    ];
                }

                //Devuelve los datos de array com Json
                echo json_encode($arrayMostrarProductoCategoria, JSON_UNESCAPED_UNICODE);
                return;

            }
        }
        
    }

?>