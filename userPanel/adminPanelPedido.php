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
            <div class="row mb-5 col-12" >
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
                                <img src="Materiales/productoIndividual/redirigeAdmin/ProductoGestion.svg">
                                <div class="gestionProducto txt15 fw700 ps-2 black">Gestionar Productos</div>
                            </a>
                            
                        </div>
                        <div class="col-12 d-flex boton efectSelect mt-2">
                            <a class="d-flex align-items-center" href="<?=url."?controller=user&action=panelCliente"?>">
                                <img src="Materiales/productoIndividual/redirigeAdmin/UsuarioCliente.svg">
                                <div class="gestionProducto txt15 fw700 ps-2 black">Gestionar Clientes</div>
                            </a>
                        </div>
                        <div class="col-12 d-flex boton efectSelect mt-2" >
                            <a class="d-flex align-items-center" href="<?=url."?controller=user&action=panelPedidos"?>">
                                <svg width="30px" height="30px">
                                    <image href="Materiales/productoIndividual/redirigeAdmin/NegroPaquete.svg" width="30px" height="30px"></image>
                                </svg>
                                <div class="gestionProducto txt15 fw700 ps-2 black">Gestionar Pedidos</div>
                            </a>
                        </div>
                        <div class="col-12 d-flex boton efectSelect mt-2" >
                            <a class="d-flex align-items-center" href="<?=url."?controller=user&action=panelResenyas"?>">
                                <img src="Materiales/productoIndividual/redirigeAdmin/clasificacion.svg">
                                <div class="gestionProducto txt15 fw700 ps-2 black">Ver Resenyas</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-10">

                    
                    <div class="col-12 boxAdministradormMain row">
                        <div class="col-12 boxAdministradorm">
                        <h2>Pedidos Realizados</h2>
                            <div class="col-12 d-flex">
                                <div class="row col-12">
                                <?php foreach ($Pedidos as $Pedido){?>
                                <div class="col-3">
                                    <div class="card col-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Cliente: <?=$Pedido->getCliente_id()?></h5>
                                        </div>
                                        <ul class="list-group list-group-flush noBorderBottom">
                                            <li class="list-group-item"><span class="fw-bold">Pedido ID:</span> <?=$Pedido->getPedido_id()?></li>
                                            <li class="list-group-item"><span class="fw-bold">Precio Pedido:</span> <?=$Pedido->getPrecio_total()?>€</li>
                                            <li class="list-group-item">
                                                <p class="fw-bold noMarginBottom">Fecha Realizado:</p>
                                                <?=substr($Pedido->getPedido_Time(), 0, 19)?>
                                            </li>
                                        </ul>
                                        <div class="card-body col-12">
                                            <!-- Crear un formulario que llama al productoController y en funcion Eliminar cuando clica al boton -->
                                            <form action=<?=url."?controller=Pedido&action=eliminarPedidoEspecificado"?> method="post">
                                                <!-- Cuando envia se para el nombre producto_id y su valor como post -->
                                                <input type="number" name="pedidoUser" value="<?=$Pedido->getPedido_id()?>" hidden>
                                                <button class="btn" type="Submit">Eliminar</button>
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