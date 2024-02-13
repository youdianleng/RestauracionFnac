<html>
<head>
    <link rel="stylesheet" href="Css/carritoCss.css">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/carritoCss.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColores.css" rel="stylesheet" type="text/css" media="screen">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row rowCarrito">
            <div class="col-12 d-flex justify-content-center mt-5 carritoCol12">
                <div class="col-md-12 row justify-content-center">
                <div class="col-lg-7 ">
                    <div class="col-md-12 row">
                    <h2>Cesta <span class="txt13"><?php
                        //si el session de carrito existe
                        if(isset($_SESSION['Carrito'])){
                            //Muestra el numero contado de los contenidos en carrito
                            echo count($_SESSION['Carrito']);
                        }
                    ?> productos</span> </h2>
                    <div class="pt-5">
                        <p>Vendido Por Fnac</p>
                    </div>
                    
                    <?php 
                    //Cuando el session de carrito y usuario existe entra
                    if(isset($_SESSION['Carrito'],$_SESSION['usuario'])){
                        $pos = 0;
                        //hacer un bucle de carrito para sacar los contenidos de forma individual
                        foreach($_SESSION['Carrito'] as $productosCarrito){  ?>
                        <div class="row backgroundGrey pb-2" style="margin-top: 50px;">
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img src="<?= $productosCarrito->getProducto()->getImagen()?>" style="width: 180px;" alt="<?= $productosCarrito->getProducto()->getDescripcion()?>">
                            </div>
                            <div class="col-4 pt-4">
                                <p class="txt15"><?= $productosCarrito->getProducto()->getNombre()?></p>
                                <p class="txt13"><?= $productosCarrito->getProducto()->getDescripcionCorto()?></p>
                                <p class="txt13">
                                    <?php 
                                    //EN caso de que el producto que esta en carrito contiene ingredientes muestra
                                    if($productosCarrito->getIngredientes() != null) { 
                                        echo "Ingredientes: ";?>
                                        <?php 
                                        //Ingredientes guardada en producto es un array y tenemos que separalo
                                        foreach($productosCarrito->getIngredientes() as $ingProd){ ?>
                                            <?php 
                                                //Realizar el busqueda de $ingProd que contiene el id de ingrediente
                                                $ingredienteInfo = ingredientesDAO::getIngredientesById($ingProd);

                                                //Mostrar el nombre de ingrediente
                                                echo $ingredienteInfo->getNombre();

                                            ?>
                                        <?php  }?>
                                    <?php } ?>
                                </p>
                                <p class="txt13 verdeClaro">Tiempo de Espera: <?=$productosCarrito->getProducto()->getTiempo()?>min</p>
                            </div>
                            <div class="col-4 pe-5 pt-4 align-left">
                                <p class="txt21 txtRed"><strong><?= $productosCarrito->getProducto()->getPrecio()?>€</strong></p>
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="col-3  d-flex justify-content-start">
                                        <form class="d-flex border justify-content-center" action=<?= url."?controller=producto&action=carrito" ?> method="post">
                                        <td><button style="border: none;" type="submit" name="Del" value=<?=$pos?>>-</button></td>
                                            <p class="me-2 ms-2"><?php
                                                $cantidadProducto = $productosCarrito->getCantidad();
                                                //Cuando el catidad de producto no sea null muestra
                                                if($cantidadProducto != null){
                                                    echo $productosCarrito->getCantidad();
                                                }else{
                                                //En caso que carrito no contienen nada muestra 0 como precio
                                                    echo "0";
                                                }
                                                
                                                
                                            ?></p>
                                        <td><button style="border: none;" type="submit" name="Add" value=<?=$pos?>>+</button></td>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <div class="col-12 txt13 decoracionCarrito">
                                        <button type="button" id="btnModal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-ProdId="<?= $productosCarrito->getProducto()->getProdId()?>">INGREDIENTES</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $pos++; }}?>
                        </div>
                </div>
                
                <div class="col-lg-3 mt-1 ms-5 boxNoneMargin">
                    <div class="col-md-12 row ">
                    <h2 class="pb-3 ms-5 boxNoneMargin boxResumen"> <span class="txt21 ">Resumen</span></h2>
                    <div class="col-12 mt-3 backgroundGrey pb-3 pe-3 codigoText boxCodigo">
                        <p class="ms-4 pt-2 mb-3 ">¿Tienes un codigo de descuento?</p>
                        <div class="d-flex">
                            <input type="text" class="ms-4 col-8" placeholder="Introduce tu codigo de descuento">
                            <button type="submit" class="ms-2 col-3 radiusBorder">Validar</button>
                        </div>
                    </div>
                    
                        <div class="col-12 mt-4 backgroundGrey ms-4 d-flex justify-content-center boxNoneMargin">
                            <div class="col-lg-10 col-12 ">
                                <div class="col-12 d-flex justify-content-between codigoText">
                                        <p class="ms-4 mt-5">Cesta<span class="txtCountCarrito">(<?php
                                            //Si el carrito existe entra
                                            if(isset($_SESSION['Carrito'])){
                                                //muestra el resultado contado de carrito el total de productos que hay
                                                echo count($_SESSION['Carrito']);
                                            }
                                        ?>)</span></p>
                                        <p class="me-4 mt-5 mb-5 fw-bold txt14 txtRed"><?php 
                                            //Si existe el carrito entra
                                            if(isset($_SESSION['Carrito'])){
                                                //Realizar un calculo de los precio de los productos que hay en carrito y muestra
                                                echo CalculadoraPrecios::calculadorPrecioPedido($_SESSION['Carrito']) ;
                                            }
                                        ?>€</p>
                                </div>
                                <div class="row" id="zonaAplicarPuntos">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <p class="ms-4">Aplicar tus Puntos?</p>
                                    <label class="switch me-4">
                                        <input type="checkbox" id="aplicarPuntos">
                                        <span class="slider"></span>
                                    </label>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between mt-3 codigoText">
                                        <p class="ms-4 mb-4 txt18">TOTAL <span class="txtIva">(IVA INCLUIDO)</span></p>
                                        <p class="me-4 fw-bold txtRed " id="precioConIva"><?php 
                                                //Si existe el carrito entra
                                                if(isset($_SESSION['Carrito'])){
                                                //Realizar un calculo de precio de pedidos pero con IVA
                                                echo CalculadoraPrecios::calculadorPrecioPedidoConIVA($_SESSION['Carrito']) ;
                                            } ?>€</p>
                                </div>  
                                <form action="<?=url."?controller=pedido&&action=añadirPedido"?>" method="POST">
                                    <input hidden name="Cliente_id" value="<?php 
                                        //Si existe usuario y que el carrito contiene productos
                                        if(isset($_SESSION['usuario'] ) && ($_SESSION['Carrito']) != null){
                                            echo $_SESSION['usuario']->getCliente_id();
                                        }
                                    ?>">
                                    <input hidden id="precioTotal" name="PrecioTotal" value="<?php 
                                        //Si existe usuario y que el carrito contiene productos
                                        if(isset($_SESSION['usuario']) && ($_SESSION['Carrito']) != null){
                                            echo CalculadoraPrecios::calculadorPrecioPedidoConIVA($_SESSION['Carrito']) ;
                                        } ?>">
                                    
                                        <div class="d-grid gap-2 col-11 mx-auto mt-2 pb-4">
                                        <button class="btn btn-primary" id="finalizarCompra" onclick="aplicarPunto()" type="submit">Finalizar la Compra</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <div class="col-12 mt-2 backgroundGrey imgAcept mt-3">
                        <div class="col-12 d-flex justify-content-between aceptamos" id="propina">
                            <input id="verificarCarrito" value="<?=count($_SESSION['Carrito'])?>" hidden>
                            <input id="UsuarioActual" value="<?=$_SESSION['usuario']->getCliente_id()?>" hidden>
                            
                        </div>
                    </div>
                    <div class="col-12 mt-2 backgroundGrey imgAcept mt-3">
                        <div class="col-12 d-flex justify-content-between aceptamos">
                                <img src="Materiales/CarritoIcono/Aceptamos.png" alt="Aceptamos pagamiento de Bizum, MasterCard y Transferencia">
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>


            <div class="col-12 d-flex justify-content-center boxUltimo mb-5">
                <div class="col-lg-7 mt-5">
                    <h2>También te Gustaria...</h2>
                    <div class="col-lg-12 d-flex ">
                    <?php 
                    //realizar un bucle de productos contando todos los productos que hay
                    for($productos = 0; $productos < count($Productos); $productos++){
                            //Si el $productos sea menos de 4 entra
                            if($productos < 4){?>
                    <div class="card" >
                        <img src="<?=$Productos[$productos]->getImagen()?>" style="height:200px; width:200px;" class="card-img-top" alt="<?=$Productos[$productos]->getDescripcion()?>">
                        <div class="card-body">
                            <h5 class="card-title"><?=$Productos[$productos]->getNombre()?></h5>
                            <p class="card-text pt-2"><?= $Productos[$productos]->getDescripcionCorto()?></p>
                            <p class="card-text txtRed fw-bold pt-2 pb-3"><?= $Productos[$productos]->getPrecio()?>€</p>
                            <form onsubmit="return validarFormulario();" action="<?= url . "?controller=producto&action=index" ?>" method="POST" class="col-12">
                                <div class="d-grid gap-2 col-11 mx-auto">
                                    <input hidden name="id" value="<?=$Productos[$productos]->getProdId()?>">
                                    <input hidden name="carrito" value="Carrito">
                                    <button class="btn btn-primary" type="submit">Añadir a Cesta</button>
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



    
    <!-- Modal para Ingredientes-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir Ingredientes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                <table>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                <form action="<?=url."?controller=producto&&action=carrito"?>" method="POST">
                    <input hidden name="id" id="id" >
                    <?php 
                    //hacer un bucle de todos los ingredientes que hay en session (Que estan todos los Ingredientes de BBDD)
                    foreach($_SESSION['Ingredientes'] as $ingre){ ?>
                            <tr>
                                <td><?=$ingre->getIngredientes()->getNombre();?></td>
                                <td><?=$ingre->getIngredientes()->getDescripcion();?></td>
                                <td><?=$ingre->getIngredientes()->getPrecio();?></td>
                                <td>
                                    <input name="ingredienteSelect[]" type="checkbox" value="<?=$ingre->getIngredientes()->getIngredientes_id();?>"></input>
                                </td>
                            </tr>
                    <?php } ?>
                </table>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
</body>

<!-- Es una script para pasar los productoId de producto seleccionado para poder añadir ingredientes en el -->
<script>
    //Cuando clicas al botton de btnModal ejecutar el funcion
    $(document).on("click", "#btnModal", function () {
    //asignar el proId al id que queremos pasar.
    let prodId = $(this).data("prodid");
    
    //En el input de modal que tiene el "name" id tendra el id de prodId
    $("#id").val(prodId);

    
})
</script>
<script src="js/carrito.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</html>

