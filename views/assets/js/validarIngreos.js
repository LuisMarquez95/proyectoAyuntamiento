function validarIngreso(){
    let expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test($("#userInput").val())){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No puedes ingresar caracteres especiales!',
            footer: '<a href> Necesitas ayuda?</a>'
          })
        return false;
    }
    if(!expresion.test($("#passInput").val())){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No puedes ingresar caracteres especiales!',
            footer: '<a href> Necesitas ayuda?</a>'
          })
        return false;
    }

        return true;
}