
document.addEventListener('DOMContentLoaded', function(){
   
    fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api",{
        method : 'POST',
        headers: {
            'Content-Type':'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            accion: 'consultaReseñas',
        }),
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        mostrarReseñas(data);
        setParrafoHeightForAll();
    })
    .catch(error => {
        console.error(error);
    });
})


function mostrarReseñas(reseny){
    const contenidorResenya = document.getElementById("contenidorResenya");
    // Creates parte Derecha
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

    const formEstrella = document.createElement("form");
    formEstrella.classList.add("d-flex");

    const divFormEstrella = document.createElement("div");
    formEstrella.append(divFormEstrella)

    const divCategoria = document.createElement("div");
    divCategoria.classList.add("divDeCategoria");
    

    // Añadir Classes
    cajaResenya.classList.add("cajaResenya");
    cajaResenya.id = "cajaDeResenya";
    ValoracionEstrella.classList.add("col-12" , "mt-4");
    subCaja.classList.add("d-flex","col-12","subCaja");
    cajaValoracionEstrella.classList.add("col-2","cajaValoracionEstrella");
    subCajaRow.classList.add("d-flex","subCajaRow", "col-10");
    subCajaRowDos.classList.add("row","col-12","subCajaRowDos");
    subCajaRowUnoRow.classList.add("row","col-12","subCajaRowUno");
    subCajaRowUnoRow.id = "subCajaRow";
    cajaValoracionEstrellados.classList.add("row","col-12","justify-content-start","FiltraBox");

    // Creat Textos
    const valoracionEstrellaTexto = document.createElement("h2");
    
    //Contenidos Textos
    valoracionEstrellaTexto.innerHTML = "Reseñas";
    

    
    //Informacion muestra Izquierda
  
    subCaja.append(cajaValoracionEstrella);
    cajaValoracionEstrella.append(cajaValoracionEstrellados);
    cajaValoracionEstrellados.append(formEstrella);
    cajaValoracionEstrellados.append(filtraADscBox);
    cajaValoracionEstrellados.append(divCategoria);

    const selectAscDesc = document.createElement("select");
    selectAscDesc.id = "selectAscDesc";
    selectAscDesc.classList.add("col-10","mt-4");

    const selectDefault = document.createElement("Option");
    selectDefault.innerHTML = "Ordenar Resenyas";
    const selectAscOption = document.createElement("Option");
    selectAscOption.value = "asc";
    selectAscOption.innerHTML = "Ascendente";
    const selectDescOption = document.createElement("Option");
    selectDescOption.value = "desc";
    selectDescOption.innerHTML = "Descendente";

    const SelectCategoria = document.createElement("select")
    SelectCategoria.classList.add("col-10","mt-4");
    divCategoria.append(SelectCategoria);
    getTodosCategorias()
    .then(data => {
        // Hacer algo con los datos, por ejemplo, guardarlos en una variable
        data.forEach((items)=>{
            let optionCategoria = document.createElement("option");
            optionCategoria.innerHTML = items['NombreCategoria']
            SelectCategoria.append(optionCategoria);
        })
    })
    .catch(error => {
        console.error(error);
    });


    filtraADscBox.append(selectAscDesc);
    selectAscDesc.append(selectDefault);
    selectAscDesc.append(selectAscOption);
    selectAscDesc.append(selectDescOption);

    //Array para estrellas
    let arrayEstrella = [];
    
    for(let estrellaArray = 1; estrellaArray < 6; estrellaArray++){
        arrayEstrella.push(estrellaArray);
    }

    selectAscDesc.onchange = function(){
        let selecValue = document.getElementById("selectAscDesc").value;
        ordenarEstrellas(arrayEstrella,selecValue);
    }


    

    for(let estrella = 0;estrella < 5;estrella++){
        const estrellaFiltro = document.createElement("input");
        const estrellaFiltroLabel = document.createElement("label");
        estrellaFiltroLabel.classList.add("col-11");

        for (let i = 0; i < 5; i++) {
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
            estrellaFiltro.type = "radio";
            estrellaFiltro.id = "estrella" + (estrella + 1);
            estrellaFiltro.value = estrella+1;
        }

        
        estrellaFiltro.name = "estrella";
        estrellaFiltro.classList.add("col-1","mt-2");
    
        estrellaFiltro.onchange = function() {
            getEstrellaSelected(this);
        };
        
        divFormEstrella.append(estrellaFiltro);
        divFormEstrella.append(estrellaFiltroLabel);
    }
    

    // Informacion muestra Derecha
    contenidorResenya.append(cajaResenya);
    cajaResenya.append(ValoracionEstrella);
    ValoracionEstrella.append(valoracionEstrellaTexto);
    cajaResenya.append(subCaja);
    subCaja.append(subCajaRow);
    subCajaRow.append(subCajaRowUnoRow);



    ArrayDeComentarios = [];
    reseny.forEach(resenyaIndividual => {
        ArrayDeComentarios.push({
            user_id : resenyaIndividual['Nombre'],
            producto_id : resenyaIndividual['prod_id'],
            producto_nombre : resenyaIndividual['prod_Nombre'],
            estrella : resenyaIndividual['estrella'],
            valoracion : resenyaIndividual['valoracion']

        });
        // Crear div
        const subCajaRowDos = document.createElement("div");
        subCajaRowDos.classList.add("col-6", "CajasP", "noMarginBottom");
    
        const cajaDetalleValoracion = document.createElement("div");
        cajaDetalleValoracion.classList.add("CajaDetalleValoracion","row","col-12");
    
        // Crear párrafo
        const Cliente = document.createElement("p");
        Cliente.classList.add("col-12", "pValoracion", "noMarginBottom");
        Cliente.innerHTML = resenyaIndividual['user_id'];

        const Producto = document.createElement("p");
        Producto.classList.add("col-12", "pValoracion", "noMarginBottom");
        Producto.innerHTML = resenyaIndividual['prod_Nombre'];

        const Estrella = document.createElement("p");
        Estrella.classList.add("col-12", "pValoracion", "noMarginBottom");
        Estrella.innerHTML = "Puntuación: ";
        for (let star = 0; star < resenyaIndividual['estrella']; star++) {
            Estrella.innerHTML += "<svg>"+
                "<image href='Materiales/productoIndividual/valoracionOpiniones/Estrella.svg' width='18px' height='18px'>"
            +"</svg>";
        }


        //Crear un button para Generar QR de Cada Resenyas
        let boxButton = document.createElement("div");
        boxButton.classList.add("d-flex","justify-content-end");
        boxButton.id = "boxButton";
        let buttonQRResenya = document.createElement("button");
        // buttonQRResenya.value = resenyaIndividual['prod_id'];
        buttonQRResenya.classList.add("btn","btn-primary","btnQrProd"); 
        buttonQRResenya.innerHTML = "QR Resenya";   
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
        // Anidar div dentro de cajaDetalleValoracion
        subCajaRowDos.append(cajaDetalleValoracion);

        cajaDetalleValoracion.append(Cliente);
        cajaDetalleValoracion.append(Producto);
        cajaDetalleValoracion.append(Estrella);
        cajaDetalleValoracion.append(Valoracion);
        cajaDetalleValoracion.append(boxButton);
        boxButton.append(buttonQRResenya);
        

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