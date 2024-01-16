<html>
<head>
    <link rel="stylesheet" href="Css/carritoCss.css">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/registrar.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColors.css" rel="stylesheet" type="text/css" media="screen">
    <script src="js/registrar.js" ></script>
</head>
<body>
    <div class="container greyBackground">
        <div class="row">
            <div class="col-12 d-flex justify-content-center ">
                <h1 class="Titulo">Crear de Cuenta</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <h2 class="subTitulo">Solo te queda indicar tus datos personales</h2>
            </div>
            <div class="col-12 d-flex justify-content-center mt-5">
                <div class="containerRegistro">
                    <!-- Envia el dado al userController en funcion de userPanel-->
                    <form action="<?=url."?controller=user&action=registrarUsuario"?>" method="POST">

                        

                        <div class="d-flex justify-content-center">
                            <!-- Aqui esta el Mail de usuario escrito anteriormente -->
                            <p class="color98"><?=$_GET["userMail"]?></p>
                            <div class="boxEditarSVG">
                                <a href="<?=url."?controller=user&action=IniciarSession&userMail="?><?=$_GET["userMail"]?>"> <img class="mb-3" src="Materiales/editar.svg" class="editarSVG" alt="Icono de editar Email"></a>
                            </div>
                            <input type="text" name="mail" value="<?=$_GET["userMail"]?>" hidden >
                        </div>

                        <div class="d-flex pt-5 col-12">
                            <!-- Elegir el Sexo de usuario -->
                            <div class="boxSeñor d-flex">
                                <div class="botonSeñor">
                                    <input type="radio" name="checkbox1">
                                </div>
                                <div class="ms-2">
                                    <p class="color98">Señor</p>
                                </div>


                            </div>
                            <div class="boxSeñora d-flex ms-3">
                                <div class="botonSeñora">
                                    <input type="radio" name="checkbox1">
                                </div>
                                <div class="ms-2 mb-1">
                                    <p class="color98">Señora</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center pt-5">
                            <!-- Crear un input para que el usuario sube su nombre -->
                            <input class="col-12" type="text" name="apellido" placeholder="Apellido">
                        </div>

                        <div class="d-flex justify-content-center pt-5">
                            <!-- Crear un input para que el usuario sube su apellido -->
                            <input class="col-12" type="text" name="nombre" placeholder="Nombre">
                        </div>

                        <div class="d-flex justify-content-center pt-5">
                            <!-- Crear un input para que el usuario sube su fecha -->
                            <!-- Anyo -->
                            <select class="col-4 noBorder borderBottom color98">
                                <option>DD</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                            </select>
                            <!-- Mes -->
                            <select class="col-4 noBorder borderBottom color98">
                                <option>MM</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                            </select>
                            <!-- Dias -->
                            <select class="col-4 noBorder borderBottom color98">
                                <option>AAAA</option>
                                <option>2001</option>
                                <option>2002</option>
                                <option>2003</option>
                                <option>2004</option>
                                <option>2005</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-center pt-5">
                            <!-- Crear un input para que el usuario sube el Idioma preferido -->
                            <select class="col-12 noBorder borderBottom">
                                <option>Catalan</option>
                                <option>Castellano</option>
                                <option>Angles</option>
                            </select>
                        </div>
                        

                        <div class="d-flex justify-content-center pt-5">
                            <!-- Crear un input para que el usuario escribe el Contrasenya -->
                            <input class="col-11" type="password" id="constrasenya" name="contrasenya" placeholder="Contrasenya">
                            <button class="noBorder bg-white" type="button" onclick="cambiarTipoContrasenya()"><img class="seeContrasenya" src="Materiales/ojo.png" alt="icono de ojo"></button>
                        </div>
                    
                        <div class="d-flex justify-content-center topMarginBoton">
                            <!-- Cuando clica el boton se envia a direccion donde esta definido en form -->
                            <button class="button d-grid gap-2 col-12 mx-auto" id="botonRegist" type="submit">CONEXION / INSCRIPCION</button>
                            <p id="mostrar"></p>
                        </div>
                        
                    </form>

                    <div class="boxCondiciones mt-4">
                        <div class="d-flex">
                            <input class="mb-3 me-2" type="checkbox">
                            <p class="color98 txt13">Quiero recibir información sobre las mejores ofertas y las promociones exclusivas de Fnac</p>
                        </div>
                        <div class="d-flex mt-3">
                            <input class="mb-4 me-2" type="checkbox">
                            <p class="color98 txt13">Marcando esta casilla, acepto y reconozco haber leido las <span class="colorDefault">Condiciones de Venta de Fnac es </span>y las <span class="colorDefault">Condiciones Generales de Venta de Marketplace</span></p>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center mt-3">
                <div class="boxInfoCookie ">
                    <p class="txt13 color98">
                    Le informamos que sus datos serán tratados por Grandes Almacenes FNAC España S.A.U. (a partir de ahora “FNAC”) que actuará en calidad del responsable del tratamiento de los mismos. Las finalidades de dichos tratamientos son el mantenimiento de la relación comercial y los servicios ofrecidos o contratados asociados a dicha relación. También se realizará el envío de comunicaciones comerciales de productos y servicios tanto de FNAC como de terceros. La base legitimadora de estos tratamientos es la propia obligación comercial. La base legitimadora del envío de comunicaciones comerciales tanto propias como de terceros, es el propio consentimiento explícito recogido en este mismo documento. Los datos personales se conservarán durante la vigencia de la relación comercial y posteriormente, siempre que el cliente no haya ejercitado su derecho de supresión, serán conservados teniendo en cuenta los plazos legales que resulten de aplicación en cada caso concreto, teniendo en cuenta la tipología de los datos, así como la finalidad del tratamiento. FNAC no realiza cesiones de los datos de carácter personal de sus clientes a ninguna otra entidad, salvo obligación legal que así lo disponga. FNAC garantiza al titular el ejercicio de los derechos de acceso, rectificación, supresión, oposición, limitación y portabilidad dirigiéndose por escrito y acompañando fotocopia del DNI al Comité de Protección de Datos de Grandes Almacenes Fnac España , S.A.U., Paseo de la Finca 1, bloque 11, planta 2, 28223, Pozuelo de Alarcón, Madrid, o bien a través de vía electrónica en los formularios dispuestos en  https://gdpr.fnac.es/ . Para mayor información sobre el tratamiento de sus datos de carácter personal, puede dirigirse a la Política de privacidad de FNAC, alojada en la página web www.fnac.es. Asimismo, le informamos que FNAC ha nombrado un Delegado de Protección de Datos (DPO/DPD) que podrá contactarse a través de  https://gdpr.fnac.es/dpo.html para cualquier información adicional al respecto.
                    </p>
                </div>
                
            </div>
            <div class="col-12 d-flex justify-content-center align-items-start mt-2">
                    <a href=# class="txt12" style="color: #989898 !important;">Configurar tu Cookie</a>
                </div>
            <div class="separador" style="height: 100px;">

            </div>
        </div>
    </div>
</body>
</html>


