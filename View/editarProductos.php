<html>
<head>
</head>
<body>

    <div>
        <form action=<?= url."?controller=producto&action=modificar" ?> method='post'>
            <label>Producto_id</label>
            <input name="producto_id" value="<?= $producto->getProdId() ?>">
            <br>
            <label>Nombre Producto</label>
            <input name="nombre" value="<?= $producto->getNombre() ?>">
            <br>
            <label>Descripcion Producto</label>
            <input name="descript" value="<?= $producto->getDescripcion() ?>">
            <br>
            <label>Descripcion Producto</label>
            <input name="imagen" value="">
            <br>
            <label>Precio Producto</label>
            <input name="precio" value="<?= $producto->getPrecio() ?>">
            <br>
            <button type="submit">Modificar</button>
        </form>
    </div>
</body>
</html>