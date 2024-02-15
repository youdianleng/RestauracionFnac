//Esto sirve para que todos los cajas tenga la misma altura del caja que tenga un altura mayor
window.onload = function() {
  //Obtener todos los tag que contienen list-group como class
  var boxes = document.querySelectorAll('.list-group');

  //Preparar un variable
  var maxHeight = 0;

  //Buscar el caja que tenga el altura mas alta
  boxes.forEach(function(box) {
    maxHeight = Math.max(maxHeight, box.clientHeight);
  });

  //Aplicar el maxHeight a todos los cajas que hay class de list-group
  boxes.forEach(function(box) {
    box.style.height = maxHeight + 'px';
  });
};
