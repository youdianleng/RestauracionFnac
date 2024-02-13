//Al entrar a pagina de reseñas carga los datos necesarios, ej(Estrellas,Reseñas,Valoracion etc)
document.addEventListener('DOMContentLoaded', function(){
   //llmar a api Controller para que haga el accion enviado
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api",{
        method : 'POST',
        headers: {
            'Content-Type':'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            //Indicar el nombre de accion que desea accionar
            accion: 'consultaReseñas',
        }),
    })
    .then(response => {
        return response.json();
    })
    //Devuelve los datos y usando este dato seguimos
    .then(data => {
        //Llamar al funcion pricipal para que se crea la pagina de reseña con los datos
        mostrarReseñas(data);
        setParrafoHeightForAll();
    })
    .catch(error => {
        console.error(error);
    });
})



//Funcion que mostrara todos los contenidos de pagina de reseña
function mostrarReseñas(reseny){
    //Obtener el contenidor principal
    const contenidorResenya = document.getElementById("contenidorResenya");
    contenidorResenya.classList.add("bg-f2","pb-5");

    // Creates parte Derecha de los reseñas
    const cajaResenya = document.createElement("div");
    const ValoracionEstrella = document.createElement("div");
    const subCaja = document.createElement("div");
    const subCajaRow = document.createElement("div");
    const subCajaRowUnoRow = document.createElement("div");
    const subCajaRowDos = document.createElement("div");
    
    // Creates parte Izquierdo
    const cajaValoracionEstrella = document.createElement("div");
    const cajaValoracionEstrellados = document.createElement("div");


    const filtraADscBox = document.createElement("div");
    filtraADscBox.classList.add("ascDescbutton");
    const textoDivCategoria = document.createElement("h2");
    filtraADscBox.append(textoDivCategoria);
    textoDivCategoria.innerHTML = "Filtrar por Ordre / Categoria";
    //Crear el form para los estrellas
    const formEstrella = document.createElement("form");
    formEstrella.classList.add("d-flex","col-6","row");

    const divFormEstrella = document.createElement("div");
    const textDivFormEstrella = document.createElement("h2");
    formEstrella.append(textDivFormEstrella);
    textDivFormEstrella.innerHTML = "Filtrar Por Estrellas";
    formEstrella.append(divFormEstrella)


    //Preparar el div de categorias
    const divCategoria = document.createElement("div");
    divCategoria.classList.add("divDeCategoria");


    // Añadir Classes
    cajaResenya.classList.add("cajaResenya");
    cajaResenya.id = "cajaDeResenya";
    ValoracionEstrella.classList.add("col-12" , "pt-5","bg-f2");
    subCaja.classList.add("col-12","subCaja","d-flex","bg-white");
    cajaValoracionEstrella.classList.add("col-12","cajaValoracionEstrella","d-flex");
    subCajaRow.classList.add("d-flex","subCajaRow", "col-12");
    subCajaRowDos.classList.add("row","col-12","subCajaRowDos");
    subCajaRowUnoRow.classList.add("row","col-12","subCajaRowUno");
    subCajaRowUnoRow.id = "subCajaRow";
    cajaValoracionEstrellados.classList.add("row","col-12","justify-content-start","FiltraBox");


    // Creat Textos
    const valoracionEstrellaTexto = document.createElement("h2");
    
    //Contenidos Textos
    valoracionEstrellaTexto.innerHTML = "Todas las Reseñas";
    valoracionEstrellaTexto.classList.add("mb-5");

    
    //Informacion muestra Izquierda
    subCaja.append(cajaValoracionEstrella);
    cajaValoracionEstrella.append(cajaValoracionEstrellados);
    cajaValoracionEstrellados.append(formEstrella);

    const cajaConjuntoOrdre = document.createElement("div");
    cajaConjuntoOrdre.classList.add("col-6");
    cajaConjuntoOrdre.append(filtraADscBox);
    cajaConjuntoOrdre.append(divCategoria);
    cajaValoracionEstrellados.append(cajaConjuntoOrdre);

    //Preparar el tag select para poder ordenar reseñas por ascendente o desendente


    const selectAscDesc = document.createElement("select");
    selectAscDesc.id = "selectAscDesc";
    selectAscDesc.classList.add("col-10","mt-4");

    //Crear  los option que va a estar dentro de select
    //Luego indicar el contenido de cada uno y el valor de cada uno
    const selectDefault = document.createElement("Option");
    selectDefault.innerHTML = "Ordenar Resenyas";
    const selectAscOption = document.createElement("Option");
    selectAscOption.value = "asc";
    selectAscOption.innerHTML = "Ascendente";
    const selectDescOption = document.createElement("Option");
    selectDescOption.value = "desc";
    selectDescOption.innerHTML = "Descendente";


    //Crear otro select para categorias
    const SelectCategoria = document.createElement("select")
    SelectCategoria.classList.add("col-10","mt-4");
    divCategoria.append(SelectCategoria);
    //Llamar al funcion de filtracionResenyas.js para obtener todos los categorias que existe en bbdd
    getTodosCategorias()
    .then(data => {
        //Hacer un bucle de los datos encontradas y separarlo en contenidos individuales
        data.forEach((items)=>{
            //Crea un option para cada uno de categorias
            let optionCategoria = document.createElement("option");
            //indicar el contenido de cada option
            optionCategoria.innerHTML = items['NombreCategoria']
            //insertar los option a dentro de select de categorias
            SelectCategoria.append(optionCategoria);
        })
    })
    .catch(error => {
        //Si el valor devuelve con error muestra
        console.error(error);
    });

    //Añadir los option de asc y desc en su caja de select
    filtraADscBox.append(selectAscDesc);
    selectAscDesc.append(selectDefault);
    selectAscDesc.append(selectAscOption);
    selectAscDesc.append(selectDescOption);




    //Array para estrellas
    let arrayEstrella = [];
    
    //Añadir los cantidad de estrellas que vamos a mostrar
    for(let estrellaArray = 1; estrellaArray < 6; estrellaArray++){
        //Cada vez que suma hace un añadir a arrayEstrella
        //Este caso el array tindra 1,2,3,4,5
        arrayEstrella.push(estrellaArray);
    }

    //Cuando el contenido de select cambia se realiza un funcion
    selectAscDesc.onchange = function(){
        //Optener el valor cambiada de select
        let selecValue = document.getElementById("selectAscDesc").value;

        //Llamar al funcion de ordenarEstrellas con el array y valor de select
        ordenarEstrellas(arrayEstrella,selecValue);
    }


    
    //Aqui se crea los estrellas para poder clicar en pagina de resenta
    for(let estrella = 0;estrella < 5;estrella++){
        //cada estrella tindra un input para seleccionar
        const estrellaFiltro = document.createElement("input");
        //Conteie un label para mostrar estrella
        const estrellaFiltroLabel = document.createElement("label");
        //Aplicar clase a label
        estrellaFiltroLabel.classList.add("col-11");

        //realizar un for para mostrar cantidad de estrella y los estrellas oscuros
        for (let i = 0; i < 5; i++) {
            //Si el valor i es menor o igual que estrella 
            if (i <= estrella) {
                // Mostrar estrella llena
                estrellaFiltroLabel.innerHTML += "<svg>"+
                    "<image href='Materiales/productoIndividual/valoracionOpiniones/Estrella.svg' width='15px' height='15px'>"
                +"</svg>";
            } else {
                // Mostrar estrella vacía
                estrellaFiltroLabel.innerHTML += "<svg>"+
                    "<image href='Materiales/productoIndividual/valoracionOpiniones/EstrellaVacia.svg' width='15px' height='15px'>"
                +"</svg>";
            }

            //indicar el tipo de input
            estrellaFiltro.type = "radio";
            //indicar el id de input
            estrellaFiltro.id = "estrella" + (estrella + 1);
            //indicar el valor de input
            estrellaFiltro.value = estrella+1;
        }

        //Asignar atributos al input
        estrellaFiltro.name = "estrella";
        estrellaFiltro.classList.add("col-1","mt-2");
        
        //cuando clicamos al input se activa este funcion
        estrellaFiltro.onchange = function() {
            //Enviar this(estrella) de input seleccionado al funcion
            getEstrellaSelected(this);
        };
        
        //Añadir el filtro y label de filtro a dentro de formulario
        divFormEstrella.append(estrellaFiltro);
        divFormEstrella.append(estrellaFiltroLabel);
    }
    

    // Informacion muestra Derecha
    contenidorResenya.append(cajaResenya);
    cajaResenya.append(ValoracionEstrella);
    ValoracionEstrella.append(valoracionEstrellaTexto);
    cajaResenya.append(subCaja);
    const cajaConjuntoEstrellaReseñas = document.createElement("div");
    cajaConjuntoEstrellaReseñas.classList.add("col-10");
    cajaConjuntoEstrellaReseñas.append(cajaValoracionEstrella);
    cajaConjuntoEstrellaReseñas.append(subCajaRow);
    subCajaRow.append(subCajaRowUnoRow);

   
    //Informacion de caja de redirige
    const cajaRedirigen = document.createElement("div");
    cajaRedirigen.classList.add("col-2","cajaRedirige");
    const gestionProductosMain = document.createElement("div");
    gestionProductosMain.classList.add("col-12","d-flex","boton","efectSelect","mt-2");
    const aGestionProductosMain = document.createElement("a");
    gestionProductosMain.append(aGestionProductosMain);
    aGestionProductosMain.classList.add("d-flex","align-items-center");
    aGestionProductosMain.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=user&action=adminPanel";
    const imgGestionProductosMain = document.createElement("img");
    aGestionProductosMain.append(imgGestionProductosMain);
    imgGestionProductosMain.src = "Materiales/productoIndividual/redirigeAdmin/ProductoGestion.svg";
    imgGestionProductosMain.setAttribute("height","30px");
    imgGestionProductosMain.setAttribute("width","30px");
    const divAGestionProductosMain = document.createElement("div");
    aGestionProductosMain.append(divAGestionProductosMain);
    divAGestionProductosMain.classList.add("gestionProducto","txt15","fw700","ps-2","black");
    divAGestionProductosMain.innerHTML = "Gestionar Productos";
    cajaRedirigen.append(gestionProductosMain);


    const gestionClientesMain = document.createElement("div");
    gestionClientesMain.classList.add("col-12","d-flex","boton","efectSelect","mt-2");
    const aGestionClientesMain = document.createElement("a");
    gestionClientesMain.append(aGestionClientesMain);
    aGestionClientesMain.classList.add("d-flex","align-items-center");
    aGestionClientesMain.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=user&action=panelCliente";
    const imgGestionClientesMain = document.createElement("img");
    aGestionClientesMain.append(imgGestionClientesMain);
    imgGestionClientesMain.src = "Materiales/productoIndividual/redirigeAdmin/UsuarioCliente.svg";
    imgGestionClientesMain.setAttribute("height","30px");
    imgGestionClientesMain.setAttribute("width","30px");
    const divAGestionClientesMain = document.createElement("div");
    aGestionClientesMain.append(divAGestionClientesMain);
    divAGestionClientesMain.classList.add("gestionProducto","txt15","fw700","ps-2","black");
    divAGestionClientesMain.innerHTML = "Gestionar Clientes";
    cajaRedirigen.append(gestionClientesMain);


    const gestionPedidosMain = document.createElement("div");
    gestionPedidosMain.classList.add("col-12","d-flex","boton","efectSelect","mt-2");
    const aGestionPedidosMain = document.createElement("a");
    gestionPedidosMain.append(aGestionPedidosMain);
    aGestionPedidosMain.classList.add("d-flex","align-items-center");
    aGestionPedidosMain.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=user&action=panelPedidos";
    const imgGestionPedidosMain = document.createElement("img");
    aGestionPedidosMain.append(imgGestionPedidosMain);
    imgGestionPedidosMain.src = "Materiales/productoIndividual/redirigeAdmin/NegroPaquete.svg";
    imgGestionPedidosMain.setAttribute("height","30px");
    imgGestionPedidosMain.setAttribute("width","30px");
    const divAGestionPedidosMain = document.createElement("div");
    aGestionPedidosMain.append(divAGestionPedidosMain);
    divAGestionPedidosMain.classList.add("gestionProducto","txt15","fw700","ps-2","black");
    divAGestionPedidosMain.innerHTML = "Gestionar Pedidos";
    cajaRedirigen.append(gestionPedidosMain);


    const gestionReseñasMain = document.createElement("div");
    gestionReseñasMain.classList.add("col-12","d-flex","boton","efectSelect","mt-2");
     const aGestionReseñasMain = document.createElement("a");
     gestionReseñasMain.append(aGestionReseñasMain);
    aGestionReseñasMain.classList.add("d-flex","align-items-center");
    aGestionReseñasMain.href = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=user&action=panelResenyas";
    const imgGestionReseñasMain = document.createElement("img");
    aGestionReseñasMain.append(imgGestionReseñasMain);
    imgGestionReseñasMain.src = "Materiales/productoIndividual/redirigeAdmin/clasificacion.svg";
    imgGestionReseñasMain.setAttribute("height","30px");
    imgGestionReseñasMain.setAttribute("width","30px");
    const divAGestionReseñasMain = document.createElement("div");
    aGestionReseñasMain.append(divAGestionReseñasMain);
    divAGestionReseñasMain.classList.add("gestionProducto","txt15","fw700","ps-2","black");
    divAGestionReseñasMain.innerHTML = "Ver Resenyas";
    cajaRedirigen.append(gestionReseñasMain);


    subCaja.append(cajaRedirigen);
    subCaja.append(cajaConjuntoEstrellaReseñas);

    //Preparar un array de comentario (No sirve para nada, solo es para poder ver mas clara los 
    //valor en individual de reseny)
    ArrayDeComentarios = [];
    
    //Prepara un Contador para que cada boton de QR tenga un id diferente
    contadorBucleIdQRButton = 1;

    //Realizar un foreach para sacar todos los contenidos de array en individual
    reseny.forEach(resenyaIndividual => {
        //Añadir al array creado anteriomente los contenidos separados con su nombre de id
        ArrayDeComentarios.push({
            user_id : resenyaIndividual['Nombre'],
            producto_id : resenyaIndividual['prod_id'],
            producto_nombre : resenyaIndividual['prod_Nombre'],
            estrella : resenyaIndividual['estrella'],
            valoracion : resenyaIndividual['valoracion']

        });


        // Crear div para los contenidos de reseña
        const subCajaRowDos = document.createElement("div");
        subCajaRowDos.classList.add("col-6", "CajasP", "noMarginBottom");
        
        //Crear un caja para cada comentario
        const cajaDetalleValoracion = document.createElement("div");
        cajaDetalleValoracion.classList.add("CajaDetalleValoracion","row","col-12","fw-bold");
    
        // Crear párrafo de usuario
        const Cliente = document.createElement("p");
        Cliente.classList.add("col-12", "pValoracion", "noMarginBottom");
        Cliente.innerHTML = resenyaIndividual['user_id'];

        //Crear párrado de nombre de producto
        const Producto = document.createElement("p");
        Producto.classList.add("col-12", "pValoracion", "noMarginBottom");
        Producto.innerHTML = resenyaIndividual['prod_Nombre'];

        //Crear párrafo de cuantos puntos han valorado el usuario
        const Estrella = document.createElement("p");
        Estrella.classList.add("col-12", "pValoracion", "noMarginBottom");
        Estrella.innerHTML = "Puntuación: ";
        //Realizar un for para añadir el cantidad necesario de valoracion de estrella
        for (let star = 0; star < resenyaIndividual['estrella']; star++) {
            Estrella.innerHTML += "<svg>"+
                "<image href='Materiales/productoIndividual/valoracionOpiniones/Estrella.svg' width='18px' height='18px'>"
            +"</svg>";
        }

        //Crear en el boton de eliminar Resenya
        let eliminarReseña = document.createElement("form");
        

        //Crear un button para Generar QR de Cada Resenyas
        let boxButton = document.createElement("div");
        boxButton.classList.add("d-flex","justify-content-end");
        boxButton.id = "boxButton";

        //Crear button de reseña
        let buttonQRResenya = document.createElement("button");
        buttonQRResenya.classList.add("btn","btn-primary","btnQrProd"); 
        buttonQRResenya.innerHTML = "QR Resenya";   
        //Añadir los atributos para poder activar el modal
        buttonQRResenya.setAttribute("data-bs-toggle","modal");
        buttonQRResenya.setAttribute("data-bs-target","#exampleModal");
        buttonQRResenya.id = "qrResenya";
        buttonQRResenya.value = resenyaIndividual['prod_id'];



        
        //Parrafo de comentario
        const Valoracion = document.createElement("p");
        Valoracion.classList.add("col-12", "pValoracion", "noMarginBottom","pComentario");
        Valoracion.innerHTML = resenyaIndividual['valoracion'];




        // Anidar párrafo dentro del div
        subCajaRowDos.append(Cliente);
        subCajaRowDos.append(Producto);
        subCajaRowDos.append(Estrella);
        subCajaRowDos.append(Valoracion);
        
        subCajaRowUnoRow.append(subCajaRowDos);

        // Añadir div dentro de cajaDetalleValoracion
        subCajaRowDos.append(cajaDetalleValoracion);

        cajaDetalleValoracion.append(Cliente);
        cajaDetalleValoracion.append(Producto);
        cajaDetalleValoracion.append(Estrella);
        cajaDetalleValoracion.append(Valoracion);
        cajaDetalleValoracion.append(boxButton);
        boxButton.append(buttonQRResenya);
        boxButton.append(eliminarReseña);

        //Obtener los botones que tengan misma className de QRCOde
        let obtenerProdQR = document.getElementsByClassName("btnQrProd");
        //hacer un for de todos ellos
        for(let i = 0; i < obtenerProdQR.length; i++){
            //Aplicar a cada uno de ellos 1 onclick para llamar a funcion
            obtenerProdQR[i].onclick = function(){
                //Pasaremos su valor a crearModal para crear codigo QR
                crearModal(obtenerProdQR[i].value);
                // crearModal(obtenerProdQR.value);
            }
        }
        
    });
    
    
}

//Para settear el height que usara el P de valoraciones

function setParrafoHeightForAll() {
    // Obtener todos los elementos con la clase "pValoracion"
    let parrafos = document.getElementsByClassName("pComentario");

    // Iterar sobre todos los elementos y aplicar la función setParrafoHeight
    for (let i = 0; i < parrafos.length; i++) {
        setParrafoHeight(parrafos[i]);
    }
}

function setParrafoHeight(parrafo) {
    // Verificar si el elemento existe
    if (parrafo) {
        // Obtener la altura de una línea
        let pValoracionHeight = parseFloat(getComputedStyle(parrafo).lineHeight);

        // Establecer la altura máxima para mostrar solo las dos primeras líneas
        let pValoracionLineaMostrar = 2;
        parrafo.style.maxHeight = pValoracionHeight * pValoracionLineaMostrar + "px";

    } else {
        console.error("Elemento parrafo no encontrado.");
    }
}



//Crear el Modal para QR 
function crearModal(prod_id){
    let modalMainBox = document.createElement("div");
    let modalDialogBox = document.createElement("div");
    let modalContentBox = document.createElement("div");
    let modalHeaderBox = document.createElement("div");
    let modalBodyBox = document.createElement("div");
    let modalFooterBox = document.createElement("div");

    //Contenidos header de Modal
    let h1ModalHeader = document.createElement("h1");
    let botonModalHeader = document.createElement("button");
    
    //Contenidos footer de Modal
    let closeModalFooter = document.createElement("button");
    let saveModalFooter = document.createElement("button");

    let ee = document.getElementById("subCajaRow")
    ee.append(modalMainBox);

    //Añadir los cajas segun estructura
    modalMainBox.append(modalDialogBox);
    modalDialogBox.append(modalContentBox);

    modalContentBox.append(modalHeaderBox);
        //Añadir contenido de Header Modal
        modalHeaderBox.append(h1ModalHeader);
        modalHeaderBox.append(botonModalHeader);

    modalContentBox.append(modalBodyBox);
    //Añadir contenido de Body Modal
    const QrCode = document.createElement("div");
    QrCode.id = "qrcode";
    QrCode.classList.add("d-flex","justify-content-end");
    // Data es donde aplicamos nuestro URL de WEb
    const data = 'https://localhost/webs/GitProyect/GamingShop/index.php?controller=user&action=panelResenyas&prod_id='+prod_id;

    // Cabiar el url para que sea dinamico
    const apiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=';

    // Usar el URL de API para crear el imagen
    const imageUrl = `${apiUrl}${encodeURIComponent(data)}`;

    // Mostrar el QR en pagina web
    QrCode.innerHTML = `<img src="${imageUrl}" alt="QR Code">`;

    //insetar a dentro de Modal el imagen de QR
    modalBodyBox.append(QrCode);

    modalContentBox.append(modalFooterBox);

    //Añadir contenido de Footer Modal
    modalFooterBox.append(closeModalFooter);
    modalFooterBox.append(saveModalFooter);
    modalMainBox.classList.add("modal","fade");
    modalMainBox.id = "exampleModal";
    modalMainBox.setAttribute("tabindex","-1");
    modalMainBox.setAttribute("aria-labelledby","exampleModalLabel");
    modalMainBox.setAttribute("aria-hidden","true");
    modalDialogBox.classList.add("modal-dialog","modal-dialog-centered");
    modalContentBox.classList.add("modal-content");


    //atributo de Header Modal
    modalHeaderBox.classList.add("modal-header");
    botonModalHeader.type = "button";
    botonModalHeader.classList.add("btn-close");
    botonModalHeader.setAttribute("data-bs-dismiss","modal");
    botonModalHeader.setAttribute("aria-label","Close");

    h1ModalHeader.innerHTML = "Consultar Producto";
    //atributo de body Modal
    modalBodyBox.classList.add("modal-body","d-flex","justify-content-center");

    //atributo de footer Modal
    modalFooterBox.classList.add("modal-header");
    closeModalFooter.type = "button";
    closeModalFooter.classList.add("btn","btn-secondary");
    closeModalFooter.setAttribute("data-bs-dismiss","modal");
    closeModalFooter.innerHTML = "Close";
    saveModalFooter.type = "button";
    saveModalFooter.innerHTML = "Save Changes";
    saveModalFooter.classList.add("btn","btn-primary");
  

}