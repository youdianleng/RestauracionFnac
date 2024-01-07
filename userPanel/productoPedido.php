<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Cabecera comun de mis paginas web">
    <meta lang="es">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/productoPedido.css" rel="stylesheet" type="text/css" media="screen">
</head> 
<body>
    <div class="container">
        <div class="col-12 backgroundGrey ">
            <div class="row mb-5" >
            <div class="boxInformacionTotal">
                <div class="col-12 mt-5 boxWidth">
                    <H2 class="miInformacion">MI INFORMACIÓN PEDIDOS</H2>
                <section class="marginSelector noMarginBottom ">
                <ul class="tabList d-flex ">
                    <li class="col-6">
                        <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                    </li>
                    <li class="col-6">
                        <a href="<?=url."?controller=user&action=pedidoPanel"?>" class="text-decoration-none">Mis Pedidos</a>
                    </li>
                </ul>
                <div class="col-12 mt-5">
                    
                        <div class="col-6  boxInformacion d-flex pb-5">
                            <div class="col-12 mt-5 ">
                                <table >
                                        <th class="col-3">Producto</th>
                                        <th class="col-2">Precio</th>
                                        <th class="col-3">Descripcion</th>
                                        <th class="col-2">Cantidad</th>
                                        <th class="col-2">Tiempo Necesario</th>
                                        <?php 
                                        //Si se ha encontrado productos en el pedido entra
                                        if(isset($productoEncontrada) && $productoEncontrada != null){
                                            //realizar el bucle para que los conetnidos sean individuales
                                            foreach($productoEncontrada as $pedidoProductos){?>
                                                
                                                    <tr class="pedidoColor">
                                                        <td class="col-3"><?=$pedidoProductos->getProducto()->getNombre()?></td>
                                                        <td class="col-2"><?=$pedidoProductos->getProducto()->getPrecio()?></td>
                                                        <td class="col-3"><?=$pedidoProductos->getProducto()->getDescripcionCorto()?></td>
                                                        <td class="col-2"><?=$pedidoProductos->getCantidad()?></td>
                                                        <td class="col-2"><?=$pedidoProductos->getProducto()->getTiempo() * $pedidoProductos->getCantidad()?></td>
                                                    </tr>
                                                
                                        <?php }
                                                }?>
                                </table>       
                                <div class="col-12 d-flex justify-content-end mt-4 ">
                                    <a href="<?=url."?controller=user&action=pedidoPanel"?>" class="text-decoration-none"><button class="btn btn-dark  ">VOLVER</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>