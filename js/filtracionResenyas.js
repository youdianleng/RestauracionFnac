function fetchDataAndDisplayReviews(estrella,ordenar = null) {
    // Llama a la API con el nuevo valor
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'consultaReseñasEstrella',
            estrella: estrella,
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        let removeClaseResenya = document.getElementById("cajaDeResenya");
        removeClaseResenya.remove();
        mostrarReseñas(data);
        setParrafoHeightForAll();
    })
    .catch(error => {
        console.error(error);
    });
}

function getEstrellaSelected(estrella) {
    let estrellaSelected = estrella.value;
    selectedArray = [];
    selectedArray.push(estrellaSelected);
    fetchDataAndDisplayReviews(selectedArray);
    return estrellaSelected;
}


// Array de estrella y valor numerico para filtrar
function filtrarEstrellas(arrayEstrella, estrella) {
    let arrayGuardaResultado = [];

    let estrellaFiltrada = arrayEstrella.filter((elemento) => {
        if(elemento === estrella){
            arrayGuardaResultado.push(estrellaFiltrada);
        }
    });
    

    return arrayGuardaResultado;
}



//Pasa el array de estrella y el valor de si quiere descendende o ascendende
function ordenarEstrellas(arrayestrella,ascDesc){
    let arrayEstrellaSort = [];
    if(ascDesc == "asc"){
        arrayEstrellaSort = arrayestrella.sort((a,b) => a-b);
    }else if(ascDesc == "desc"){
        arrayEstrellaSort = arrayestrella.sort((a,b) => b-a);
    }
    fetchDataAndDisplayReviews(arrayEstrellaSort)
    return arrayEstrellaSort;
}   

//recibira el id de producto y volvera a pedir a API para nuevos informaciones
function soloCategoria(categoria){
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'categoria',
            selCategoria: categoria,
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        mostrarReseñas(data);
    })
    .catch(error => {
        console.error(error);
    });
}


//Devuelve los categorias 
function getTodosCategorias() {
    return new Promise((resolve, reject) => {
        fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                accion: 'TodoCategoria',
            }),
        })
        .then(response => response.json())
        .then(data => {
            resolve(data);
        })
        .catch(error => {
            reject(error);
        });
    });
}