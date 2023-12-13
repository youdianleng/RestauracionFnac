<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Cabecera comun de mis paginas web">
    <meta lang="es">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/UserDetail.css" rel="stylesheet" type="text/css" media="screen">
</head> 
<body>
    <div class="container">
        <div class="col-12 d-flex justify-content-center backgroundGrey ">
            <div class="row mb-5" >
                <div class="col-12 mt-5">
                    <H2 class="miInformacion">MI INFORMACIÓN PERSONAL</H2>
                <section class="marginSelector noMarginBottom ">
                    <ul class="tabList ">
                        <li>
                            <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                        </li>
                        <?php
                            if($_SESSION['usuario']->getPermisos() == 0){?>
                                <li>
                                    <a href="<?=url."?controller=user&action=adminPanel"?>" class="text-decoration-none">Control de Productos</a>
                                </li>
                            <?php }else if($_SESSION['usuario']->getPermisos() == 1){?>
                                <li>
                                    <a href="<?=url."?controller=user&action=pedidoPanel"?>" class="text-decoration-none">Mis Pedidos</a>
                                </li>
                            <?php }?>
                        
                    </ul>
                    <h2 class="mt-4 ">MIS DATOS PERSONALES</h2>
                    <div class="col-12 mt-5 bg-white">
                        
                        <div class="col-6  boxInformacion d-flex justify-content-center">
                            <div class="col-10 mt-5">
                                <div class="fotoUser col-12 mb-5">
                                    <div  style="background-image: url('Materiales/usuarioIcono.png'); min-height: 250px; background-repeat: no-repeat; "></div>
                                </div>
                                <form action="<?=url."?controller=user&action=modificarUsusario"?>" method="POST">
                                    <div class="d-flex">
                                        
                                        <div class="col-6 pe-2">
                                            <input type="text" placeholder="Nombre" name="Nombre" value="<?=$_SESSION['usuario']->getNombre()?>">
                                        </div>
                                        <div class="col-6 ps-2">
                                            <input type="text" placeHolder="Apellido" name="Apellido" value="<?=$_SESSION['usuario']->getApellido()?>">
                                        </div>
                                        
                                    </div>
                                    <input hidden name="cliente_id" value="<?=$_SESSION['usuario']->getCliente_id()?>">
                                    <button class="btn btn-dark mt-3">Modificar Usuario</button>
                                </form>
                                <div class="col-12 mt-4">
                                    <input type="mail" placeHolder="Email" value="<?=$_SESSION['usuario']->getMail()?>">
                                </div>

                                <div class="col-6 mt-4 mb-5">
                                    <label>Permiso de: </label>
                                    <input type="text" disabled value="<?php
                                        if($_SESSION['usuario']->getPermisos() == 0){
                                            echo "Administrador";
                                        }else if($_SESSION['usuario']->getPermisos() == 1){
                                            echo "Usuario Normal";
                                        }
                                        
                                    ?>">
                                </div>

                                <div class="col-6 mt-4 mb-5 d-flex">
                                    
                                    <form action="<?=url."?controller=user&action=eliminarUsusario"?>" method="POST">
                                        <input hidden name="cliente_id" value="<?=$_SESSION['usuario']->getCliente_id()?>">
                                        <button class="btn btn-dark">Eliminar Cuenta</button>
                                    </form>

                                    <form class="ms-2" action="<?=url."?controller=user&action=cerrarSession"?>" method="POST">
                                        <button class="btn btn-dark">Cerrar Session</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>