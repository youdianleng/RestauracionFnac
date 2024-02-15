//Variable donde se coje el numero de pedido de ultimo pedido
let ultimoPedidoHecho = document.getElementById("ultimoPedidoContent");

//Crear un localStorage con numero de ultimo pedido
localStorage.setItem('pedido', ultimoPedidoHecho.value);

//Guardar el variable con contenido guardado en local
let numeroPedido = localStorage.getItem('pedido');

// Obtener el objeto que tiene ID resetUltimoPedido
let resetUltimoPedidoButton = document.getElementById("resetUltimoPedido");

//Cuando clica al boton se realiza los siguientes acciones
resetUltimoPedidoButton.addEventListener("click",function(){
    //Guardar nuevamente el numeroPedido y realizar el opcion de setCookie de 1 hora
    let pedido = numeroPedido;
    setCookie('UltimoPedido', pedido, 3600);

    //Recargar la pagina 
    location.reload();
});

// Funcion para crear un Cookie atraves de PHP
function setCookie(cookieName, cookieValue, expirationInSeconds) {
    //Inficamos el fecha
    let d = new Date();

    //Inficamos el fecha sera el tiempo actual mas tiempo que pasamos 3600 por 1000, para que sea 1 hora
    d.setTime(d.getTime() + (expirationInSeconds * 1000));

    //Pasar a horario UTC
    let expires = "expires=" + d.toUTCString();

    //Crear el cookie
    document.cookie = cookieName + "=" + cookieValue + "; " + expires + "; path=/webs/GitProyect/GamingShop";
  }
  
  