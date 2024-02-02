
window.onload = function() {
  var boxes = document.querySelectorAll('.list-group');
  var maxHeight = 0;

  boxes.forEach(function(box) {
    maxHeight = Math.max(maxHeight, box.clientHeight);
  });

  boxes.forEach(function(box) {
    box.style.height = maxHeight + 'px';
  });
};
