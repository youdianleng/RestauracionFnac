<html>
<head>
</head>
<body>

    <div>
        <form action=<?= url."?controller=producto&action=agregar" ?> method='post'>
            <label>Producto_id</label>
            <input name="producto_id">
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
            <label>Precio Producto</label>
            <input name="precio">
            <br>
            <button type="submit">Agregar</button>
        </form>
    </div>
</body>
</html>