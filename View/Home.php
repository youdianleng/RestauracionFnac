<html>
<head>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/home.css" rel="stylesheet" type="text/css" media="screen">
    

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 marginNone" >
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div style="background-image: url('Materiales/restaurant.png'); min-height: 270px; background-repeat: no-repeat; background-size: cover; background-position: bottom; " alt="Foto de restaurante que permite reservar">
                            <div class="d-flex align-items-end justify-content-center buttonBox">
                                <div class="d-grid gap-2 col-3 mx-auto">
                                    <input class="btn mb-5" type="button" value="Reserva">
                                </div>
                            </div>     
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div style="background-image: url('Materiales/restaurant.png'); min-height: 270px; background-repeat: no-repeat; background-size: cover; background-position: bottom; " alt="Foto de restaurante que permite reservar">
                            <div class="d-flex align-items-end justify-content-center buttonBox">
                                <div class="d-grid gap-2 col-3 mx-auto">
                                    <input class="btn  mb-5" type="button" value="Reserva">
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div style="background-image: url('Materiales/restaurant.png'); min-height: 270px; background-repeat: no-repeat; background-size: cover; background-position: bottom; " alt="Foto de restaurante que permite reservar">
                            <div class="d-flex align-items-end justify-content-center buttonBox">
                                <div class="d-grid gap-2 col-3 mx-auto">
                                    <input class="btn  mb-5" type="button" value="Reserva">
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
            
            <div class="col-4 marginNone border-end cajaBajo">
                <div class="estiloP mb-3 ">
                    <img src="Materiales/recogida Gratuita.jpg" alt="Recogida Gratuita">
                    <div class="col-9">
                        <p>Recogida Gratuita en Tienda</p>
                        <span class="noEstiloP"><p>Elige tu tienda más cercana</p></span>
                    </div>
                </div>
            </div>
            <div class="col-4 marginNone  border-end cajaBajo">
                <div class="estiloP ">
                    <img src="Materiales/promocion.png" alt="Promocion">
                    <div class="col-9">
                        <p>Descuento 5% en comidas</p>
                        <span class="noEstiloP"><p>En todos los comidas y para todo el mundo</p></span>
                    </div>
                </div>
            </div>
            <div class="col-4 marginNone border-end cajaBajo">
                <div class="estiloP ">
                    <img src="Materiales/cena.png" alt="Envio Gratis">
                    <div class="col-9">
                        <p>Envió gratis</p>
                        <span class="noEstiloP"><p>Hazte Socio Tech+Cultura</p></span>
                    </div>
                </div>
            </div>
        

            <div class="separador"></div>
            <section class="border-top">
                <div class="destacadas">
                    <div class="EstiloTexto araboto-light">
                        <p>PRODUCTOS DESTACADAS</p>
                    </div>
                    <div class="flexProductos">
                        <div class="row">
                        <?php 
                        //Es un bucle para mostrar todos los categorias que existe en sistema
                        foreach($Categorias as $categoria){ ?>
                            <div class="col-md-3 col-sm-6 ">
                                <a href="<?=url."?controller=producto&action=shop&categoriaId=".$categoria->getCategoria_id()?>" class="text-decoration-none">
                                    <div class="card">
                                        <div class="divFoto">
                                            <div class="col-12 d-flex justify-content-start">
                                                <img  class="zoomOn object-fit-scale pt-3 pb-3" src="<?=$categoria->getImagenCategoria();?>" alt="<?=$categoria->getDescripcion();?>">
                                                <div class="tret">
                                                    <img src="Materiales/Etiquetas/Oferta 25.png" class="object-fit-scale" style="width: 100%;" alt="Etiqueta de Oferta">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex align-items-center araboto-normal " >
                                            <p class=" card-textP"><?= $categoria->getNombre();?></p>
                                        </div>
                                    </div>
                                </a> 
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <div class="separador2"></div>
                </div>
            </section>
            
            <section>
                <div class="nuevas">
                    <div class="EstiloTexto araboto-light">
                        <p>NOVEDAD</p>
                    </div>
                    <div class="flexProductos">
                        <div class="row">
                        <?php 
                        //Realizar un for contando todos los productos
                        for($productos = 0; $productos < count($Productos); $productos++){ 
                            //Cuando el producto (inicio de 0) sea menos de 4 realizar lo siguiente
                            if($productos < 4){?>
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="divFoto">
                                        <div class="col-12 d-flex justify-content-start">
                                            <img class="zoomOn object-fit-scale pt-3 pb-3" src="<?=$Productos[$productos]->getImagen()?>" alt="<?=$Productos[$productos]->getDescripcion()?>">
                                            <div class="tret">
                                                <img src="Materiales/Etiquetas/Oferta 25.png" alt="Etiqueta de oferta">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex align-items-center araboto-normal">
                                        <span class="card-textP"><?=$Productos[$productos]->getNombre();?></span>
                                    </div>
                                </div>
                            </div>
                            <?php  }else{
                                //En caso de que $producto llega a 5 se acaba el bucle
                                break;
                            } ?>
                        <?php }?>
                        </div>
                    </div>
                    <div class="separador2"></div>
                </div>
            </section>


            <section>
            
                <div class="elegidaPorTi marginNone">
                    <div class="EstiloTexto2 araboto-light">
                        <p>ELEGIDO PARA TI</p>
                    </div>
                    <div class="estiloPTitle araboto-light">
                        <p>Elegido para ti</p>
                    </div>
                    <div class="row">
                    <?php 
                    //Hacer un bucle que muestra todos los productos
                    foreach ($allProductos as $producto){?>
                        

                        <div class="col-md-2 col-4">
                            <div class="card">
                                <img src="<?= $producto->getImagen() ?>" class="object-fit-scale" style="height: 177px;" alt="<?= $producto->getDescripcion() ?>">
                                <div class="descripcion ms-3 mb-3">
                                    <h5 class="card-title"><?=$producto->getNombre()?></h5>
                                    <p class="card-text"><?=$producto->getDescripcionCorto()?></p>
                                </div>
                                <ul class="list-group-flush ms-3 mt-5 araboto-normal ">
                                    <li class="list-group-item fw-bold"><?=$producto->getPrecio() ?>€</li>
                                </ul>
                                <div class="d-flex justify-content-start card-body  me-1 ms-1">
                                    <form action="<?= url . "?controller=producto&action=index" ?>" method="POST" class="col-12">
                                        <div class="d-grid gap-2 col-11 mx-auto">
                                            <input hidden name="id" value="<?= $producto->getProdId() ?>">
                                            <button class="btn btn-primary" type="Submit">Añadir a Cesta</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                
            </section>
            <div class="separador2"></div>
        <section class="greyGround pb-5">
            <div class="noticias marginNone">
                <div class="EstiloTexto2 araboto-light pt-4">
                    <h2>Noticias</h2>
                </div>
                <div class="row">
                    
                    <div class="col-4">
                        <div class="card bg-black subrallar">
                            <img src="Materiales/Cultura_Fnac/KFC.png" style="height: 239px;" class="card-img-top" alt="KFC ha tenido evento especial para los Socios">
                            <div class="card-body text-start ">
                                <article>
                                    <h5 class="card-title mt-3">Nuevo Producto KFC</h5>
                                    <p class="card-text mt-3 font-m">Nuevo Producto KFC</p>
                                    <p class="card-text mb-3 card-textFinal">Se acerca el fin de año y KFC quiere que rompas con todos tus propósitos para el próximo 2021. Para ello, la famosa cadena de  pollo frito ha lanzado el producto menos esperado, más innovador y disruptivo: La Infame.</p>
                                    <div class="text-end mb-3">
                                        <a href="#">Go somewhere</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card bg-black subrallar">
                            <img src="Materiales/Cultura_Fnac/Telepizza.jpg" style="height: 239px;" class="card-img-top" alt="Telepizza ha salido su nueva producto de pizza quard de queso">
                            <div class="card-body text-start">
                                <article>
                                    <h5 class="card-title mt-3">Nuevo Producto KFC</h5>
                                    <p class="card-text mt-3 font-m" >Nuevo Producto KFC</p>
                                    <p class="card-text mb-3 card-textFinal">Se acerca el fin de año y KFC quiere que rompas con todos tus propósitos para el próximo 2021. Para ello, la famosa cadena de  pollo frito ha lanzado el producto menos esperado, más innovador y disruptivo: La Infame.</p>
                                    <div class="text-end mb-3">
                                        <a href="#">Go somewhere</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card bg-black subrallar">
                            <img src="Materiales/Cultura_Fnac/Viena.jpg" class="card-img-top" style="height: 239px;" alt="Viena ha abierto su quintena restaurante despues de 6 años">
                            <div class="card-body text-start">
                                <article>
                                    <h5 class="card-title  mt-3">Nuevo Producto KFC</h5>
                                    <p class="card-text mt-3 font-m">Nuevo Producto KFC</p>
                                    <p class="card-text mb-3 card-textFinal">Se acerca el fin de año y KFC quiere que rompas con todos tus propósitos para el próximo 2021. Para ello, la famosa cadena de  pollo frito ha lanzado el producto menos esperado, más innovador y disruptivo: La Infame.</p>
                                    <div class="text-end mb-3">
                                        <a href="#">Go somewhere</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</body>

</html>