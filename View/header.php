<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Cabecera comun de mis paginas web">
    <meta lang="es">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/header.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="container">
        <div class="menu1 d-flex justify-content-end align-items-center pt-2 " >
            <a href="<?=url."?controller=producto&action=PanelMod"?>" class="me-2 araboto-normal " ><li class="txt14"><span class="imgCss"><img src="Materiales/IconoCabecera/PreguntaIcono.svg" ></span>Necesito Ayuda</li></a>
            <a href="#" ><li id="accebilidad"><img src="Materiales/accebilidad.png" ></li></a>
            <a href="#" class="araboto-normal"><li class="txt14"><span class="imgCss"><img src="Materiales/IconoCabecera/Ubicacion.svg"></span>Encontrar un tienda</li></a>
            <a href="#" class="me-5 araboto-normal"><li class="txt14">Envio gratis para Socios</li></a>
        </div>
        <div class="row"></div>
            <nav class="col-12 d-flex navbar navbar-expand-lg" style="padding: 0px;">
                <div class="col-7 d-flex justify-content-center  pe-1 align-items-end">
                    <a class="navbar-brands d-flex justify-content-center marginLeftIcono " href="<?=url."?controller=producto&action=index"?>"><img src="Materiales/IconoCabecera/Fnac.png" style="width: 112px; height: 50px;"></a>
                    <form class="d-flex btnStyle" role="search">
                        <input class="bg-body-tertiary mb-1 buscarCss" style="border: none;" type="search" placeholder="¿Què quieres buscar hoy?" aria-label="Search" >
                        <img src="Materiales/Buscador.png" style="height: 40px; width: 50px;">
                    </form>
                </div>
                <div class="col-5 d-flex justify-content-end" style="padding-right: 30px;">
                    <div class="noDecoration d-flex justify-content-end pe-2">
                        <a href="<?= url."?controller=producto&action=userPanel" ?>">
                            <div class="boxCarrito d-flex ps-3 pe-2 pt-2 pb-2 fw-bold">
                                <div style="background-image: url('Materiales/cesta.svg'); max-height: 30px; width: 35px; background-repeat: no-repeat;" class="mt-2 me-2"><span>

                                </span></div>
                                
                                <p class="mt-2 pt-1 txt14 txtMin">Mi Cuenta</p>
                            </div>
                        </a>
                    </div>
                    <div class="noDecoration d-flex justify-content-end">
                        <a href="<?= url."?controller=producto&action=carrito" ?>">
                            <div class="boxCarrito d-flex ps-3 pe-3 pt-2 pb-2 fw-bold">
                                <div style="background-image: url('Materiales/cesta.svg'); max-height: 30px; width: 35px; background-repeat: no-repeat;" class="mt-2 me-2"><span>
                                    <div class="contadorCarrito ms-3 d-flex justify-content-center">
                                        <p><?= count($_SESSION['selecciones']) ?></p>
                                    </div>
                                </span></div>
                                
                                <p class="mt-2 pt-1 txt14">Mi Cesta</p>
                            </div>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="col-12 menu3">
                <nav class="col-12 d-flex justify-content-center navbar navbar-expand-lg marginNoneBottom">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="box-shadow: none;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
                <nav class="col-12 navbar navbar-expand-lg marginNone" style="padding-top: 0px; padding-bottom: 0px;">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active  weight700 " aria-current="page" href="<?= url."?controller=producto&action=index"?>">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active  weight700" href="<?= url."?controller=producto&action=shop"?>">CARTA</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active  weight700" >OFERTAS</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>