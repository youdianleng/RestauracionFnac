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
### Tablas de "fnacrestauracion"
    - **categoria**  
      > Es para indentificar y crear los categorias para elegir
      1. Categoria_id [Int(255) Primary_key autoincrement]
      2. Descripcion [varchar(255)]
      3. ImagenCategoria [varchar(255)]
      4. Nombre [varchar(255)]
    - **clientes**
    - **ingredientes**
    - **pedidos**
    - **pedidos_ingredientes**
    - **pedido_producto**
    - **productos**
    - **producto_ingredientes**
  

4. Configurar el Apache
5. Instalar un Compilador de Codigo


