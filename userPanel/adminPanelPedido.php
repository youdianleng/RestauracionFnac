<html>
<head>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/adminPanel.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColores.css" rel="stylesheet" type="text/css" media="screen">
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


                <div class="col-12 d-flex ">
                    <div class="col-2 cajaRedirige">
                        <div class="col-12 d-flex boton efectSelect mt-2">
                            <a class="d-flex align-items-center " href="<?=url."?controller=user&action=adminPanel"?>">
                                <img src="Materiales/productosIndividual/redirigeAdmin/ProductoGestion.svg">
                                <div class="gestionProducto txt13 fw700 ps-2 black">Gestionar Productos</div>
                            </a>
                            
                        </div>
                        <div class="col-12 d-flex boton efectSelect mt-2">
                            <a class="d-flex align-items-center" href="<?=url."?controller=user&action=panelCliente"?>">
                                <img src="Materiales/productosIndividual/redirigeAdmin/UsuarioCliente.svg">
                                <div class="gestionProducto txt13 fw700 ps-2 black">Gestionar Clientes</div>
                            </a>
                        </div>
                        <div class="col-12 d-flex boton efectSelect mt-2" >
                            <a class="d-flex align-items-center" href="<?=url."?controller=user&action=panelPedidos"?>">
                                <img src="Materiales/productosIndividual/redirigeAdmin/NegroPaquete.svg">
                                <div class="gestionProducto txt13 fw700 ps-2 black">Gestionar Pedidos</div>
                            </a>
                        </div>
                        <div class="col-12 d-flex boton efectSelect mt-2" >
                            <a class="d-flex align-items-center" href="<?=url."?controller=user&action=panelResenyas"?>">
                                <img src="Materiales/productosIndividual/redirigeAdmin/NegroPaquete.svg">
                                <div class="gestionProducto txt13 fw700 ps-2 black">Ver Resenyas</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-10">

                    
                    <div class="col-12 boxAdministradormMain row">
                        <div class="mainBoxAñadir col-12 d-flex justify-content-end">
                            <div class="col-3 añadirProducto mt-3">
                                <form action=<?=url."?controller=producto&action=añadir"?> method="post">
                                    <button class="btn btn-primary col-12">Añadir</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 boxAdministradorm">
                        <h2>Productos</h2>
                            <div class="col-12 d-flex">
                                <div class="row">
                                <?php foreach ($Productos as $producto){?>
                                <div class="col-3">
                                    <div class="card col-12">
                                        <img src="Materiales/Productos/sushi.png" class="card-img-top" alt="..." height="100%" width="100%">
                                        <div class="card-body">
                                            <h5 class="card-title"><?=$producto->getNombre()?></h5>
                                        </div>
                                        <ul class="list-group list-group-flush noBorderBottom">
                                            <li class="list-group-item">Producto ID: <?=$producto->getProdId()?></li>
                                            <li class="list-group-item">Categoria ID: <?=$producto->getCatId()?></li>
                                            <li class="list-group-item">
                                                <p class="fw-bold noMarginBottom">Descripcion:</p>
                                                <?=$producto->getDescripcion()?>
                                            </li>
                                        </ul>
                                        <div class="card-body col-12">
                                            <!-- Crear un formulario que llama al productoController y en funcion Actualizar cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=actualizar"?>  method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                                <button class="btn btn-primary col-5 me-3">Modificar</button>
                                            </form>
                                            <!-- Crear un formulario que llama al productoController y en funcion Eliminar cuando clica al boton -->
                                            <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="producto_id" value="<?=$producto->getProdId()?>" hidden>
                                                <button class="btn btn-primary col-5 me-3">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>

</main>
</body>
<script src="js/adminPanel.js"></script>
</html>