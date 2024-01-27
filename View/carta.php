<!DOCTYPE html>
<html>
<head>
    <meta lang="es">
    <meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Es el sitio donde muestra los productos segun los categorias que elige">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/cartaCss.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColors.css" rel="stylesheet" type="text/css" media="screen">
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
                <div class="ordenar d-flex">
                    <div class="dropdown-center d-flex align-items-center">
                        <p>Ordenar Por</p>
                        <button class="btn dropdown-toggle btn-Ordenar" data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu" id="dropDownMenu">

                        </ul>
                    </div>
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
                <section>
                    <?php foreach($Productos as $producto){?>
                        <div class="row">
                        <article>
                            <div class="col-12 border-bottom d-flex align-items-center pb-4 pt-4">
                                <div class="col-12 row">
                                    <div class="col-lg-3 col-md-12 d-flex justify-content-center ">
                                            <img class="mt-4" src="<?=$producto->getImagen()?>" style="width: 250px; height: 200px;" alt="<?=$producto->getDescripcion()?>">
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="txt15 araboto-normal"><?=$producto->getNombre()?></p>
                                            <p class="txt13 ">Humo Restaurant</p>
                                            <p class="txt12 mt-1"><?=$producto->getDescripcion()?></p>
                                            <div class="d-flex justify-content-end txt13 pt-1">
                                                <a href="<?=url."?controller=Producto&&action=productoPanel&prod_id=".$producto->getProdId()?>"><u>Ver Productos</u></a>
                                            </div>
                                            
                                            <div class="col-12 cajaDescripcion d-flex">
                                                <div class="col-6 descripcionSub1 d-flex ps-4 pt-2 pb-5">
                                                    <div class="col-6 shadowLetra">
                                                            <p class="pt-1 specialp">Tipo</p>
                                                            <p class="pt-3 specialp">Restaurante</p>
                                                            <p class="pt-3 specialp">Horario</p>
                                                            <p class="pt-3 specialp">Valoracion</p>
                                                    </div>
                                                    <div class="col-6 negrita pb-3">
                                                            <p class="pt-1 specialp">Carne Vaca</p>
                                                            <p class="pt-3 specialp">Humo</p>
                                                            <p class="pt-3 specialp">8AM - 16PM</p>
                                                            <p class="pt-3 specialp">4.5/5</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-flex justify-content-center">
                                                    <div class="row col-12">
                                                        <div class="col-12 descripcionSub2">
                                                            <div class="text ms-3 mt-3">
                                                                <p class="txt15 verde">Disponible en Tienda</p>
                                                                <p class="txt13 negro">Barcelona Sant</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="text ms-3 mt-3">
                                                                <p class="txt15 verde">Disponible comer en Restaurante</p>
                                                                <p class="txt13 negro">Tiempo de Espera: <?=$producto->getTiempo()?> min</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 d-flex justify-content-center">
                                            <div class="row col-12 col-lg-10">
                                                <div class="col-12 d-flex justify-content-end align-items-end txt24 fw-bold" style="color: #DD1E35;">
                                                    <p class="pb-3 normalPrecio"><?=$producto->getPrecio()?>€</p>
                                                </div>
                                                <div class="col-12 d-grid gap-2" style="max-height: 40px;">
                                                    <form action="<?= url . "?controller=producto&action=shop" ?>" method="POST" class="col-12">
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
                            </article>
                        </div>
                    <?php } ?>
                </section>
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
                <?php foreach($ProductosUltimos as $productoUlt){ ?>
                    <div class="col-4 col-md-2 borderSolid">
                        <div class="card">
                            <img src="<?=$productoUlt->getImagen()?>" class="card-img-top" alt="Ramen, comida tipica de Japan">
                            <div class="card-body ms-3">
                                <h5 class="ultiProd card-title "><?=$productoUlt->getNombre()?></h5>
                                <p class="ultiProdDesc card-text shadowLetra2"><?=$productoUlt->getDescripcionCorto()?></p>
                            </div>
                            <ul class="list-group-flush mt-5 araboto-normal ">
                                    <li class="ultiProdPrec list-group-item fw-bold"><?=$productoUlt->getPrecio() ?>€</li>
                                </ul>
                                <div class="d-flex justify-content-start card-body">
                                    <form action="<?= url . "?controller=producto&action=index" ?>" method="POST" class="col-12">
                                        <div class="d-grid gap-2 col-11 mx-auto">
                                            <input hidden name="id" value="<?= $productoUlt->getProdId() ?>">
                                            <button class="UltimoBtnWidth btn btn-primary" type="Submit">Añadir a Cesta</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

              

</body>
<script src="js/cartaOrdenar.js"></script>
</html>