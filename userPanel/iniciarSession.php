<html>
<head>
    <link rel="stylesheet" href="Css/carritoCss.css">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/iniciarSession.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColors.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="container greyBackground">
        <div class="row">
            <div class="col-12 d-flex justify-content-center ">
                <p class="Titulo"><? echo $_GET["userMail"]?></p>
            </div>
            <div class="col-12 d-flex justify-content-center ">
                <h1 class="Titulo">Conexión / Inscripción</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <h2 class="subTitulo">Escribe un email para acceder o crear una cuenta</h2>
            </div>
            <div class="col-12 d-flex justify-content-center mt-5">
                <div class="containerRegistro">
                    <!-- Envia el dado al userController en funcion de userPanel-->
                    <form action="<?=url."?controller=user&action=userPanel"?>" method="POST">
                        <div class="d-flex justify-content-center pt-5">
                            <!-- Crear un input para que el usuario escribe el email -->
                            <input class="col-8" type="email" name="usuario" placeholder="Email" value="<?php 
                                if(isset($_GET["userMail"])){
                                    echo $_GET["userMail"];
                                }
                            ?>">
                        </div>

                        <div class="d-flex justify-content-center pt-5">
                            <!-- Crear un input para que el usuario escribe el Contrasenya -->
                            <input class="col-8" type="password" name="contrasenya" placeholder="Contrasenya">
                        </div>
                    
                        <div class="d-flex justify-content-center topMarginBoton">
                            <!-- Cuando clica el boton se envia a direccion donde esta definido en form -->
                            <button class="button d-grid gap-2 col-8 mx-auto" type="submit">CONEXION / INSCRIPCION</button>
                        </div>
                    </form>
                    
                    <div class="d-flex justify-content-center">
                        <div class="containerRalla col-8" style="margin-top: 40px;">
                            <span class="textContainerGuio">O</span>
                        </div>
                    </div>
                    <p class="providerMessage" data-test="provider-message">Accede o crea tu cuenta en un solo clic</p>
                    <div class="container_PDv_6 d-flex justify-content-center" style="margin-top: 18px;">
                        <button class="button socialButton" type="button">
                            <div class="apple socialIcon">

                            </div>
                        </button>
                        <button class="button socialButton" type="button">
                            <div class="facebook socialIcon">

                            </div>
                        </button>
                        <button class="button socialButton" type="button">
                            <div class="google socialIcon">

                            </div>
                        </button>
                    </div>
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