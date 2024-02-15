<html>
<head>
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/añadirProductos.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColors.css" rel="stylesheet" type="text/css" media="screen">
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
                <h2 class="mt-4 miInformacionDatos ">NUEVO PRODUCTO</h2>
                <div class="col-12 mt-5 bg-white">
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="row"></div>
                            <div class="col-12 mt-5 pb-5 d-flex justify-content-center">
                                <table >
                                <form action=<?= url."?controller=producto&action=agregar" ?> method='post' enctype="multipart/form-data">
                                <tr>
                                    <td class="col-12">
                                        <label class="fw-bold float-left border-left">Categoria_id</label>
                                        <select name="categoria_id" class="mt-2 col-12" >
                                            <?php
                                                foreach($categorias as $categoria){
                                                    echo "<option value=";
                                                    echo $categoria->getCategoria_id().">";
                                                    echo $categoria->getNombreCat();
                                                    echo "</option>";     
                                             }
                                            ?>
                                        </select>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold float-left border-left">Nombre Producto</label>
                                        <input class="mt-2" name="nombre" required>
                                    <br>
                                </td>
                                </tr>
                                <td class="col-12">
                                        <label class="fw-bold float-left border-left">Descripcion Producto</label>
                                        <input class="mt-2" name="descript">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold float-left border-left">Descripcion Corto Producto</label>
                                        <input class="mt-2" name="descriptCorto">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold float-left border-left">Imagen Producto</label>
                                        <input type="file" name="imagen" id="imagen" class="mt-2" accept="image/*">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                        <label class="fw-bold float-left border-left">Precio Producto</label>
                                        <input class="mt-2" name="precio">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                <td class="col-12">
                                    <button class="btn btn-primary mt-3 mb-3 pe-5 ps-5 float-left" type="submit">Añadir</button>
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