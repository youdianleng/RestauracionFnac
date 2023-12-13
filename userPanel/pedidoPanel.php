<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Cabecera comun de mis paginas web">
    <meta lang="es">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/pedidoPanel.css" rel="stylesheet" type="text/css" media="screen">
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
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="col-12 mt-5">
                        <table >
                            <th>Tu Ultimo Pedido:</th>
                            <?php 
                            if($pedidos != null && isset($_COOKIE['UltimoPedido'])){ 
                                $pedido_id = PedidoDAO::PedidoActual($_SESSION['usuario']->getCliente_id());
                                foreach($pedido_id as $pedidoid){
                                    $pedido = $pedidoid->getPedido_id();
                                }?>
                                    <tr>
                                        <td><?=$pedido?></td>
                                    </tr>
                            <?php }?>
                            <?php 
                            if($pedidos != null && isset($_COOKIE['UltimoPedido'])){ 
                                foreach($ProdUltima as $UltimoMandado){?>
                                    <th class="col-3">Producto</th>
                                    <th class="col-3">Descripcion</th>
                                    <th class="col-3">Precio</th>
                                    <th class="col-3">Cantidad</th>
                                    <tr>
                                        <td><?=$UltimoMandado->getProducto()->getNombre()?></td>
                                        <td><?=$UltimoMandado->getProducto()->getDescripcionCorto()?></td>
                                        <td><?=$UltimoMandado->getProducto()->getPrecio()?></td>
                                        <td><?=$UltimoMandado->getCantidad()?></td>
                                    </tr>
                            <?php }
                            }?>
                            </table>
                            
                            
                        </div>
                    </div>
                    <div class="col-6  boxInformacion d-flex pb-5">
                        <div class="col-12 mt-5">
                            <table >
                                    <th class="col-3">Pedido id</th>
                                    <th class="col-3">Precio Total</th>
                                    <th class="col-3">Fecha Pedido</th>
                                    <th class="col-3">Control</th>
                                    <?php 
                                    if($pedidos != null){
                                        foreach($pedidos as $pedido){?>
                                            
                                                <tr>
                                                    <td><?=$pedido->getPedido_id()?></td>
                                                    <td><?=$pedido->getPrecio_total()?></td>
                                                    <td><?=substr($pedido->getPedido_TIme(), 0, 10);?></td>
                                                    <td class="d-flex justify-content-center">
                                                    <form action="<?=url."?controller=user&action=productoPedidoPanel"?>" class="ps-1" method="post">
                                                        <input hidden name="pedidoUser" value="<?=$pedido->getPedido_id()?>">     
                                                        <button class="btn btn-dark" type="submit">Ver Pedido</button>
                                                    </form>
                                                    <form action="<?=url."?controller=pedido&action=eliminarPedidoEspecificado"?>" class="ps-1" method="post">   
                                                        <input hidden name="pedidoUser" value="<?=$pedido->getPedido_id()?>">     
                                                        <input hidden name="user" value="<?=$_SESSION['usuario']->getCliente_id()?>"> 
                                                        <button class="btn btn-dark" type="submit">Cancelar</button>
                                                    </form>
                                                    </td>
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