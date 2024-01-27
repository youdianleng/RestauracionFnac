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
let currentRating = 0;

function MoverEnEstrella(event) {
  const stars = document.querySelectorAll('.star');
  const mouseX = event.clientX;

  stars.forEach((star, index) => {
    const starPosition = star.getBoundingClientRect().left + window.scrollX;
    if (mouseX >= starPosition) {
      star.style.color = '#ffc107';
    } else {
      star.style.color = '#ccc'; 
    }
  });
}

function fueraDeEstrella() {
  const stars = document.querySelectorAll('.star');
  stars.forEach((star, index) => {
    if (index >= currentRating) {
      star.style.color = '#ccc'; 
    }
  });
}


//Variable preparado para guardar el valoracion de estrella que introducido el usuario
let estrellaSeleccionada = 0;

function clicarEstrella(numeroEstrella) {
  estrellaSeleccionada = numeroEstrella;
  currentRating = numeroEstrella;
  const stars = document.querySelectorAll('.star');

  stars.forEach((star, index) => {
    if (index < currentRating) {
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

  //Verifica que el cuenta no sea de Admin
  if(idUsuarioResenya == 22 ){
    window.location.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=Producto&&action=productoPanel&prod_id="+idProdResenya;
    alert("Usuario Admin no puedo dejar un comentario");
  }else if(estrellaSeleccionada == 0){
    alert("Te falta poner por menos 1 estrella");
  }else if(idUsuarioResenya == "nadie"){
    alert("Debes iniciar session para poder dejar tu comentario");
    let iniciar = confirm("Quieres iniciar tu session ahora?");
    if(iniciar){
        window.location.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=user&action=IniciarSession";
    }
  }else{
    if(resenya == ""){
        resenya = "El usuario no ha calificado el artículo en detalle.";
    }
    alert("GRACIAS POR TUS OPINIONES !!!!");
    RegistrarResenya(estrellaSeleccionada,idUsuarioResenya,resenya,idProdResenya);
  }
  
}




//Control de foto de producto que desliza
window.addEventListener('scroll', function() {
    let scrollTop = window.scrollY;
    let contenedor = document.querySelector('.contenedor');
    let imagenFija = document.querySelector('.imagen-fija');

    let maxDesplazamiento = contenedor.clientHeight - imagenFija.clientHeight;

    // Ajustar la posición de la imagen dentro del rango permitido
    let nuevaPosicion = Math.min(maxDesplazamiento, Math.max(0, scrollTop));

    imagenFija.style.top = nuevaPosicion + 'px';
  });

