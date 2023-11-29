<html>
<head>
    <link rel="stylesheet" href="Css/carritoCss.css">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/home.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="container">
        <table border="1px">
            <th>Id</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Precio Total</th>
            <?php 
            $pos = 0;
                 foreach($_SESSION['selecciones'] as $productosCarritos){?>
                    <tr>
                    <td><?= $productosCarritos->getProducto()->getProdId()?></td>
                    <td><?= $productosCarritos->getProducto()->getCatId()?></td>
                    <td><?= $productosCarritos->getProducto()->getNombre()?></td>
                    <td><?= $productosCarritos->getProducto()->getDescripcion()?></td>
                    <td><?= $productosCarritos->getProducto()->getDescripcionCorto()?></td>
                    <td><img src="<?= $productosCarritos->getProducto()->getImagen()?>" style='max-height: 100px'></td>
                    <td><?= $productosCarritos->getProducto()->getPrecio()?></td>
                    <td><?= $productosCarritos->getPrecioTotal()?></td>
                    
                    <!-- Añadir un boton añadir o eliminar productos -->
                    <form action=<?= url."?controller=producto&action=carrito" ?> method="post">
                        <td><button class="bet-button w3-black w3-section" type="submit" name="Add" value=<?=$pos?>>+</button></td>
                        <td><button class="bet-button w3-black w3-section" type="submit" name="Del" value=<?=$pos?>>-</button></td>
                    </form>
                    </tr>
                    
                <?php $pos++; }?>
        
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>PRECIO FINAL PEDIDO</td>
                <td><?=CalculadoraPrecios::calculadorPrecioPedido($_SESSION['selecciones']) ?></td>
                <form action=<?= url."?controller=producto&action=confirmar"?> method="post">
                    <td><button class="bet-button w3-black w3-section" type="submit">CONFIRMAR</button></td>
                </form>
                <td></td>
            </tr>
        </table>
        <div class="prueba">
            1
        </div>
    </div>
</body>
</html>