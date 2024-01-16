
<html>
<head>
<meta charset="utf-8">
    <meta name="author" content="ZhiouZhu">
    <meta name="description" content="Cabecera comun de mis paginas web">
    <meta lang="es">
    <link href="Css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/editarProductos.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalTexto.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalDiseño.css" rel="stylesheet" type="text/css" media="screen">
    <link href="Css/generalColors.css" rel="stylesheet" type="text/css" media="screen">
    <main>
        <div class="container">
        <div class="col-12 d-flex justify-content-center backgroundGrey ">
            <div class="row mb-5" >
                <div class="col-12 mt-5">
                    <H2 class="miInformacion ">MODIFICAR PRODUCTO</H2>
                <section class="marginSelector noMarginBottom ">
                <ul class="tabList">
                    <li>
                        <a href="<?=url."?controller=user&action=controllerPanelUser"?>" class="text-decoration-none">Mis datos personales</a>
                    </li>
                    <li>
                        <a href="#>" class="text-decoration-none"></a>
                    </li>
                </ul>
                <h2 class="mt-4 miInformacionDatos">MODIFICAR PRODUCTO</h2>
                <div class="col-12 mt-5 bg-white">
                    <div class="col-6  boxInformacion d-flex justify-content-center">
                        <div class="row"></div>
                            <div class="col-12 mt-5 pb-5 d-flex justify-content-center">
                                <table>
                                <form action=<?= url."?controller=producto&action=modificar" ?> method='post'>
                                <tr>
                                    <td class="col-12 ">
                                        <label class="fw-bold float-left border-left">Producto_id</label>
                                        <input class="mt-2" name="producto_id" value="<?= $producto->getProdId() ?>">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-12">
                                        <label class="fw-bold float-left border-left">Nombre Producto</label>
                                        <input class="mt-2" name="nombre" value="<?= $producto->getNombre() ?>">
                                        <br>
                                    </td>
                                </tr>
                                <td class="col-12">
                                    <label class="fw-bold float-left border-left">Descripcion Producto</label>
                                    <input class="mt-2" name="descript" value="<?= $producto->getDescripcion() ?>">
                                    <br>
                                </td>
                                </tr>
                                <tr>
                                    <td class="col-12">
                                        <label class="fw-bold float-left border-left">Descripcion Producto Corto</label>
                                        <input class="mt-2" name="descriptCorto" value="<?= $producto->getDescripcionCorto() ?>">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-12">
                                        <label class="fw-bold float-left border-left">Precio Producto</label>
                                        <input class="mt-2" name="precio" value="<?= $producto->getPrecio() ?>">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-12">
                                        <label class="fw-bold float-left border-left">ImagenUsuario</label>
                                        <input class="mt-2" name="imagen" value="<?= $producto->getImagen() ?>">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-12">
                                        <button class="btn btn-primary mt-3 mb-3 pe-5 ps-5 float-left" type="submit">Modificar</button>
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