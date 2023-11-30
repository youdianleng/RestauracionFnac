<html>
<head>
    <link rel="stylesheet" href="Css/carritoCss.css">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/iniciarSession.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="container greyBackground">
        <div class="row">
            <div class="col-12 d-flex justify-content-center ">
                <h1 class="Titulo">Conexión / Inscripción</h1>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <h2 class="subTitulo">Escribe un email para acceder o crear una cuenta</h2>
            </div>
            <div class="col-12 d-flex justify-content-center mt-5">
                <div class="containerRegistro">
                    <form action="<?=url."?controller=user&action=userPanel"?>" method="POST">
                        <div class="d-flex justify-content-center pt-5">
                            <input class="col-8" type="mail" name="usuario" placeholder="Email">
                        </div>
                    
                        <div class="d-flex justify-content-center topMarginBoton">
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