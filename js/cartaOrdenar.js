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

function miFuncion(){
    let RangeValue = document.getElementById("rangePrecio").value;
    console.log(RangeValue);
    // fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api",{
    //     method : 'POST',
    //     headers: {
    //         'Content-Type':'application/x-www-form-urlencoded',
    //     },
    //     body: new URLSearchParams({
    //         accion: 'FiltrarPorPrecio',
    //     }),
    // })
    // .then(response => {
    //     return response.json();
    // })
    // .then(data => {
    //     mostrarReseñas(data);
    //     setParrafoHeightForAll();
    // })
    // .catch(error => {
    //     console.error(error);
    // });
}

document.querySelectorAll("#dropDownMenu li").forEach(function(li) {
    li.addEventListener("click", miFuncion);
  });

// document.addEventListener('DOMContentLoaded', function(){
   
//     fetch("https://localhost/webs/GitProyect/GamingShop/index.php?controller=API&action=api",{
//         method : 'POST',
//         headers: {
//             'Content-Type':'application/x-www-form-urlencoded',
//         },
//         body: new URLSearchParams({
//             accion: 'consultaReseñas',
//         }),
//     })
//     .then(response => {
//         return response.json();
//     })
//     .then(data => {
//         mostrarReseñas(data);
//         setParrafoHeightForAll();
//     })
//     .catch(error => {
//         console.error(error);
//     });
// })