<html>
<head>
<link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/orderPanel.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <main>
        <div class="container">
                <table>
                    <tr>
                        <th>Producto_id</th>
                        <th>Categoria_id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                    </tr>
                    <?php
                    foreach ($allProductos as $producto){?>
                        <tr>
                            <td><?=$producto->getProdId()?></td>
                            <td><?=$producto->getCatId()?></td>
                            <td><?=$producto->getNombre()?></td>
                            <td><?=$producto->getDescripcion()?></td>
                            <td><?=$producto->getImagen()?></td>
                            <td><?=$producto->getPrecio()?></td>
                            <td>
                                <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                    <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                    <button type="Submit">Eliminar</button>
                                </form>
                            </td>
                            <td>
                                <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                                    <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                    <button type="Submit">Actualizar</button>
                                </form>
                            </td>
                            <td>
                                <form action=<?=url."?controller=producto&action=añadir"?> method="post">
                                    <button type="Submit">Añadir</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }?>
                    
                </table>
            </div>
    </main>
    
</body>
</html>