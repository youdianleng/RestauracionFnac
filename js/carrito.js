function getUsuarioPropina(user_id){
    // Llama a la API con el nuevo valor
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'getUsuario',
            usuario: user_id
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log("data");
        if(data == null){
            aplicarPropinaUsuario(user_id,propinaSeleccionado)
        }
    })
    .catch(error => {
        console.error(error);
    });
}




function aplicarPropinaUsuario(user_id,propina) {
    console.log("hola");
    // Llama a la API con el nuevo valor
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'aplicarPropina',
            propina: propina,
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

if(propinaCarrito != 0){
    let propinaBox = document.getElementById('propina');

    let propinaBoxPrimero = document.createElement('div');
    let propinaBoxTexto = document.createElement('p');
    let propinaSelectBox = document.createElement('div');
    let propinaSelect = document.createElement('select');
    let propinaSelectDefault = document.createElement('option');
    let propinaSelectUnEuro = document.createElement('option');
    let propinaSelectTresEuro = document.createElement('option');
    let propinaSelectCincoEuro = document.createElement('option');
    let propinaSelectDiezEuro = document.createElement('option');
    let propinaSelectVeinteEuro = document.createElement('option');
    let propinaSelectCincuantaEuro = document.createElement('option');

    propinaBoxPrimero.classList.add("row","col-12","mt-2","mb-2");
    propinaBoxTexto.classList.add("txt18");
    propinaSelectBox.classList.add("col-12");
    propinaSelect.classList.add("col-12","mt-3","noBorderTop","noBorderLeft","noBorderRight");
    propinaSelect.id = "propinas";


    propinaSelectDefault.innerHTML = "Dar propinas";
    propinaSelectUnEuro.value = 1;
    propinaSelectUnEuro.innerHTML = "1€";
    propinaSelectTresEuro.value = 2;
    propinaSelectTresEuro.innerHTML = "2€";
    propinaSelectCincoEuro.value = 5;
    propinaSelectCincoEuro.innerHTML = "5€";
    propinaSelectDiezEuro.value = 10;
    propinaSelectDiezEuro.innerHTML = "10€";
    propinaSelectVeinteEuro.value = 20;
    propinaSelectVeinteEuro.innerHTML = "20€";
    propinaSelectCincuantaEuro.value = 50;
    propinaSelectCincuantaEuro.innerHTML = "50€";

    propinaBoxTexto.innerText = "Quiero dar Propinas!";

    propinaBox.append(propinaBoxPrimero);
    propinaBoxPrimero.append(propinaBoxTexto);
    propinaBoxPrimero.append(propinaSelectBox);
    propinaSelectBox.append(propinaSelect);
    propinaSelect.append(propinaSelectDefault);
    propinaSelect.append(propinaSelectUnEuro);
    propinaSelect.append(propinaSelectTresEuro);
    propinaSelect.append(propinaSelectCincoEuro);
    propinaSelect.append(propinaSelectDiezEuro);
    propinaSelect.append(propinaSelectVeinteEuro);
    propinaSelect.append(propinaSelectCincuantaEuro);

    let propinaSeleccionado = document.getElementById('propinas');
    propinaSeleccionado.addEventListener('change', function() {
        getValorPropinaSelected();
    });
   
}

let usuario = "";
let propinaSeleccionado = 0;
function getValorPropinaSelected(){
    usuario = document.getElementById('UsuarioActual').value;
    propinaSeleccionado = document.getElementById('propinas').value;
}

function aplicarPunto(){
    if(propinaSeleccionado == 0){ 
        
    }else{
        getUsuarioPropina(usuario);
    }
}