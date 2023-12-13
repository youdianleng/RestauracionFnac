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
        <div class="col-12 d-flex justify-content-center backgroundGrey ">
            <div class="row mb-5" >
                <div class="col-12 mt-5">
                    <H2 class="miInformacion">MI INFORMACIÓN PEDIDOS</H2>
                <section class="marginSelector noMarginBottom ">
                <ul class="tabList ">
                    <li>
                        <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                    </li>
                    <li>
                        <a href="<?=url."?controller=user&action=pedidoPanel"?>" class="text-decoration-none">Mis Pedidos</a>
                    </li>
                </ul>
                <h2 class="mt-4 ">MIS PEDIDOS</h2>
                <div class="col-12 mt-5 bg-white">
                    <div class="col-6  boxInformacion d-flex pb-5">
                        <div class="col-12 mt-5">
                            <table >
                                    <th class="col-3">Producto</th>
                                    <th class="col-3">Precio</th>
                                    <th class="col-3">Descripcion</th>
                                    <?php 
                                    if(isset($productoEncontrada) && $productoEncontrada != null){
                                        foreach($productoEncontrada as $pedidoProductos){?>
                                            
                                                <tr>
                                                    <td><?=$pedidoProductos->getNombre()?></td>
                                                    <td><?=$pedidoProductos->getPrecio()?></td>
                                                    <td><?=$pedidoProductos->getDescripcionCorto();?></td>
                                                </tr>
                                            
                                    <?php }
                                            }?>
                            </table>       
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