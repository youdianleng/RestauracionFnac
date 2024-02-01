function getUsuarioPropina(user_id,propinaSeleccionado){
    console.log(user_id);
    console.log(propinaSeleccionado);
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
        console.log("Buenos noches");
    })
    .catch(error => {
        console.error(error);
    });
}




let propinaCarrito = document.getElementById('verificarCarrito').value;
let PropinaDeUsuario = 0;
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


    //Obtener el contenidor de PrecioTotal
    let PrecioTotalGet = document.getElementById("precioTotal");

    //Guardar el precio Original de PrecioTotal
    let OriginalPrecioTotal = PrecioTotalGet.value;
    
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
        
    }else{
        getUsuarioPropina(usuario,propinaSeleccionado);
    }
}