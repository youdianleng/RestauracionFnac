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
                        <li>
                            <a href="#" class="text-decoration-none">Mis Pedidos</a>
                        </li>
                    </ul>
                    <h2 class="mt-4 ">MIS DATOS PERSONALES</h2>
                    <div class="col-12 mt-5 bg-white">
                        
                        <div class="col-6  boxInformacion d-flex justify-content-center">
                            <div class="col-10 mt-5">
                                <div class="fotoUser col-12 mb-5">
                                    <div  style="background-image: url('Materiales/usuarioIcono.png'); min-height: 250px; background-repeat: no-repeat; "></div>
                                </div>
                                <div class="d-flex">

                                    <div class="col-6 pe-2">
                                        <input type="text" placeholder="Nombre">
                                    </div>
                                    <div class="col-6 ps-2">
                                        <input type="text" placeHolder="Apellido">
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="mail" placeHolder="Email">
                                </div>

                                <div class="col-6 mt-4 mb-5">
                                    <label>Permiso de: </label>
                                    <input type="text" disabled>
                                </div>

                                <div class="col-6 mt-4 mb-5">
                                    <form action="<?=url."?controller=user&action=eliminarUsusario"?>" method="POST">
                                        <button class="btn btn-dark">Eliminar Cuenta</button>
                                        <button class="btn btn-dark">Modificar Cuenta</button>
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