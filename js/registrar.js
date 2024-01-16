function cambiarTipoContrasenya(){
    // Obtener el elemento input
    var inputElement = document.getElementById('constrasenya');

    // Cambiar el tipo de input
    inputElement.type = (inputElement.type === 'text') ? 'password' : 'text';
 
}
