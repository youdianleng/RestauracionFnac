<!DOCTYPE html>
<html>
<head>
    <meta lang="es">
    <meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Es el sitio donde muestra los productos segun los categorias que elige">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/cartaCss.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 pb-5" >
                <div class="textosCabecera">
                    <div class="categoria araboto-normal">
                        <p>Home > Carta</p>
                    </div>
                    <div class="carta mt-2 araboto-light txt27">
                        <p>CARTAS</p>
                    </div>
                </div>
            </div>

            <div class="col-8 d-flex justify-content-between align-items-center border pt-2 pb-2">
                <div class="textosCabecera">
                    <div class="carta">
                        <p>CARTAS</p>
                    </div>
                </div>
                <div class="ordenar">
                    <p>ordenar por</p>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-around align-items-center border ">
                <div class="relev">
                    <p>Relevancia</p>
                </div>
                    
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center border">
                <div class="mosaico">
                    <p>Mosaico</p>
                </div>
            </div>

        
            <div class="row">
            <?php foreach($Productos as $producto){?>
                <div class="row">
                <div class="col-12 border-bottom d-flex align-items-center pb-4 pt-4">
                <div class="col-12 row">
                    <div class="col-md-3 col-sm-12 d-flex justify-content-center ">
                        <img src="<?=$producto->getImagen()?>" style="width: 250px; height: px;">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p class="txt15"><?=$producto->getNombre()?></p>
                        <p class="txt13">Humo Restaurant</p>
                        <p class="txt12 mt-1"><?=$producto->getDescripcion()?></p>
                        <div class="d-flex justify-content-end txt13 pt-1">
                            <a href="#"><u>Ver Productos</u></a>
                        </div>
                        
                        <div class="col-12 cajaDescripcion d-flex">
                            <div class="col-6 descripcionSub1 d-flex ps-4 pt-2 pb-5">
                                <div class="col-6">
                                        <p class="pt-1">Tipo</p>
                                        <p class="pt-3">Restaurante</p>
                                        <p class="pt-3">Horario</p>
                                        <p class="pt-3">Valoracion</p>
                                </div>
                                <div class="col-6 negrita">
                                        <p class="pt-1">Carne Vaca</p>
                                        <p class="pt-3">Humo Restaurante</p>
                                        <p class="pt-3">8AM - 16PM</p>
                                        <p class="pt-3">4.5/5</p>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-12 descripcionSub2">
                                        <div class="text ms-3 mt-3">
                                            <p class="txt15 verde">Disponible en Tienda</p>
                                            <p class="txt13 negro">Barcelona Sant</p>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text ms-3 mt-3">
                                            <p class="txt15 verde">Disponible en Tienda</p>
                                            <p class="txt13 negro">Barcelona Sant</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 d-flex justify-content-center">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end align-items-end txt24 fw-bold" style="color: #DD1E35;">
                                <p><?=$producto->getPrecio()?>€</p>
                            </div>
                            <div class="col-12 d-grid gap-2 col-12" style="max-height: 40px;">
                                <form action="<?= url . "?controller=producto&action=index" ?>" method="POST" class="col-12">
                                    <div class="d-grid gap-2 col-12 mx-auto">
                                        <input hidden name="id" value="<?= $producto->getProdId() ?>">
                                        <button class="btn btn-primary" type="Submit">Añadir a Cesta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            <?php } ?>
            </div>
            <div class="col-12 greyColor d-flex justify-content-center bordeBottom">
                <div class="row ">
                    <div class="col-12 d-flex justify-content-center mt-2 mb-1 txt12">
                            <p>Has visto <?=count($Productos)?> del <?=count($Productos)?></p>
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-1s mb-3 txt15">
                        <div class="d-grid gap-2 col-12 mx-auto ">
                            <input class="btn btn-dark ps-5 pe-5" type="button" value="Ver Mas">
                        </div>
                    </div>                  
                </div>  
            </div>


            <div class="col-12 cajaUltimoProductos">
                <div class="texto ms-5 ps-4 mt-3 mb-3">
                    <h2>Ultimos Productos</h2>
                </div>
                <div class="d-flex">
                    <div class="col-2 borderSolid">
                        <div class="card">
                            <img src="Materiales/Productos/ramen.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-grid gap-2 col-12 mx-auto ">
                                    <input class="btn btn-primary" type="button" value="Input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 borderSolid">
                        <div class="card">
                            <img src="Materiales/Productos/ramen.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-grid gap-2 col-12 mx-auto ">
                                    <input class="btn btn-primary" type="button" value="Input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 borderSolid">
                        <div class="card">
                            <img src="Materiales/Productos/ramen.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-grid gap-2 col-12 mx-auto ">
                                    <input class="btn btn-primary" type="button" value="Input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 borderSolid">
                        <div class="card">
                            <img src="Materiales/Productos/ramen.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-grid gap-2 col-12 mx-auto ">
                                    <input class="btn btn-primary" type="button" value="Input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 borderSolid">
                        <div class="card">
                            <img src="Materiales/Productos/ramen.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-grid gap-2 col-12 mx-auto ">
                                    <input class="btn btn-primary" type="button" value="Input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 borderSolid">
                        <div class="card">
                            <img src="Materiales/Productos/ramen.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <ul class="list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-grid gap-2 col-12 mx-auto ">
                                    <input class="btn btn-primary" type="button" value="Input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>