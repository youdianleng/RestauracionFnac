
//Obtener todos los reseñas y luego usar funcion para mostrar
document.addEventListener('DOMContentLoaded', function(){
    
  // Obtener la cadena de consulta de la URL actual
  let queryString = window.location.search;

  // Crear un objeto URLSearchParams para manejar la cadena de consulta
  let searchParams = new URLSearchParams(queryString);

  // Obtener el valor del parámetro 'prod_id'
  let prodId = searchParams.get('prod_id');


  fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api",{
      method : 'POST',
      headers: {
          'Content-Type':'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        accion: "mostrarReseñasEnProducto",
        prod_id: prodId

      }),
  })
  .then(response => {
      return response.json();
  })
  .then(data => {
    mostrarReseñasEnBloques(data);
  })
  .catch(error => {
      console.error(error);
  });
})


//Añadir la reseña a base de dato
function RegistrarResenya(estrella,userId,valoracion,prodId) {
    // Llama a la API con el nuevo valor
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'añadirValoracion',
            estrella: estrella,
            usuario: userId,
            comentario: valoracion,
            producto: prodId
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        avisoAñadido();
    })
    .catch(error => {
        console.error(error);
    });
}






//Para realizar un control en los estrellas de Opionion de productos
let estrellaActualSelect = 0;

//Esto es para controlar los effectos de estrellas
function MoverEnEstrella(event) {
  //Obtener todos los contenedores que tiene name de star
  const stars = document.querySelectorAll('.star');
  //Obtener el posicion X de raton
  const mouseX = event.clientX;

  //Realizar un bucle de estrellas
  stars.forEach((star, index) => {
    //Obtenemos el valor de position de elemento original + el position hecho de scroll de toda la pagina
    const starPosition = star.getBoundingClientRect().left + window.scrollX;

    //Si el position de raton es mayor que position de estrellas
    if (mouseX >= starPosition) {
      //Aplica el color brillante
      star.style.color = '#ffc107';
    } else {
      //Aplciar color como gris
      star.style.color = '#ccc'; 
    }
  });
}

//Cuado el cursor este fuera de estrellas
function fueraDeEstrella() {
  //Obtiene el contenedor de todos que tenga clase de .star
  const stars = document.querySelectorAll('.star');
  //Realizar el bucle de todos los estrellas
  stars.forEach((star, index) => {
    if (index >= estrellaActualSelect) {
      star.style.color = '#ccc'; 
    }
  });
}


//Variable preparado para guardar el valoracion de estrella que introducido el usuario
let estrellaSeleccionada = 0;

//Al clicar al estrella pasar el valor de estrella al funcion
function clicarEstrella(numeroEstrella) {
  //actualizar el estrellaSeleccionada
  estrellaSeleccionada = numeroEstrella;
  //Actualiazar el estrella seleccionado actualmente
  estrellaActualSelect = numeroEstrella;
  const stars = document.querySelectorAll('.star');

  stars.forEach((star, index) => {
    if (index < estrellaActualSelect) {
      star.style.color = '#ffc107'; 
    } else {
      star.style.color = '#ccc'; 
    }
  });
}

// Obtén el valor actual del textarea y enviar junto con valoracion y prductos, userid a registrar el comentario
function enviarDatos() {
  //Obtener los dados necesarios
  let idUsuarioResenya = document.getElementById('idUser').value; 
  let resenya = document.getElementById('resenyaPorUsuario').value;
  let idProdResenya = document.getElementById('idProd').value;
  console.log(idUsuarioResenya);
  //Verifica que el cuenta no sea de Admin
  if(idUsuarioResenya == 22 ){
    //Se envia al pagina de producto donde se intenta a hacer el comentario
    window.location.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=Producto&&action=productoPanel&prod_id="+idProdResenya;
    notie.alert({ type: 'success', text: 'Usuario Admin no permite dejar comentario!', time: 2 })
  }else if(estrellaSeleccionada == 0){ //En caso de que no hayan seleccionado estrella
    //Informa de que hay que seleccionar por menos 1 estrella
    notie.alert({ type: 'success', text: 'Te falta poner por menos 1 estrella!', time: 2 })
  }else if(idUsuarioResenya == ""){//Cuando el usuario no esta iniciado el session
    //Avisa de que usaurio hay que iniciar session
    notie.alert({ type: 'success', text: 'Debes iniciar session para poder dejar tu comentario!', time: 2 })
    //Pregunta al usuario si quiere iniciar session
    let iniciar = confirm("Quieres iniciar tu session ahora?");
    //Encaso de "Si" envia al pagina de iniciar session
    if(iniciar){
        window.location.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=user&action=IniciarSession";
    }
  }else{
    if(resenya == ""){//Si el usuario no ha dejado comentario, se pondra un comentario automatico en bbdd
        resenya = "El usuario no ha calificado el artículo en detalle.";
    }
    //Avisa al usuario que su comentario ha sido en exito
    notie.alert({ type: 'success', text: 'GRACIAS POR TUS OPINIONES!', time: 2 })

    //Llamar al funcion para registrar el usuario con sus opiniones
    RegistrarResenya(estrellaSeleccionada,idUsuarioResenya,resenya,idProdResenya);

    
  }
  
}




//Control de imagen de producto que desliza
window.addEventListener('scroll', function() {
    //Obtener el posicion Y de la pagina
    let scrollTop = window.scrollY;

    //Obtener todos los contenedores que hay clase de contenedor
    let contenedor = document.querySelector('.contenedor');
    //Obtener todos los contenedores que hay clase de  imagen-fija
    let imagenFija = document.querySelector('.imagen-fija');

    //Indicar el desplazamiento maxima de imagen, calculando el altura de contenedor donde guarda los imagen
    //Con la altura de imagen
    let maxDesplazamiento = contenedor.clientHeight - imagenFija.clientHeight;

    // Ajustar la posición de la imagen dentro del rango permitido
    let nuevaPosicion = Math.min(maxDesplazamiento, Math.max(0, scrollTop));
    imagenFija.style.top = nuevaPosicion + 'px';
  });



//Crear los muestras de resenyas
function mostrarReseñasEnBloques(reseñas){
    //obtener el caja principal de los reseñas
    let cajaPrincipalReseñasProductos = document.getElementById("innerBox");

    //Prepara variables para poder realizar creacion de contenedores
    let contadorReseñas;
    let contadorResenBucle = 0;
    let arrayReseñas = [];
    let cantidadOpiniones = 0;
      //sacar los contenidos de array reseñas
      reseñas.forEach(resen => {
        cantidadOpiniones += 1;
        arrayReseñas.push({
          valoracion: resen["Valoracion"],
          estrella: resen["Estrellas"],
          nombre: resen["Nombre"]
        })
        
      //Aqui se crea los carousel pricipales y los subCarousel
      //Cada vez cuando moderamos a 3 = 0 entra para crear un nueva contenedor de carousel
      if(contadorResenBucle % 3 == 0){
        //todos los codigos de aqui son para crear un contenedor de carousel con sus contenidos
        contadorReseñas = contadorResenBucle;
        let boxPricipalCarousel = document.createElement("div");
        cajaPrincipalReseñasProductos.append(boxPricipalCarousel);
        boxPricipalCarousel.id = "boxPrincipalCarousel"+contadorResenBucle;
        boxPricipalCarousel.classList.add("carousel-item","col-12");
        
        //Cojer el cajaPrincipal actual para añadir los reseñas
        let boxReseñaActual = document.getElementById("boxPrincipalCarousel"+contadorResenBucle);
        let carouselItemSecond = document.createElement("div");
        boxReseñaActual.append(carouselItemSecond);
        carouselItemSecond.classList.add("d-block","w-100","d-flex","carouselItem2");
        carouselItemSecond.id = "carouselItem2"+contadorReseñas;
        let carouselItemSecondDiv = document.createElement("div");
        carouselItemSecond.append(carouselItemSecondDiv);
        carouselItemSecondDiv.classList.add("paddingCarousel","borderLeft","bd-f4f","col-4");

        let carouselItemSecondDiva = document.createElement("a");
        carouselItemSecondDiv.append(carouselItemSecondDiva);
        carouselItemSecondDiva.classList.add("marginBot16","txt19","black","fw-bold");
        carouselItemSecondDiva.innerHTML = resen["Nombre"];

        let carouselItemSecondDivTwo = document.createElement("div");
        carouselItemSecondDiv.append(carouselItemSecondDivTwo);
        carouselItemSecondDivTwo.classList.add("d-flex","marginBot16","align-items-center");

        let carouselItemSecondDivTwoSvg = document.createElement("svg");
        carouselItemSecondDivTwo.append(carouselItemSecondDivTwoSvg);
        carouselItemSecondDivTwoSvg.classList.add("svgEstrellaSmall");
        
        let carouselItemSecondDivTwoSvgImg = document.createElement("image");
        carouselItemSecondDivTwoSvg.append(carouselItemSecondDivTwoSvgImg);
        carouselItemSecondDivTwoSvgImg.setAttribute("href","Materiales/productoIndividual/valoracionOpiniones/Estrella.png");
        carouselItemSecondDivTwoSvgImg.setAttribute("height", "18px");
        carouselItemSecondDivTwoSvgImg.setAttribute("width", "18px");
        let carouselItemSecondDivTwoSvgP = document.createElement("p");
        carouselItemSecondDivTwo.append(carouselItemSecondDivTwoSvgP);
        carouselItemSecondDivTwoSvgP.classList.add("noMarginBottom","ms-1","colorF5");
        carouselItemSecondDivTwoSvgP.innerHTML = resen["Estrellas"];


        let divMainTickaSmall = document.createElement("div");
        carouselItemSecondDiv.append(divMainTickaSmall);
        divMainTickaSmall.classList.add("d-flex","align-items-center");
        
        let divTickaSmall = document.createElement("svg");
        divMainTickaSmall.append(divTickaSmall);
        divTickaSmall.classList.add("svgTickaSmall");

        let TickSmallImage = document.createElement("image");
        divTickaSmall.append(TickSmallImage);
        TickSmallImage.setAttribute("href","Materiales/productoIndividual/valoracionOpiniones/tick.png");
        TickSmallImage.setAttribute("height", "10.73px");
        TickSmallImage.setAttribute("width", "10.73px");

        let TickSmallP = document.createElement("p");
        divMainTickaSmall.append(TickSmallP);
        TickSmallP.classList.add("txt11","noMarginBottom","espacioLetter2","ms-1","mb-3");
        TickSmallP.innerHTML = "COMPRAS VERIFICADAS";

        let fechaDivSvgTickaSmallMain = document.createElement("p");
        let rapidoDivSvgTickaSmallMain = document.createElement("p");
        let valoracionDivSvgTickaSmallMain = document.createElement("p");
        carouselItemSecondDiv.append(fechaDivSvgTickaSmallMain);
        carouselItemSecondDiv.append(rapidoDivSvgTickaSmallMain);
        carouselItemSecondDiv.append(valoracionDivSvgTickaSmallMain);
        fechaDivSvgTickaSmallMain.innerHTML = "Publicado el 14 oct. 2021";
        rapidoDivSvgTickaSmallMain.innerHTML = "Rápido y perfecto";
        valoracionDivSvgTickaSmallMain.innerHTML = resen["Valoracion"];
        fechaDivSvgTickaSmallMain.classList.add("txt13","mb-3");
        rapidoDivSvgTickaSmallMain.classList.add("marginBot16","txt16","fw-bold","mb-3");
        valoracionDivSvgTickaSmallMain.classList.add("marginBot16","txt14");

      }else{
        //todos los codigos de aqui son para crear un contenedor de carousel con sus contenidos
        //Cojer el cajaPrincipal actual para añadir los reseñas
        let boxReseñaActual = document.getElementById("carouselItem2"+contadorReseñas);

        let carouselItemSecondDiv = document.createElement("div");
        boxReseñaActual.append(carouselItemSecondDiv);
        carouselItemSecondDiv.classList.add("paddingCarousel","borderLeft","bd-f4f","col-4");

        let carouselItemSecondDiva = document.createElement("a");
        carouselItemSecondDiv.append(carouselItemSecondDiva);
        carouselItemSecondDiva.classList.add("marginBot16","txt19","black","fw-bold");
        carouselItemSecondDiva.innerHTML = resen["Nombre"];

        let carouselItemSecondDivTwo = document.createElement("div");
        carouselItemSecondDiv.append(carouselItemSecondDivTwo);
        carouselItemSecondDivTwo.classList.add("d-flex","marginBot16","align-items-center");

        let carouselItemSecondDivTwoSvg = document.createElement("svg");
        carouselItemSecondDivTwo.append(carouselItemSecondDivTwoSvg);
        carouselItemSecondDivTwoSvg.classList.add("svgEstrellaSmall");
        
        let carouselItemSecondDivTwoSvgImg = document.createElement("image");
        carouselItemSecondDivTwoSvg.append(carouselItemSecondDivTwoSvgImg);
        carouselItemSecondDivTwoSvgImg.setAttribute("href","Materiales/productoIndividual/valoracionOpiniones/Estrella.png");
        carouselItemSecondDivTwoSvgImg.setAttribute("height", "18px");
        carouselItemSecondDivTwoSvgImg.setAttribute("width", "18px");

        let carouselItemSecondDivTwoSvgP = document.createElement("p");
        carouselItemSecondDivTwo.append(carouselItemSecondDivTwoSvgP);
        carouselItemSecondDivTwoSvgP.classList.add("noMarginBottom","ms-1","colorF5");
        carouselItemSecondDivTwoSvgP.innerHTML = resen["Estrellas"];


        let divMainTickaSmall = document.createElement("div");
        carouselItemSecondDiv.append(divMainTickaSmall);
        divMainTickaSmall.classList.add("d-flex","align-items-center");
        
        let divTickaSmall = document.createElement("svg");
        divMainTickaSmall.append(divTickaSmall);
        divTickaSmall.classList.add("svgTickaSmall");

        let TickSmallImage = document.createElement("image");
        divTickaSmall.append(TickSmallImage);
        TickSmallImage.setAttribute("href","Materiales/productoIndividual/valoracionOpiniones/tick.png");
        TickSmallImage.setAttribute("height", "10.73px");
        TickSmallImage.setAttribute("width", "10.73px");

        let TickSmallP = document.createElement("p");
        divMainTickaSmall.append(TickSmallP);
        TickSmallP.innerHTML = "COMPRAS VERIFICADAS";
        TickSmallP.classList.add("txt11","noMarginBottom","espacioLetter2","ms-1","mb-3");

        let fechaDivSvgTickaSmallMain = document.createElement("p");
        let rapidoDivSvgTickaSmallMain = document.createElement("p");
        let valoracionDivSvgTickaSmallMain = document.createElement("p");
        carouselItemSecondDiv.append(fechaDivSvgTickaSmallMain);
        carouselItemSecondDiv.append(rapidoDivSvgTickaSmallMain);
        carouselItemSecondDiv.append(valoracionDivSvgTickaSmallMain);
        fechaDivSvgTickaSmallMain.innerHTML = "Publicado el 14 oct. 2021";
        rapidoDivSvgTickaSmallMain.innerHTML = "Rápido y perfecto";
        valoracionDivSvgTickaSmallMain.innerHTML = resen["Valoracion"];
        fechaDivSvgTickaSmallMain.classList.add("txt13","mb-3");
        rapidoDivSvgTickaSmallMain.classList.add("marginBot16","txt16","fw-bold","mb-2");
        valoracionDivSvgTickaSmallMain.classList.add("marginBot16","txt14");
      }

      //Indicar al carousel el primero carousel que va a mostrar
      let activaItemPricipal = document.getElementById("boxPrincipalCarousel0");
      activaItemPricipal.classList.add("active");
      contadorResenBucle += 1;
    })
    let mostrarCantidadOpiniones = document.getElementById("cantidadOpiniones");
    mostrarCantidadOpiniones.innerHTML = cantidadOpiniones + " - Opiniones";
}
