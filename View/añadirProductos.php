<html>
<head>
</head>
<body>

    <div>
        <form action=<?= url."?controller=producto&action=agregar" ?> method='post'>
            <br>
            <label>Categoria_id</label>
            <input name="categoria_id">
            <br>
            <label>Nombre Producto</label>
            <input name="nombre">
            <br>
            <label>Descripcion Producto</label>
            <input name="descript">
            <br>
            <label>Descripcion Corto Producto</label>
            <input name="descriptCorto">
            <br>
            <label>Imagen Producto</label>
            <input name="imagen">
            <br>
            <label>Precio Producto</label>
            <input name="precio">
            <br>
            <button type="submit">Agregar</button>
        </form>
    </div>
</body>
</html>