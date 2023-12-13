<html>
<head>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/añadirProductos.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <main>
        <div class="container">
        <div class="col-12 d-flex justify-content-center backgroundGrey ">
            <div class="row mb-5" >
                <div class="col-12 mt-5">
                    <H2 class="miInformacion">AÑADIR NUEVO PRODUCTO</H2>
                <section class="marginSelector noMarginBottom ">
                <ul class="tabList">
                    <li>
                        <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                    </li>
                    <li>
                        <a href="#>" class="text-decoration-none"></a>
                    </li>
                </ul>
                <h2 class="mt-4 ">NUEVO PRODUCTO</h2>
                <div class="col-12 mt-5 bg-white">
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="row"></div>
                            <div class="col-12 mt-5 pb-5 d-flex justify-content-center">
                                <table >
                                <form action=<?= url."?controller=producto&action=agregar" ?> method='post'>
                                <tr>
                                    <td class="col-12">
                                        <label class="fw-bold">Categoria_id</label>
                                        <input name="categoria_id">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold">Nombre Producto</label>
                                        <input name="nombre">
                                    <br>
                                </td>
                                </tr>
                                <td class="col-12">
                                        <label class="fw-bold">Descripcion Producto</label>
                                        <input name="descript">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold">Descripcion Corto Producto</label>
                                        <input name="descriptCorto">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold">Imagen Producto</label>
                                        <input name="imagen">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold">Precio Producto</label>
                                        <input name="precio">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                    <button class="btn btn-dark mt-3 mb-3 pe-5 ps-5" type="submit">Añadir</button>
                                </td>
                                </tr>
                                </form>
                                </table>   
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
            </div>
        </div>      
    </div>
</main>
</body>
</html>