<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Cabecera comun de mis paginas web">
    <meta lang="es">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/UserDetail.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColors.css" rel="stylesheet" type="text/css" media="screen">
</head> 
<body>
    <div class="container">
        <div class="col-12 d-flex justify-content-center backgroundGrey ">
            <div class="row mb-5 col-12" >
                <div class="boxInformacionTotal">
                <div class="col-12 mt-5 boxWidth">
                    <H2 class="miInformacion">MI INFORMACIÓN PERSONAL</H2>
                <section class="marginSelector noMarginBottom ">
                    <ul class="tabList d-flex">
                        <li class="col-6">
                            <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                        </li>
                        <?php
                            //Aqui esta para mostrar paneles segun el permiso que hay de los usuarios
                            //cuando el permiso sea 0
                            if($_SESSION['usuario']->getPermisos() == 0){?>
                                <li class="col-6">
                                    <!-- Muestra el panel de control -->
                                    <a href="<?=url."?controller=user&action=adminPanel"?>" class="text-decoration-none">Panel Control</a>
                                </li>
                            <?php
                            //cuando el permiso sea 1
                             }else if($_SESSION['usuario']->getPermisos() == 1){?>
                                <li class="col-6">
                                    <!-- Muestra el panel de pedido -->
                                    <a href="<?=url."?controller=user&action=pedidoPanel"?>" class="text-decoration-none">Mis Pedidos</a>
                                </li>
                            <?php }?>
                        
                    </ul>

                    <h2 class="mt-5 miInformacionDatos mb-5">MIS DATOS PERSONALES</h2>
                    <div class="col-12 mt-2 bg-white">
                    <div class="row">
                        <div class="col-6 boxInformacion  ">
                            <div class="col-md-6 col-12 mt-5 boxChange">
                                <form action="<?=url."?controller=user&action=modificarUsusario"?>" method="POST">
                                    <div class="d-flex">
                                        
                                        <div class="col-6 pe-2">
                                            <label class="labelUser">Apellido</label>
                                            <input type="text" class="inputUser" name="Nombre" value="<?=$_SESSION['usuario']->getNombre()?>">
                                        </div>
                                        <div class="col-6 ps-2">
                                            <label class="labelUser">Nombre</label>
                                            <input type="text" class="inputUser" name="Apellido" value="<?=$_SESSION['usuario']->getApellido()?>">
                                        </div>
                                        
                                    </div>
                                    <input hidden name="cliente_id" value="<?=$_SESSION['usuario']->getCliente_id()?>">
                                    <button class="btn mt-3">Modificar Usuario</button>
                                </form>
                                <div class="col-12 mt-4 mb-5">
                                    <label class="labelUser">E-mail</label>
                                    <input type="mail" class="mb-5 bg-f2" value="<?=$_SESSION['usuario']->getMail()?>" readonly>
                                </div>

                                <div class="col-12 mt-4 mb-5">
                                    <label class="fw-bold mb-3">Fecha de Nacimiento</label><br>
                                    <div class="d-flex justify-content-between">
                                        <select class="col-4 selectStyle me-2">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                        </select>
                                        <select class="col-4 selectStyle me-2">
                                            <option>11</option>
                                            <option>12</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <select class="col-4 selectStyle">
                                            <option>2001</option>
                                            <option>2002</option>
                                            <option>2003</option>
                                            <option>2004</option>
                                            <option>2005</option>
                                            <option>2006</option>
                                            <option>2007</option> 
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="col-12 mt-4 mb-5 d-flex">
                                    
                                    <form action="<?=url."?controller=user&action=eliminarUsusario"?>" method="POST">
                                        <input hidden name="cliente_id" value="<?=$_SESSION['usuario']->getCliente_id()?>">
                                        <button class="btn">Eliminar Cuenta</button>
                                    </form>

                                    <form class="ms-2" action="<?=url."?controller=user&action=cerrarSession"?>" method="POST">
                                        <button class="btn">Cerrar Session</button>
                                    </form>
                                </div>
                                
                            </div>



                            <!-- Parte derecha para informaciones adicionales -->
                            <div class="col-md-5 col-12 mt-4 boxChange">
                                <div class="col-12 adicionalBox">
                                    <p class="adicionalInfo">Tengo la tarjeta de Socio Fnac</p>
                                    <p class="adicionaInfo2">Disfruta ahora mismo de las ventajas de Socio</p>
                                </div>

                                <div class="col-12 adicionalBox">
                                    <p class="adicionalInfo">Compra de empresa</p>
                                    <p class="adicionaInfo2">La Fnac que tu empresa necesita</p>
                                </div>
                                
                                <div class="col-12 adicionalBox">
                                    <p class="adicionalInfo">Tu tienda favorita</p>
                                    <p class="adicionaInfo2 pb-4">Práctico para comprobar la disponibilidad de un producto en una tienda</p>

                                    <select class="col-12 selectStyle" >
                                        <option>Elige una tienda</option>
                                        <option>Bilbao</option>
                                        <option>Granada</option>
                                        <option>Murcia</option>
                                        <option>Madrid</option>
                                    </select>
                                </div>

                                <div class="col-12 adicionalBox">
                                    <p class="adicionalInfo pb-3">¿Tienes hijos?</p>
                                    <select class="col-12 selectStyle" >
                                        <option>Número de hijos</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>          
                            </div>
                    </div>
                    </div>
                </section>
                </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>