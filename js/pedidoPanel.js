//Variable donde se coje el numero de pedido de ultimo pedido
let ultimoPedidoHecho = document.getElementById("ultimoPedidoContent");

//Crear un localStorage con numero de ultimo pedido
localStorage.setItem('pedido', ultimoPedidoHecho.value);

let numeroPedido = localStorage.getItem('pedido');


let resetUltimoPedidoButton = document.getElementById("resetUltimoPedido");

resetUltimoPedidoButton.addEventListener("click",function(){
    let pedido = numeroPedido;
    console.log(pedido);
    setCookie('UltimoPedido', pedido, 3600);
    location.reload();
});


function setCookie(cookieName, cookieValue, expirationInSeconds) {
    let d = new Date();
    d.setTime(d.getTime() + (expirationInSeconds * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + "; " + expires + "; path=/webs/GitProyect/GamingShop";
  }
  
  