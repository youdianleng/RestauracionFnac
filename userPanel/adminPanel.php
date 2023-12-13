<html>
<head>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/adminPanel.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <main>
        <div class="container">
        <div class="col-12 d-flex justify-content-center backgroundGrey ">
            <div class="row mb-5" >
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
                <h2 class="mt-4 ">MIS INFORMACIONES</h2>
                <div class="col-12 mt-5 bg-white">
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="col-12 mt-5 pb-5">
                            <table >
                                <tr>
                                    <th class="col-1">Producto_id</th>
                                    <th class="col-1">Categoria_id</th>
                                    <th class="col-2">Nombre</th>
                                    <th class="col-4">Descripcion</th>
                                    <th class="col-1">Precio</th>
                                </tr>
                                <?php
                                foreach ($Productos as $producto){?>
                                    <tr>
                                        <td><?=$producto->getProdId()?></td>
                                        <td><?=$producto->getCatId()?></td>
                                        <td><?=$producto->getNombre()?></td>
                                        <td><?=$producto->getDescripcion()?></td>
                                        <td><?=$producto->getPrecio()?></td>
                                        <td class="d-flex align-items-center">
                                            <!-- Crear un formulario que llama al productoController y en funcion Eliminar cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                                <button class="btn btn-dark ms-4" type="Submit">Eliminar</button>
                                            </form>
                                            <!-- Crear un formulario que llama al productoController y en funcion Actualizar cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                                <button class="btn btn-dark ms-4" type="Submit">Actualizar</button>
                                            </form>
                                            <!-- Crear un formulario que llama al productoController y en funcion Añadir cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=añadir"?> method="post">
                                                <button class="btn btn-dark ms-4" type="Submit">Añadir</button>
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
</main>
</body>
</html>