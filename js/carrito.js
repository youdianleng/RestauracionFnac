//Buscar el usuario y realizar accion de insertar Propina como punto en su cuenta
function getUsuarioPropina(user_id,propinaSeleccionado){
    // Llama a la API con los valores
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





//Obtenedra el valor de carrito, para saber si carrito hay producto o no
let propinaCarrito = document.getElementById('verificarCarrito').value;

//el propina principal de usuario sera 0, para luego hacer calculos de precio con propina
let PropinaDeUsuario = 0;

//Obtener el contenidor de PrecioTotal
let PrecioTotalGet = document.getElementById("precioTotal");
//Guardar el precio Original de PrecioTotal
let OriginalPrecioTotal = PrecioTotalGet.value;

//Cuando el carrito hay contenido
if(propinaCarrito != 0){
    let propinaBox = document.getElementById('propina');

    //Crear el caja div de Button para dar propinas
    let propinaBoxPrimero = document.createElement('div');
    let propinaBoxTexto = document.createElement('p');
    let propinaSelectBox = document.createElement('div');
    //Crear el input para que usuario pueda seleccionar el porcentaje de propina
    let propinaSelect = document.createElement('input');
    //Hacer que input sea de tipo range
    propinaSelect.type = "range";
    //Asignar attributos de valor minimo y maximo de range
    propinaSelect.setAttribute("min","3");
    propinaSelect.setAttribute("max","100");

    //Aplicar los class
    propinaBoxPrimero.classList.add("row","col-12","mt-2","mb-2");
    propinaBoxTexto.classList.add("txt18");
    propinaSelectBox.classList.add("col-12");
    propinaSelect.classList.add("col-12","mt-3","noBorderTop","noBorderLeft","noBorderRight");
    propinaSelect.id = "propinas";
    propinaBoxTexto.innerText = "Quiero dar Propinas!";

    //Añadir los cajas a los cajas padres de cada uno de ellos
    propinaBox.append(propinaBoxPrimero);
    propinaBoxPrimero.append(propinaBoxTexto);
    propinaBoxPrimero.append(propinaSelectBox);
    propinaSelectBox.append(propinaSelect);

    //Obtener el caja Propina creado
    let propinaSeleccionado = document.getElementById('propinas');
    //Crear un parrafo para mostrar propinas
    let pPropinaSeleccionado = document.createElement("p");
    //Añadir el parrafo a caja de propina y aplicar un id
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

    //Al clicar al boton de reset
    ResetPropina.addEventListener("click", function(){
        //Obtineen el precioConIva
        let precioMostrarIVA = document.getElementById("precioConIva");
        //Mostrar el precio original guardado en variable antes creadas.
        precioMostrarIVA.innerHTML = Math.round(OriginalPrecioTotal) + "€";
        //Quitar los textos mostrados en range de propina
        let pCambioPropina = document.getElementById("mostraPropina");
        pCambioPropina.innerHTML = "";
    })

   
}

//Preparar unos variables defecto
let usuario = "";
let propinaSeleccionado = 0;

//Funcion para cambiar el valor defecto de propina
function getValorPropinaSelected(){
    //Obtener el usuario actual iniciado
    usuario = document.getElementById('UsuarioActual').value;
    //cambiar el valor de propinaSeleccionado por el nueva 
    propinaSeleccionado = PropinaDeUsuario;
}


//Funcion para aplicar puntos de propina a cuenta de usuario
function aplicarPunto(){
    //Cuando el usuario no nos da propina no hacemos nada
    if(propinaSeleccionado == 0){ 
        
    }else if(usuario == 22){ //Si el usuario es admin mostra el alert
        notie.alert("Usuario Admin no pueden Realizar accion de Compra");
    }else{//En otros casos apicamos el punto a usuario corresponente
        getUsuarioPropina(usuario,propinaSeleccionado);
    }
}


//Controlador de si el usuario ha pulsado el boton de aplicar puntos o no
let aplicarPuntoButton = document.getElementById("aplicarPuntos");

//Aplicar el cupon a precio
function aplicarPuntosCarrito(puntos){
    //Crear un array para puntos de usuario
    puntosUsuario = [];
    //foreach para sacar los contenidos individual
    puntos.forEach(punto => {
        puntosUsuario.push({
            puntoUser: punto["puntosUsuarios"]
        })
    
    //obtenemos el div donde muestra el precioTotal de carrito
    let precioMostrarIVA = document.getElementById("precioTotal");
    //obtenemos el div donde muestra el precioTotal con IVA de carrito
    let MostrarIva = document.getElementById("precioConIva");
    //hacer un calculo de puntos dividido en 10
    let puntosPorcetajeAplicada = (punto["puntosUsuarios"] / 10);
    //Pasamos el valor de precioMostrarIva en Int para poder hacer calculo
    let PrecioTotalAplicarCupon = parseInt(precioMostrarIVA.value);
    //Realizar el calculo de precio menos puntos
    let calculoPuntos = PrecioTotalAplicarCupon - Math.ceil(puntosPorcetajeAplicada);
    
    //Evitamos de que precio de puntos sea mayor que precio que va a pagar
    //Para que no se muestra como -
    if(0 > calculoPuntos){
        MostrarIva.innerHTML = 0 + "€";
        precioMostrarIVA.value = 0;
    }else{ //En otros casos realiza el caulo y aplica.
        MostrarIva.innerHTML = PrecioTotalAplicarCupon - Math.ceil(puntosPorcetajeAplicada) + "€";
        precioMostrarIVA.value = PrecioTotalAplicarCupon - Math.ceil(puntosPorcetajeAplicada);
    }
    });
}

//Definir si el usuario ha aplicado cupon o no
let confirmarCupon = "";

//Cuando cambia el valor de boton aplicarPunto realiza el funcion
aplicarPuntoButton.addEventListener("change",function() {
    //actualizamos el usuario con el usuario actual
    usuario = document.getElementById('UsuarioActual').value;

    //El valor de selectcion se cambia depende que que boton hemos seleccionado
    selectcion = this.checked ? "ON" : "OFF";
    //Cuando sea PM
    if(selectcion == "ON"){
        //Cambiamos el confirmarCupon en ON
        confirmarCupon = "ON";
        //tenemos que ver que precio de carrito no sea vacio
        if(OriginalPrecioTotal != ""){
            //Ontener el cantidad de propina dado por usuario actual
            getPropina(usuario);
        }
        
        
        
    }else{
        //Cuando se no aplica los Puntos, el valor de confirmarCupon va ser OFF
        confirmarCupon = "OFF";
        //Obtenemos el div de precioTotal y de PrecioTotal con IVA
        let precioMostrarIVA = document.getElementById("precioTotal");
        let MostrarIva = document.getElementById("precioConIva");

        //Cuando el precio de carrito es vacio
        if(OriginalPrecioTotal == ""){
            //Pogamos que el valor de y muestro sea 0
            precioMostrarIVA.value = 0;
            MostrarIva.innerHTML = 0 + "€";
        }else{
            //En otros casos muestra el valor original que debe mostrar cuando no aplica los propinas
            precioMostrarIVA.value = OriginalPrecioTotal;
            MostrarIva.innerHTML = OriginalPrecioTotal + "€";
        }
    }
})

//Obtener el button de finalizar compras
let confirmarPagoConCupon = document.getElementById("finalizarCompra");

//cuando clicamos al finalizar compras hace el funcion
confirmarPagoConCupon.addEventListener("click",function(){
    //Cuando el cupon sea ON 
    if(confirmarCupon == "ON"){
        //actualizamos el usuario al usuario actual iniciada
        usuario = document.getElementById('UsuarioActual').value;
        //Usar el funcion para eliminar los puntos que hay de usuario
        deletePropina(usuario);
    }
});