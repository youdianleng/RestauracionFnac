<html>
<head>
    <link rel="stylesheet" href="Css/carritoCss.css">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/home.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="container">
        <div class="row rowCarrito">
            <div class="col-12 d-flex justify-content-center mt-5 carritoCol12">
                <div class="col-7">
                    <h2>Cesta <span class="txt13"><?php
                        if(isset($_SESSION['Carrito'])){
                            echo count($_SESSION['Carrito']);
                        }
                    ?> productos</span> </h2>
                    <div class="pt-5">
                        <p>Vendido Por Fnac</p>
                    </div>
                    
                    <?php 
                    if(isset($_SESSION['Carrito'],$_SESSION['usuario'])){
                        $pos = 0;
                        foreach($_SESSION['Carrito'] as $productosCarrito){  
                           ?>
                        <div class="row backgroundGrey pb-2" style="margin-top: 50px;">
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="<? echo $productosCarrito->getProducto()->getImagen()?>" style="width: 180px;">
                            </div>
                            <div class="col-4 pt-4">
                                <p class="txt15"><?= $productosCarrito->getProducto()->getNombre()?></p>
                                <p class="txt13"><?= $productosCarrito->getProducto()->getDescripcionCorto()?></p>
                                <p class="txt13">Tiempo de Espera: 15min</p>
                            </div>
                            <div class="col-4 pe-5 pt-4 align-left">
                                <p class="txt21 txtRed"><strong><?= $productosCarrito->getProducto()->getPrecio()?>€</strong></p>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="col-3 border d-flex justify-content-start">
                                        <form class="d-flex justify-content-center" action=<?= url."?controller=producto&action=carrito" ?> method="post">
                                        <td><button style="border: none;" type="submit" name="Del" value=<?=$pos?>>-</button></td>
                                            <p class="me-2 ms-2"><?php
                                                $cantidadProducto = $productosCarrito->getCantidad();
                                                if($cantidadProducto != null){
                                                    echo $productosCarrito->getCantidad();
                                                }else{
                                                    echo "0";
                                                }
                                                
                                                
                                            ?></p>
                                        <td><button style="border: none;" type="submit" name="Add" value=<?=$pos?>>+</button></td>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <div class="col-4 txt13 decoracionCarrito">
                                        <a href="#">Eliminar</a>
                                    </div>
                                    <div class="col-1 border-right"></div>
                                    <div class="col-8 txt13 decoracionCarrito">
                                        <a href="#">Guardar para Luego</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $pos++; }}?>
                     
                </div>
                
                <div class="col-3 mt-1 ms-5">
                    <h2 class="pb-3 ms-5"> <span class="txt21">Resumen</span></h2>
                    <div class="col-12 mt-3 backgroundGrey ms-4 pb-3 pe-3">
                        <p class="ms-4 pt-2 mb-3">¿Tienes un codigo de descuento?</p>
                        <div class="d-flex">
                            <input type="text" class="ms-4 col-8" placeholder="Introduce tu codigo de descuento">
                            <button type="submit" class="ms-2 col-3 radiusBorder">Validar</button>
                        </div>
                    </div>
                    
                        <div class="col-12 mt-4 backgroundGrey ms-4 d-flex justify-content-center">
                            <div class="col-10">
                                <div class="col-12 d-flex justify-content-between">
                                        <p class="ms-4 mt-5">Cesta<span>(<?php
                                            if(isset($_SESSION['Carrito'])){
                                                echo count($_SESSION['Carrito']);
                                            }
                                        ?>)</span></p>
                                        <p class="me-4 mt-5 mb-5 fw-bold txt14 txtRed"><?php 
                                            if(isset($_SESSION['Carrito'])){
                                                echo CalculadoraPrecios::calculadorPrecioPedido($_SESSION['Carrito']) ;
                                            }
                                        ?>€</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between mt-3">
                                        <p class="ms-4 txt18">Total <span class="txtIva">(IVA INCLUIDO)</span></p>
                                        <p class="me-4 fw-bold txtRed "><?php 
                                                if(isset($_SESSION['Carrito'])){
                                                echo CalculadoraPrecios::calculadorPrecioPedido($_SESSION['Carrito']) ;
                                            } ?>€</p>
                                </div>  
                                <form action="<?=url."?controller=pedido&&action=añadirPedido"?>" method="POST">
                                    <input  name="Cliente_id" value="<?php 
                                        if(isset($_SESSION['usuario'] ) && ($_SESSION['Carrito']) != null){
                                            echo $_SESSION['usuario']->getCliente_id();
                                        }
                                    ?>">
                                    <input hidden  name="PrecioTotal" value="<?php 
                                        if(isset($_SESSION['usuario']) && ($_SESSION['Carrito']) != null){
                                            echo CalculadoraPrecios::calculadorPrecioPedido($_SESSION['Carrito']);
                                        } ?>">
                                        <div class="d-grid gap-2 col-11 mx-auto mt-2 pb-4">
                                        <button class="btn btn-primary" type="submit">Finalizar la Compra</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <div class="col-12 mt-2 backgroundGrey ms-4 mt-5">
                    <div class="col-12 d-flex justify-content-between">
                                <p class="ms-4 mt-3">ACEPTAMOS</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 d-flex justify-content-center">
                <div class="col-7 mt-5">
                    <h2>También te Gustaria...</h2>
                    <div class="col-12 d-flex">
                    <?php foreach($Productos as $productos){ }?>
                    <?php for($productos = 0; $productos < count($Productos); $productos++){
                            if($productos < 4){?>
                    <div class="card" >
                        <img src="Materiales/Productos/sushi.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$Productos[$productos]->getNombre()?></h5>
                            <p class="card-text"><?= $Productos[$productos]->getDescripcionCorto()?></p>
                            <p class="card-text"><?= $Productos[$productos]->getPrecio()?></p>
                            <form action="<?= url . "?controller=producto&action=index" ?>" method="POST" class="col-12">
                                <div class="d-grid gap-2 col-11 mx-auto">
                                    <input hidden name="id" value="<?=$Productos[$productos]->getProdId()?>">
                                    <button class="btn btn-primary" type="Submit">Añadir a Cesta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php  }else{
                                break;
                            } 
                        }?>
                    </div>
                </div>
                <div class="col-3 ms-5">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>

