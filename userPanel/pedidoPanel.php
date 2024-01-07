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
        <div class="col-12 backgroundGrey pb-3 ">
            <div class="row mb-5" >
            <div class="boxInformacionTotal">
                <div class="col-12 mt-5 boxWidth">
                <H2 class="miInformacion">MI INFORMACIÓN PEDIDOS</H2>
                <section class="marginSelector noMarginBottom ">
                <ul class="tabList d-flex">
                    <li class="col-6">
                        <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                    </li>
                    <li class="col-6">
                        <a href="<?=url."?controller=user&action=pedidoPanel"?>" class="text-decoration-none">Mis Pedidos</a>
                    </li>
                </ul>

                <div class="col-12 mt-2">
               
                    <div class="col-12  boxInformacion">
                        <div class="col-12 mt-5">
                        <table >
                            <th>Tu Ultimo Pedido:</th>
                            <?php 
                            //Cuadno el $pedidos no sea nulo y que el Cookie UltimoPedido existe entra
                            //Este parte es para mostrar el ultimo pedido hecho a dentro de 1 hora
                            if($pedidos != null && isset($_COOKIE['UltimoPedido'])){ 
                                $pedido = $_COOKIE['UltimoPedido'];
                                
                                ?>
                                    <tr class="pedidoColor">
                                        <td><?=$pedido?></td>
                                    </tr>
                            <?php }?>
                            <?php 
                            //Cuadno el $pedidos no sea nulo y que el Cookie UltimoPedido existe entra
                            //Aqui es para mostrar los informaciones de los productos que esta en ese pedido
                            if($pedidos != null && isset($_COOKIE['UltimoPedido'])){ ?>
                                <th class="col-3">Producto</th>
                                    <th class="col-3">Descripcion</th>
                                    <th class="col-3">Precio</th>
                                    <th class="col-3">Cantidad</th>
                            <?php
                                //Hacer un bucle de los productos que hay en pedido encontrada
                                foreach($ProdUltima as $UltimoMandado){?>
                                
                                    
                                    <tr class="pedidoColor">
                                        <td class="col-3"><?=$UltimoMandado->getProducto()->getNombre()?></td>
                                        <td class="col-3"><?=$UltimoMandado->getProducto()->getDescripcionCorto()?></td>
                                        <td class="col-3"><?=$UltimoMandado->getProducto()->getPrecio()?></td>
                                        <td class="col-3"><?=$UltimoMandado->getCantidad()?></td>
                                    </tr>
                            <?php }
                            }?>
                            </table>
                            
                            
                        </div>
                    </div>
                    
                    <div class="col-12  boxInformacion d-flex pb-5">
                        <div class="col-12 mt-5">
                            <table class="col-12">
                                    <th class="col-3">Pedido id</th>
                                    <th class="col-2">Precio Total</th>
                                    <th class="col-3">Fecha Pedido</th>
                                    <th class="col-2">Tiempo de Espera</th>
                                    <th class="col-2">Control</th>
                                    <?php 
                                    //En $pedidos esta todos los pedidos de usuario
                                    //Si el pedido no esta en nulo entra
                                    if($pedidos != null){
                                        //hacer un bucle para sacar los pedidos en individual
                                        foreach($pedidos as $pedido){?>
                                                
                                                <tr class="pedidoColor">
                                                    <td class="col-3"><?=$pedido->getPedido_id()?></td>
                                                    <td class="col-2"><?=$pedido->getPrecio_total()?></td>
                                                    <td class="col-3"><?=substr($pedido->getPedido_TIme(), 0, 10);?></td>
                                                    <td class="col-2"><?php echo $TiempoEstimado;?></td>
                                                    <td class="col-2">
                                                    <form action="<?=url."?controller=user&action=productoPedidoPanel"?>" class="ps-1" method="post">
                                                        <input hidden name="pedidoUser" value="<?=$pedido->getPedido_id()?>">     
                                                        <button class="btn" type="submit">Ver</button>
                                                    </form>
                                                    <form action="<?=url."?controller=pedido&action=eliminarPedidoEspecificado"?>" class="ps-1" method="post">   
                                                        <input hidden name="pedidoUser" value="<?=$pedido->getPedido_id()?>">     
                                                        <input hidden name="user" value="<?=$_SESSION['usuario']->getCliente_id()?>"> 
                                                        <button class="btn" type="submit">Cancelar</button>
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
    </div>
</body>
</html>