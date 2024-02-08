let dropDown = document.getElementById("dropDownMenu");
let liOneDropDown = document.createElement("li");
let liOneDropDownP = document.createElement("p");
dropDown.append(liOneDropDown);
let rangeValuePrecio = document.createElement("input");
liOneDropDown.append(liOneDropDownP);
liOneDropDownP.innerHTML = "Precio";
liOneDropDown.append(rangeValuePrecio);
rangeValuePrecio.id = "rangePrecio";
rangeValuePrecio.type = "range";
rangeValuePrecio.setAttribute("min","1");
rangeValuePrecio.setAttribute("max","100");

liOneDropDown.classList.add("dropdown-item","liRange");

let rangeNumeroActual = document.createElement("p");
rangeNumeroActual.classList.add("numeroRangePrecio");
rangeNumeroActual.id = "rangePrecioNumero";
liOneDropDown.append(rangeNumeroActual);


document.querySelectorAll("#dropDownMenu li").forEach(function(li) {
  li.addEventListener("input", miFuncion);
});



function miFuncion(){
  
    let RangeValue = document.getElementById("rangePrecio").value;
    
    let numeroRangePrecio = document.getElementById("rangePrecioNumero");
    numeroRangePrecio.innerHTML = "Precio menor que " + RangeValue + " €";
     fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api",{
         method : 'POST',
         headers: {
             'Content-Type':'application/x-www-form-urlencoded',
         },
         body: new URLSearchParams({
             accion: 'FiltrarPorPrecio',
             precioFiltrado : RangeValue,
         }),
     })
     .then(response => {
         return response.json();
     })
     .then(data => {
        let removeClaseResenya = document.getElementById("sectionProductos");
        if(removeClaseResenya){
          removeClaseResenya.remove();
        }
        

        mostrarFiltradoPrecio(data);
         
     })
     .catch(error => {
         console.error(error);
     });
}

//Array para guardar los productos de forma individual
productosFiltrado = []
//Mostrar los productos segun el precio que tienen
function mostrarFiltradoPrecio(data){
  let cartaBody = document.getElementById("rowSectionCartaProducto");
  let newSectionProducto = document.createElement("section");
    data.forEach(productosPrecioFiltrados => {
      
      productosFiltrado.push({
        producto_id: productosPrecioFiltrados['producto_id'],
        imagenProducto: productosPrecioFiltrados['imgProducto'],
        descripcion: productosPrecioFiltrados['descripcion'],
        precio: productosPrecioFiltrados['precio'],
        nombre: productosPrecioFiltrados['nombre_producto'],
        tiempo: productosPrecioFiltrados['tiempo_espera']
      })


      let newSectionProductoRow = document.createElement("row");
      newSectionProductoRow.classList.add("row");
      let newSectionProductoRowArticle = document.createElement("article");
      let divNewSectionProductoRowArticle = document.createElement("div");
      divNewSectionProductoRowArticle.classList.add("col-12","border-bottom","d-flex","align-items-center","pb-4","pt-4");
      let divSecondNewSectionProductoRowArticle = document.createElement("div");
      divSecondNewSectionProductoRowArticle.classList.add("col-12","row");

      //Parte de Imagen
      let divSecondFirstNewSectionProductoRowArticle = document.createElement("div");
      divSecondFirstNewSectionProductoRowArticle.classList.add("col-lg-3","col-md-12","d-flex","justify-content-center");
      let imgSecondFirstNewSectionProdArtivle = document.createElement("img");
      imgSecondFirstNewSectionProdArtivle.classList.add("mt-4");
      imgSecondFirstNewSectionProdArtivle.style.width = "250px";
      imgSecondFirstNewSectionProdArtivle.style.height = "200px";
      imgSecondFirstNewSectionProdArtivle.src = productosPrecioFiltrados['imgProducto'];
      imgSecondFirstNewSectionProdArtivle.alt = productosPrecioFiltrados['descripcion'];
      //Appends img
      divSecondFirstNewSectionProductoRowArticle.append(imgSecondFirstNewSectionProdArtivle);

      //Parte de Informacion
      let divSecondSecondNewSectionProductoRowArticle = document.createElement("div");
      divSecondSecondNewSectionProductoRowArticle.classList.add("col-lg-6","col-md-12");
      let divSecondSecondPOne = document.createElement("p");
      divSecondSecondPOne.classList.add("txt15","araboto-normal");
      divSecondSecondPOne.innerText = productosPrecioFiltrados['nombre_producto'];
      let divSecondSecondPTwo = document.createElement("p");
      divSecondSecondPTwo.classList.add("txt13");
      divSecondSecondPTwo.innerHTML = "Humo Restaurant";
      let divSecondSecondPThree = document.createElement("p");
      divSecondSecondPThree.classList.add("txt12","mt-1");
      divSecondSecondPThree.innerText = productosPrecioFiltrados['descripcion'];

      //Div dentro de Parte Informacion
      
      let divInfoOneArticle = document.createElement("div");
      divInfoOneArticle.classList.add("d-flex","justify-content-end","txt13","pt-1");
      let divInfoOneArticleA = document.createElement("a");
      divInfoOneArticleA.href = "http://localhost/webs/GitProyect/GamingShop/index.php?controller=Producto&&action=productoPanel&prod_id="+productosPrecioFiltrados['producto_id'];
      divInfoOneArticleA.innerHTML = "<u>Ver Productos</u>";

      let divInfoTwoArticle = document.createElement("div");
      divInfoTwoArticle.classList.add("col-12","cajaDescripcion","d-flex");

      let divInfoTwoOneArticle = document.createElement("div");
      divInfoTwoOneArticle.classList.add("col-6","descripcionSub1","d-flex","ps-4","pt-2","pb-5");

      let divInfoTwoOneOneArticle = document.createElement("div");
      divInfoTwoOneOneArticle.classList.add("col-6","shadowLetra");
      let pdivInfoTwoOneOneArticle = document.createElement("p");
      pdivInfoTwoOneOneArticle.classList.add("pt-1","specialp");
      pdivInfoTwoOneOneArticle.innerText = "Tipo";
      let pTwodivInfoTwoOneOneArticle = document.createElement("p");
      pTwodivInfoTwoOneOneArticle.classList.add("pt-3","specialp");
      pTwodivInfoTwoOneOneArticle.innerText = "Restaurante";
      let pThreedivInfoTwoOneOneArticle = document.createElement("p");
      pThreedivInfoTwoOneOneArticle.classList.add("pt-3","specialp");
      pThreedivInfoTwoOneOneArticle.innerText = "Horario";
      let pFourdivInfoTwoOneOneArticle = document.createElement("p");
      pFourdivInfoTwoOneOneArticle.classList.add("pt-3","specialp");
      pFourdivInfoTwoOneOneArticle.innerText = "Valoracion";


      let divInfoTwoOneTwoArticle = document.createElement("div");
      divInfoTwoOneTwoArticle.classList.add("col-6","negrita","pb-3");
      let pdivInfoTwoOneTwoArticle = document.createElement("p");
      pdivInfoTwoOneTwoArticle.classList.add("pt-1","specialp");
      pdivInfoTwoOneTwoArticle.innerText = "Carne Vaca";
      let pTwodivInfoTwoOneTwoArticle = document.createElement("p");
      pTwodivInfoTwoOneTwoArticle.classList.add("pt-3","specialp");
      pTwodivInfoTwoOneTwoArticle.innerText = "Humo";
      let pThreedivInfoTwoOneTwoArticle = document.createElement("p");
      pThreedivInfoTwoOneTwoArticle.classList.add("pt-3","specialp");
      pThreedivInfoTwoOneTwoArticle.innerText = "8AM - 16PM";
      let pFourdivInfoTwoOneTwoArticle = document.createElement("p");
      pFourdivInfoTwoOneTwoArticle.classList.add("pt-3","specialp");
      pFourdivInfoTwoOneTwoArticle.innerText = "4.5/5";

      //parte derecha de informacion
      let divInfoTwoTwoArticle = document.createElement("div");
      divInfoTwoTwoArticle.classList.add("col-6","d-flex","justify-content-center");
      
      let divInfoTwoTwoArticleRow = document.createElement("div");
      divInfoTwoTwoArticleRow.classList.add("row","col-12");
      let divInfoTwoTwoArticleRowOne = document.createElement("div");
      divInfoTwoTwoArticleRowOne.classList.add("col-12","descripcionSub2");
      let textDivInfoTwoTwoArticleRowOne = document.createElement("div");
      textDivInfoTwoTwoArticleRowOne.classList.add("text","ms-3","mt-3");
      let textpDivInfoTwoTwoArticleRowOne = document.createElement("p");
      let textpTwoDivInfoTwoTwoArticleRowOne = document.createElement("p");
      textpDivInfoTwoTwoArticleRowOne.innerText = "Disponible en Tienda";
      textpDivInfoTwoTwoArticleRowOne.classList.add("txt15","verde");
      textpTwoDivInfoTwoTwoArticleRowOne.innerText = "Barcelona Sant";
      textpTwoDivInfoTwoTwoArticleRowOne.classList.add("txt13","negro");
      
      let divInfoTwoTwoArticleRowTwo = document.createElement("div");
      divInfoTwoTwoArticleRowTwo.classList.add("col-12");
      let txtDivInfoTwoTwoArticleRowTwo = document.createElement("div");
      txtDivInfoTwoTwoArticleRowTwo.classList.add("text","ms-3","mt-3");
      let txtpDivInfoTwoTwoArticleRowTwo = document.createElement("p");
      let txtpTwoDivInfoTwoTwoArticleRowTwo = document.createElement("p");
      txtpDivInfoTwoTwoArticleRowTwo.innerText = "Disponible comer en Restaurante";
      txtpDivInfoTwoTwoArticleRowTwo.classList.add("txt15","verde");
      txtpTwoDivInfoTwoTwoArticleRowTwo.innerText = "Tiempo de Espera: "+ productosPrecioFiltrados['tiempo_espera'] + " min";
      txtpTwoDivInfoTwoTwoArticleRowTwo.classList.add("txt13","negro");


      //Appends informaciones
      divSecondSecondNewSectionProductoRowArticle.append(divSecondSecondPOne);
      divSecondSecondNewSectionProductoRowArticle.append(divSecondSecondPTwo);
      divSecondSecondNewSectionProductoRowArticle.append(divSecondSecondPThree);
      divSecondSecondNewSectionProductoRowArticle.append(divInfoOneArticle);
      divInfoOneArticle.append(divInfoOneArticleA);
      divSecondSecondNewSectionProductoRowArticle.append(divInfoTwoArticle);
      divInfoTwoArticle.append(divInfoTwoOneArticle);
      divInfoTwoTwoArticle.append(divInfoTwoTwoArticleRow);
      divInfoTwoTwoArticleRow.append(divInfoTwoTwoArticleRowOne);
      divInfoTwoTwoArticleRowOne.append(textDivInfoTwoTwoArticleRowOne);
      textDivInfoTwoTwoArticleRowOne.append(textpDivInfoTwoTwoArticleRowOne);
      textDivInfoTwoTwoArticleRowOne.append(textpTwoDivInfoTwoTwoArticleRowOne);

      divInfoTwoArticle.append(divInfoTwoTwoArticle);
      divInfoTwoTwoArticleRow.append(divInfoTwoTwoArticleRowTwo);
      divInfoTwoTwoArticleRowTwo.append(txtDivInfoTwoTwoArticleRowTwo);
      txtDivInfoTwoTwoArticleRowTwo.append(txtpDivInfoTwoTwoArticleRowTwo);
      txtDivInfoTwoTwoArticleRowTwo.append(txtpTwoDivInfoTwoTwoArticleRowTwo);

      //P de divInfoTwoOneOneArticle
      divInfoTwoOneArticle.append(divInfoTwoOneOneArticle);
      divInfoTwoOneOneArticle.append(pdivInfoTwoOneOneArticle);
      divInfoTwoOneOneArticle.append(pTwodivInfoTwoOneOneArticle);
      divInfoTwoOneOneArticle.append(pThreedivInfoTwoOneOneArticle);
      divInfoTwoOneOneArticle.append(pFourdivInfoTwoOneOneArticle);
      //P de divInfoTwoOneTwoArticle
      divInfoTwoOneArticle.append(divInfoTwoOneTwoArticle);
      divInfoTwoOneTwoArticle.append(pdivInfoTwoOneTwoArticle);
      divInfoTwoOneTwoArticle.append(pTwodivInfoTwoOneTwoArticle);
      divInfoTwoOneTwoArticle.append(pThreedivInfoTwoOneTwoArticle);
      divInfoTwoOneTwoArticle.append(pFourdivInfoTwoOneTwoArticle);
      
      
      
      //Parte de Precio boton 
      let divSecondThirdNewSectionProductoRowArticle = document.createElement("div");
      divSecondThirdNewSectionProductoRowArticle.classList.add("col-lg-3","col-md-12","d-flex","justify-content-center");
      let divSecondThirdOneNewSectionProductoRowArticle = document.createElement("div");
      divSecondThirdNewSectionProductoRowArticle.append(divSecondThirdOneNewSectionProductoRowArticle);
      divSecondThirdOneNewSectionProductoRowArticle.classList.add("row","col-12","col-lg-10");
      let contentSecondThirdOne = document.createElement("div");
      divSecondThirdOneNewSectionProductoRowArticle.append(contentSecondThirdOne);
      contentSecondThirdOne.classList.add("col-12","d-flex","justify-content-end","align-items-end","txt24","fw-bold");
      contentSecondThirdOne.style.color = "#DD1E35";
      let pcontentSecondThirdOne = document.createElement("p");
      contentSecondThirdOne.append(pcontentSecondThirdOne);
      pcontentSecondThirdOne.innerText = productosPrecioFiltrados['precio'] + "€";
      pcontentSecondThirdOne.classList.add("pb-3","normalPrecio");


      let contentSecondThirdTwo = document.createElement("div");
      divSecondThirdOneNewSectionProductoRowArticle.append(contentSecondThirdTwo);
      contentSecondThirdTwo.classList.add("col-12","d-grid","gap-2");
      contentSecondThirdTwo.style.maxHeight = "40px";
      let formContentSecondThirdTwo = document.createElement("form");
      contentSecondThirdTwo.append(formContentSecondThirdTwo);
      formContentSecondThirdTwo.action = "https://localhost/webs/GitProyect/GamingShop/index.php?controller=producto&action=shop";
      formContentSecondThirdTwo.method = "POST";
      formContentSecondThirdTwo.classList.add("col-12");
      let divFormContentSecondThirdTwo = document.createElement("div");
      formContentSecondThirdTwo.append(divFormContentSecondThirdTwo);
      divFormContentSecondThirdTwo.classList.add("d-grid","gap-2","col-12","mx-auto");
      let inputForm = document.createElement("input");
      divFormContentSecondThirdTwo.append(inputForm);
      inputForm.name = "id";
      inputForm.value = productosPrecioFiltrados['producto_id'];
      inputForm.hidden = true;

      let buttonForm = document.createElement("button");
      divFormContentSecondThirdTwo.append(buttonForm);
      buttonForm.classList.add("btn","btn-primary");
      buttonForm.type = "submit";
      buttonForm.innerHTML = "Añadir a Cesta";

      //Appends principales
      newSectionProducto.id = "sectionProductos";
      cartaBody.append(newSectionProducto);
      newSectionProducto.append(newSectionProductoRow);
      newSectionProductoRow.append(newSectionProductoRowArticle);
      newSectionProductoRowArticle.append(divNewSectionProductoRowArticle);
      divNewSectionProductoRowArticle.append(divSecondNewSectionProductoRowArticle);
      divSecondNewSectionProductoRowArticle.append(divSecondFirstNewSectionProductoRowArticle);
      divSecondNewSectionProductoRowArticle.append(divSecondSecondNewSectionProductoRowArticle);
      divSecondNewSectionProductoRowArticle.append(divSecondThirdNewSectionProductoRowArticle);


    })




  
}
