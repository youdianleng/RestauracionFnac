<html>
<head>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/adminPanel.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <main>
        <div class="container">
        <div class="col-12 d-flex justify-content-center backgroundGrey ">
            <div class="row mb-5 " >
            <div class="boxInformacionTotal">
                <div class="col-12 mt-5">
                    <H2 class="miInformacion">MIS INFORMACIONES</H2>
                <section class="marginSelector noMarginBottom ">
                <ul class="tabList">
                    <li>
                        <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                    </li>
                    <li>
                        <a href="<?=url."?controller=user&action=pedidoPanel"?>" class="text-decoration-none"></a>
                    </li>
                </ul>
                <div class="col-12 mt-5">
                    <h2>Productos</h2>
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="col-12 pb-5">
                            <table >
                                <tr>
                                    <th class="col-1">Categoria_id</th>
                                    <th class="col-1">Producto_id</th>  
                                    <th class="col-2">Nombre</th>
                                    <th class="col-3">Descripcion</th>
                                    <th class="col-3">Precio</th>
                                    <th class="col-3">Precio</th>
                                </tr>
                                <?php
                                //Este es para sacar todos los productos que hay actualmente en sistema guardada
                                //Aqui es para que el admin pueda realizar control sobre Actualizar, Modificar o añadir nuevas productos
                                foreach ($Productos as $producto){?>
                                    <tr class="pedidoColor">
                                        <td class="col-1"><?=$producto->getCatId()?></td>
                                        <td class="col-1"><?=$producto->getProdId()?></td>
                                        <td class="col-2"><?=$producto->getNombre()?></td>
                                        <td class="col-3"><?=$producto->getDescripcion()?></td>
                                        <td class="col-3"><?=$producto->getPrecio()?></td>
                                        <td class="colWidth d-flex justify-content-between align-items-center col-3">
                                            <!-- Crear un formulario que llama al productoController y en funcion Eliminar cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                                <button class="btn " type="Submit">Eliminar</button>
                                            </form>
                                            <!-- Crear un formulario que llama al productoController y en funcion Actualizar cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                                <button class="btn" type="Submit">Actualizar</button>
                                            </form>
                                            <!-- Crear un formulario que llama al productoController y en funcion Añadir cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=añadir"?> method="post">
                                                <button class="btn " type="Submit">Añadir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }?>
                            </table>   
                        </div>
                    </div>

                    <h2>Clientes</h2>
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="col-12 pb-5">
                            <table >
                                <tr>
                                    <th class="col-1">Cliente_id</th>
                                    <th class="col-1">Nombre</th>  
                                    <th class="col-2">Apellido</th>
                                    <th class="col-3">Mail</th>
                                    <th class="col-3">Contrasenya</th>
                                    <th class="col-3">Control</th>
                                </tr>
                                <?php
                                //Aqui esta todos los usuarios que estan a dentro de sistema registrado
                                //Aqui es para que el admin pueda realizar control de eliminar el usuario
                                foreach ($Usuarios as $Usuario){?>
                                    <tr class="pedidoColor">
                                        <td class="col-1"><?=$Usuario->getCliente_id()?></td>
                                        <td class="col-1"><?=$Usuario->getNombre()?></td>
                                        <td class="col-2"><?=$Usuario->getApellido()?></td>
                                        <td class="col-3"><?=$Usuario->getMail()?></td>
                                        <td class="col-3"><?=$Usuario->getContrasenya()?></td>
                                        <td class="colWidth col-3">
                                            <!-- Crear un formulario que llama al productoController y en funcion Eliminar cuando clica al boton -->
                                            <form action=<?=url."?controller=user&action=eliminarUsusario"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="cliente_id" value="<?=$Usuario->getCliente_id()?>" hidden>
                                                <input type="number" name="admin_id" value="<?=$Usuario->getCliente_id()?>" hidden>
                                                <button class="btn" type="Submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }?>
                            </table>   
                        </div>
                    </div>

                    <h2>Clientes</h2>
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="col-12 pb-5">
                            <table >
                                <tr>
                                    <th class="col-2">Cliente_id</th>
                                    <th class="col-2">Pedido_id</th>  
                                    <th class="col-2">Precio_Total</th>
                                    <th class="col-3">Pedido_Time</th>
                                    <th class="col-3">Control</th>
                                </tr>
                                <?php
                                //Aqui esta todos los usuarios que estan a dentro de sistema registrado
                                //Aqui es para que el admin pueda realizar control de eliminar el usuario
                                foreach ($Pedidos as $Pedido){?>
                                    <tr class="pedidoColor">
                                        <td class="col-2"><?=$Pedido->getCliente_id()?></td>
                                        <td class="col-2"><?=$Pedido->getPedido_id()?></td>
                                        <td class="col-2"><?=$Pedido->getPrecio_total()?></td>
                                        <td class="col-3"><?=$Pedido->getPedido_Time()?></td>
                                        <td class="colWidth col-3">
                                            <!-- Crear un formulario que llama al productoController y en funcion Eliminar cuando clica al boton -->
                                            <form action=<?=url."?controller=Pedido&action=eliminarPedidoEspecificado"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="pedidoUser" value="<?=$Pedido->getPedido_id()?>" hidden>
                                                <button class="btn" type="Submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
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
</main>
</body>
</html>