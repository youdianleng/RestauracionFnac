//Buscar el usuario y realizar accion de insertar Propina como punto en su cuenta
function getUsuarioPropina(user_id,propinaSeleccionado){
    // Llama a la API con el nuevo valor
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'getUsuario',
            usuario: user_id,
            propinaDodat: propinaSeleccionado
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {

    })
    .catch(error => {
        console.error(error);
    });
}




//Realizar un busqueda de usuario y sus puntos para restar el precio de pedido
function getPropina(user_id){
    // Llama a la API con el nuevo valor
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'getPropina',
            usuario: user_id
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        aplicarPuntosCarrito(data);
    })
    .catch(error => {
        console.error(error);
    });
}


//Borrar el cupon de usuario si han aplicado el baja de propina
function deletePropina(user_id){
    // Llama a la API con el nuevo valor
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'borrarPropina',
            usuario: user_id
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
    })
    .catch(error => {
        console.error(error);
    });
}






let propinaCarrito = document.getElementById('verificarCarrito').value;
let PropinaDeUsuario = 0;

//Obtener el contenidor de PrecioTotal
let PrecioTotalGet = document.getElementById("precioTotal");
//Guardar el precio Original de PrecioTotal
let OriginalPrecioTotal = PrecioTotalGet.value;


if(propinaCarrito != 0){
    let propinaBox = document.getElementById('propina');

    let propinaBoxPrimero = document.createElement('div');
    let propinaBoxTexto = document.createElement('p');
    let propinaSelectBox = document.createElement('div');
    let propinaSelect = document.createElement('input');
    propinaSelect.type = "range";
    propinaSelect.setAttribute("min","3");
    propinaSelect.setAttribute("max","100");

    propinaBoxPrimero.classList.add("row","col-12","mt-2","mb-2");
    propinaBoxTexto.classList.add("txt18");
    propinaSelectBox.classList.add("col-12");
    propinaSelect.classList.add("col-12","mt-3","noBorderTop","noBorderLeft","noBorderRight");
    propinaSelect.id = "propinas";



    propinaBoxTexto.innerText = "Quiero dar Propinas!";

    propinaBox.append(propinaBoxPrimero);
    propinaBoxPrimero.append(propinaBoxTexto);
    propinaBoxPrimero.append(propinaSelectBox);
    propinaSelectBox.append(propinaSelect);

    let propinaSeleccionado = document.getElementById('propinas');
    let pPropinaSeleccionado = document.createElement("p");
    propinaSelectBox.append(pPropinaSeleccionado);
    pPropinaSeleccionado.id = "mostraPropina";

 
    //Crear el boto para resetear precio
    let ResetPropina = document.createElement("button");
    propinaSelectBox.append(ResetPropina);
    ResetPropina.classList.add("btn","btn-primary");
    ResetPropina.innerHTML = "Reset"



    
    propinaSeleccionado.addEventListener('input', function() {
        //Para cada vez cuando el usuario cambia el porcentaje se recupera el precio Original para volver hacer de nuevo los calculos
        PrecioTotalGet.value = OriginalPrecioTotal;
        
        //Recojer el valor porcentaje de propina seleccionado por usuario
        let cambioPropina = document.getElementById("propinas").value;
        //Obtener el contenidor de mostrar propina
        let pCambioPropina = document.getElementById("mostraPropina");

        //Hacer calculo de procentaje para saber la propina que esta dando el ususario
        pCambioPropina.innerHTML = "Has dado " + cambioPropina + "% de Propina!: " + Math.round((cambioPropina / 100) * PrecioTotalGet.value)  + "€ de Propina";
        PropinaDeUsuario = Math.round((cambioPropina / 100) * PrecioTotalGet.value);
        //Cambiar el tipo de valor de PrecioTotalGet para luego podemos hacer calculao
        let PrecioTotal = parseInt(PrecioTotalGet.value);
        PrecioTotalGet.value =  Math.round(PrecioTotal + cambioPropina / 100 * PrecioTotal);
        
        //Mostrar el precio cambiada con propina
        let precioMostrarIVA = document.getElementById("precioConIva");
        precioMostrarIVA.innerHTML = Math.round(PrecioTotalGet.value) + "€";
;
        //Llamar al funcion para saber si el usuario ha seleccionado propina o no
        getValorPropinaSelected();
    });


    ResetPropina.addEventListener("click", function(){
        let precioMostrarIVA = document.getElementById("precioConIva");
        precioMostrarIVA.innerHTML = Math.round(OriginalPrecioTotal) + "€";
        let pCambioPropina = document.getElementById("mostraPropina");
        pCambioPropina.innerHTML = "";
    })

   
}

//Preparar unos variables defecto
let usuario = "";
let propinaSeleccionado = 0;

//Funcion para cambiar el valor defecto de propina
function getValorPropinaSelected(){
    usuario = document.getElementById('UsuarioActual').value;
    propinaSeleccionado = PropinaDeUsuario;
}


//Funcion para aplicar puntos de propina a cuenta de usuario
function aplicarPunto(){
    if(propinaSeleccionado == 0){ 
        
    }else if(usuario == 22){
        notie.alert("Usuario Admin no pueden Realizar accion de Compra");
    }else{
        getUsuarioPropina(usuario,propinaSeleccionado);
    }
}


//Controlador de si el usuario ha pulsado el boton de aplicar puntos o no
let aplicarPuntoButton = document.getElementById("aplicarPuntos");

//Aplicar el cupon a precio
function aplicarPuntosCarrito(puntos){
    
    puntosUsuario = [];
    puntos.forEach(punto => {
        puntosUsuario.push({
            puntoUser: punto["puntosUsuarios"]
        })
    
    let precioMostrarIVA = document.getElementById("precioTotal");
    let MostrarIva = document.getElementById("precioConIva");
    let puntosPorcetajeAplicada = (punto["puntosUsuarios"] / 10);
    let PrecioTotalAplicarCupon = parseInt(precioMostrarIVA.value);
    MostrarIva.innerHTML = PrecioTotalAplicarCupon - Math.ceil(puntosPorcetajeAplicada) + "€";
    precioMostrarIVA.value = PrecioTotalAplicarCupon - Math.ceil(puntosPorcetajeAplicada);
    });
}

//Definir si el usuario ha aplicado cupon o no
let confirmarCupon = "";


aplicarPuntoButton.addEventListener("change",function() {
    usuario = document.getElementById('UsuarioActual').value;
    selectcion = this.checked ? "ON" : "OFF";
    if(selectcion == "ON"){
        confirmarCupon = "ON";
        getPropina(usuario);
        
        
    }else{
        confirmarCupon = "OFF";
        let MostrarIva = document.getElementById("precioConIva");
        
        if(OriginalPrecioTotal == ""){
            MostrarIva.innerHTML = "0€";
        }else{
            MostrarIva.innerHTML = OriginalPrecioTotal + "€";
        }
    }
})

let confirmarPagoConCupon = document.getElementById("finalizarCompra");

confirmarPagoConCupon.addEventListener("click",function(){
    if(confirmarCupon == "ON"){
        usuario = document.getElementById('UsuarioActual').value;
        deletePropina(usuario);
    }
});