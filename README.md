- [Restauracion Fnac](#restauracion-fnac)
  - [Guía de introducción](#guía-de-introducción)
  - [Requisito de Instalación](#requisito-de-instalación)
  - [Pasos de Instalacion](#pasos-de-instalacion)
    - [Tablas de "fnacrestauracion](#tablas-de-fnacrestauracion)
  - [Realizar Test](#realizar-test)
  - [Test](#test)
  - [Lenguaje de programación utilizado](#lenguaje-de-programación-utilizado)
  - [Parte PHP](#Parte-PHP)
  - [Parte Javacript](#Parte-Javascript)
  - [Autor](#autor)
  - [Descripcion de Licencia](#descripcion-de-licencia)
  - [Expresiones de gratitud](#expresiones-de-gratitud)


# Restauracion Fnac
Es un simple sistema de gestión de restaurantes para el hacer un implementacion en Fna

## Guía de introducción
El siguiente Guía te ayudaria para poder instalar y ejecutar el sistema tanto para testear o para desarrollar.  
Para conocer como plantear el proyecto en entorno en línea, Consulte la sección de implementación. 

## Requisito de Instalación
Para poder ejecutar el proyecto en tu entorno o sistema, necesitaremos lo siguientes:
  1.  Xampp con PHP version 8.1 o mas
  2.  PhpMyAdmin
  3.  Xampp Apache
  4.  Compilador de código (NotePad++, VisualCode, IntelliJ etc.)

## Pasos de Instalacion
Para poder arrancar y ejecutar el proyecto necesitaremos hacer lo siguientes:
  1. Instalar Xampp
     1.1. Ir a pagina oficial de Xampp con siguiente enlace [Instalar Xampp Nueva Version](https://www.apachefriends.org/es/download.html)  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/XamppMainPage.png" width="600px" alt="Pagina para instalar el Xampp">
     
     1.2. Se inicia automaticamente el descarga de Xampp  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/EmpezaDescargaXampp.png" width="600px" alt="Navegador se descarga automaticamente el Xampp despues de elegido el version">

     1.3. Una vez tenemos descargado el Xampp ejecutar el .exe y despues de dar el Next nos mostrara una ventana y deberiamos seleccionar todos los que necesitamos
     Por defecto estan todos marcados por tick y eso es lo que necesitamos, le damos a "Next"  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Paso1.png" width="400px" alt="Navegador se descarga automaticamente el Xampp despues de elegido el version">

     1.4. Elegir la ruta que deseas instalar el Xampp y "Next"
     >La carpeta que queremos instalar el Xampp tiene que estar Vacio  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Paso2.png" width="400px" alt="Seleccionar el carpeta donde queremos instalar el Xampp">

     1.5. Elegir la idioma que quieres que el Xampp que se configure y "Next"  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Paso3.png" width="400px" alt="Elegir el idioma que queremos que el Xampp se usa">

     1.6. Cuando llegas a este paso despues de clicar el "Next" se iniciara el instalación  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Paso4.png" width="400px" alt="Ventana final para realizar el instalacion de Xampp">

2. Configurar el PhpMyAdmin  
   En este paso tenemos que importar o manualmente crear los tablas y columnas para que el proyecto puede arrancar bien
   2.1. Entrar a PhpMyAdmin  
   <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/phpmyadmin1.png" width="400px" alt="Entrar al PhpMyAdmin en Xampp">

   2.2. vista de panel de PhpMyAdmin y los tablas que vamos a crear.
   > Cuando entras y crear el conexion de "fnacrestauracion" recuerda de usar el cotejamiento de "utf8mb4_general_ci"  
   <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/phpmyadmin2.png" width="500px" alt="Vista de panel PhpMyAdmin y los tablas que vamos a necesitar">
### Tablas de "fnacrestauracion
    **categoria**  
      # Es para indentificar y crear los categorias para elegir
      1. Categoria_id [Int(255) Primary_key autoincrement]
      2. Descripcion [varchar(255)]
      3. ImagenCategoria [varchar(255)]
      4. Nombre [varchar(255)]
    **clientes**
      # Crear los clientes que han iniciado el session en nuestro proyecto de Resutacion
      1. Cliente_id [Int(255) Primary_key autoincrement]
      2. Nombre [varchar(255)]
      3. Apellido [varchar(255)]
      4. Mail [varchar(255)]
      5. Constrasenya [varchar(255)]
      6. ImgUsuario [text]
      7. Permisos [Int(255)]
      > El permisos contiene valor de 0 o 1 para indentificar si es cliente o administrador si necesitar mas roles puedes ir añadiendo en codigo
    **ingredientes**
      # Creado para que los productos puedan seleccionar ingredientes
      1. Ingredientes_id [Int(255) Primary_key]
      2. Nombre [varchar(255)]
      3. Descripcion [varchar(255)]
      4. Precio [Int(255)]
    **pedidos**
      # Los pedidos de los clientes se guardaran aqui
      1. Pedido_id [Int(255) Primary_key]
      2. Cliente_id [Int(255) Foreign_key("clientes" Cliente_id)]
      > Foreign_key("tabla" columna)
      3. Precio_total [Int(255)]
      4. Pedido_Time (datetime(6) Current_timestamp(6))
    **pedidos_ingredientes**
      # Para que cada pedido puedan consultar la cantidad de ingredientes que hay
      1. Pedido_Ingredientes [Int(255) Primary_key]
      2. Ingrediente_id [int(255) Foreign_key("ingredientes" Ingredientes_id)]
      3. Pedido_id [int(255) Foreign_key("pedidos" Pedido_id)]
      4. Nombre [varchar(255)]
      > Nombre de Ingrediente
      5. Descricipcion [varchar(255)]
      6. Cantidad [Int(255)]
    **pedido_producto**
      # Para poder hacer un consulta de cada pedido que productos hay por dentro
      1. Peido_Producto [Int(255) Primary_key autoIncrement]
      2. Pedido_id [Int(255) Foreign_key("Pedidos" Pedido_id)]
      3. Producto_id [Int(255) Foreign_key("Productos" Productos_id)]
      4. Precio_Unidad [Int(255)]
      5. Cantidad [Int(255)]
      6. Precio_total [Int(255)]
    **productos**
      # Donde insertamos los productos para vender en sistema
      1. Producto_id [Int(255) Primary_key autoIncrement]
      2. Categoria_id [Int(255) Foreign_key("categoria" Categoria_id)]
      3. Nombre [varchar(255)]
      4. Descripcion [varchar(255)]
      5. DescripcionCorto [text]
      6. Imagen [varchar(255)]
      7. Precio [float]
    **producto_ingredientes**
      # Para saber que los productos de cada pedido que Ingredientes contienen
      1. Producto_id [Int(255) Foreign_key("producto" Producto_id)]
      2. Ingrediente_id [Int(255) Foreign_key("ingredientes" Ingredientes_id)]
      3. Nombre [varchar(255)]
      4. Descripcion [varchar(255)]
      5. Cantidad [Int(255)]
  

4. Configurar el Apache  
   > Más bien que Configurar sino es saber donde se guarda este fichero de proyecto fnacrestauracion para que puedes usar con Xampp
     1. Ir a ruta donde tenga instalado el Xampp
     1. Entrar a xampp -> htdoc  
        <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Apache.png" width="500px" alt="El fichero de root web de Xampp HTDOC">
     1. Eliminar el index.html (Es el pagina principal de Xampp pero nosotros no lo necesitamos) y Crear un fichero vacia  
        <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Apache2.png" width="500px" alt="El pagina principal de Xampp">
     1. En el Fichero creada importar el proyecto  
        <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Apache3.png" width="500px" alt="Importar el proyecto al fichero vacio creada ">
5. Instalar un Compilador de Codigo
   instalar un cualquiera Compilador de Codigo.  
   Ej VisualCode [Instalar VisualStudio Code](https://code.visualstudio.com/)
   
## Realizar Test
Para Asegurar que todos los instalacion y configuracion anteriores estan bien realizada tenemos que hacer lo siguientes test:
  1. Crear un Usuario y ir a los Paginas para verificar la funcionalidad de Cuentas y creacion de Carritos
  2. Añadir varias Producto y Usar Ingrediente para verificar si los Clases de Productos y codigos de Carrito estan bien imporatada
  3. Crear el Pedido y ir a panel de Usuario para verificar que los procesos de "Creacion de Pedidos" estan bien hecho  

## Test 
  1. Crear Usuario y Crear Carrito  
     Crear Usuario (Hay que poner 2 veces, porque la primera es para registrar)  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/CuentaCarrito1.png" width="400px" alt="Crear Usuario ">  
    Entrar y veras el Pagina de Usuario  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/CuentaCarrito2.png" width="400px" alt="Ventana de Usuario">  
     Ir a un pagina Ej. Carta para ver si el Carrito se crea al hora de cambiar a otros paginas  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/CuentaCarrito3.png" width="300px" alt="Ver si el Carrito esta creada correctamente">  
  3. Añadir Producto y Producto con Ingredients
     Clica a "Añadir Producto" y Ver si en Carrito ha añadido o no  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/ProductoIngred1.png" width="400px" alt="Añadir un o varias Productos a Carrito ">  
     Clicar a Ingredientes para añadir Ingredientes  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/ProductoIngred2.png" width="400px" alt="Añadir Producto con Ingredientes">  
     Ver si ha creado correctamente el producto con Ingrediente  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/ProductoIngred3.png" width="400px" alt="Ver producto con Ingredientes esta añadido o no">  
     
  5. Crear Pedido y Verificar el Pedido  
     <img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/Pedido1.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">

## Lenguaje de programación utilizado
  1. PHP 8.1 o Mas
  2. HTML5
  3. JavaScript
  4. Css

### Parte PHP
#### Mayoria de parte de pagina esta contruido por PHP
Ej. Pagina de Home, Pagina de Carta (principal), todos accion que hacemos de iniciar session  
Registrar tanto como añadir, modificar y eliminar los contenidos esta hecho por codigo html
1. Home  
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/home.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">  

2. Carta  
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/carta.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">  

3. Carrito  
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/carrito.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">

5. Panel User  
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/panelUser.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">

7. Panel Pedido  
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/panelPedido.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">

9. Panel Admin  
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/panelAdmin.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">

### Parte Javascript
#### Hay partes de pagina esta hecho por javascript o combinacion de js con php
Ej. Pagina de Cartas (Filtrado), Opcion de carrito (Dar propina, aplicar Cupon etc), Pagina de resenya (Completamente)
Normalmente los paginas que necesita accion mas dinamica estaria construido o tiene parte de codigo Js  
1. Carta (Filtrado)  
Carta de Productos entrara por primera vez en PHP, se cambia como "modo" javascript desde de seleccionar cualquiera filtro de productos
Hace que se recarga toda la parte de producto con javascript y mostrar los productos con lo que hemos filtrado
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/cartaFiltrado.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">  

3. Carrito (Cupon y Propinas)  
El pagina de carrito esta hecho 90% con PHP, pero hay un parte pequeña de Cupon y propina esta hecho con Javascript
lo que hace el Cupon es calcular el punto de usuario para hacer un oferta de precio al producto de carrito y el de propina es para dar propina y convertir estos propina a punto de cupon
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/carritoCupon.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">  

4. Pagina de resenya  
Aqui se muestra todos los resenyas que hay en actualmente en bbdd de forma javascript.
Tambien tenemos opcion de filtrar por estrella o decir que se ordena por ascendente o descendente  
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/panelResenya.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">  

6. Pagina de Producto (Carousel de resenya)  
Mostrar un carousel donde se muestra todos los resenyas de ese producto hecho por usuario
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/carouselProducto.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">  

8. Pagina de Producto (Modal de dejar resenya)  
En pagina de productos podemos ver que existe un boton de "Dar Resenya" lo que nos muestra es un modal para poder dejar nuestro comentario para este producto
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/darResenya.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">  

10. QrCode (Se te redirecciona hacia pagina producto de este resenya)  
En el pagina de resenya de admin en cada resenya podemos ver un boton de "Qrcode" clicandose nos muestra un modal con un imagen Qr para podemos escanear y nos llevara hacia pagina de producto de ese resenya.
<img src="https://github.com/youdianleng/RestauracionFnac/blob/main/asset/qrCode.png" width="400px" alt="Ver si en panel de Pedido de Usuario esta creado el Pedido o no">

## Autor
Autor: Zhiou Zhu  
Puedes ver todos los desarrolladores que participan en este proyecto en la lista de colaboradores.

## Descripcion de Licencia
Este Proyecto esta firmado Licencia de MIT, Puedes saber mas informacion en **[Licencia.md]()

## Expresiones de gratitud
Tienda Fnac
