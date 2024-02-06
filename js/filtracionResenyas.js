function MostrarContenidosSeleccionado(estrella,ordenar = null) {
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
        //Obtener el caja que contiene los reseñas
        let removeClaseResenya = document.getElementById("cajaDeResenya");
        //Borrar todos los que contiene en caja de reseñas
        removeClaseResenya.remove();
        //Volver a cargar el funcion para mostrar todos los contenidos de reseñas
        //Funcion ubicado en Reseñas.js
        mostrarReseñas(data);
        setParrafoHeightForAll();
    })
    .catch(error => {
        console.error(error);
    });
}

//Funcion que se carga de saber cantidad de estrella seleccionado por usuario
function getEstrellaSelected(estrella) {
    //El estrella es un objeto pasado por un onchange de reseñas.js
    let estrellaSelected = estrella.value;
    //Crear un array
    selectedArray = [];
    //añadimos el estrellaSelected al array, porque el accion de MostrarContenidosSeleccionado solo acepta array
    selectedArray.push(estrellaSelected);
    //Pasar el array a funcion
    MostrarContenidosSeleccionado(selectedArray);
    return estrellaSelected;
}


// Array de estrella y valor numerico para filtrar
function filtrarEstrellas(arrayEstrella, estrella) {
    //Crear el array para filter
    let arrayGuardaResultado = [];

    //El variable guardara valor de cada vez que se encuentra de arrayEstrella
    let estrellaFiltrada = arrayEstrella.filter((elemento) => {
        if(elemento === estrella){
            //Cuando encuentra valor que es mismo de estrella que buscamos se añade al array el elemento actual
            arrayGuardaResultado.push(estrellaFiltrada);
        }
    });
    

    return arrayGuardaResultado;
}



//Pasa el array de estrella y el valor de si quiere descendende o ascendende
function ordenarEstrellas(arrayestrella,ascDesc){
    //Crear un array para ordenar
    let arrayEstrellaSort = [];

    //Cuando sea asc
    if(ascDesc == "asc"){
        //el array se ordenara de forma ascendente
        arrayEstrellaSort = arrayestrella.sort((a,b) => a-b);
    //Cuando sea desc
    }else if(ascDesc == "desc"){
        //el array se ordenara de forma descendente
        arrayEstrellaSort = arrayestrella.sort((a,b) => b-a);
    }

    //Pasar el array a funcion de MostrarContenidosSeleccionado
    MostrarContenidosSeleccionado(arrayEstrellaSort)
    return arrayEstrellaSort;
}   

//recibira el id de categoria y volvera a pedir a API para nuevos informaciones
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


//Devuelve todos los categorias 
function getTodosCategorias() {
    //realizar un operacion asyncrono para obetener los datos 
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