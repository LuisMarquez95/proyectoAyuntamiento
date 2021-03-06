angular.module('app', ['datatables'])
.controller("ayuntApp",function ($scope, $http, $timeout) {
    $scope.usuarios = [{id:'1', nombre:'roberto'}];
    $scope.departamentos = [];
    /* Variables de registro*/
    $scope.FotodeUsuario;    
    /* Formulario de registro de un nuevo Usuario*/
    if ($(".containerFoto").html() == 0){ /// Si el contenedor no tienen ningun item el tamaño tiene que estar en 100px
        $(".containerFoto").css({"height":"100px"});
    }else{ /// Si tiene contenido es por que el tamaño es automatico
        $(".containerFoto").css({"height":"auto"});
    }

    $("#containerFoto").on("dragover", function (e) {
        e.preventDefault(); // Evitar que sucedan acciones por defecto de navegadores
        e.stopPropagation(); // Evitar que se escuche otra acción
        $("#containerFoto").css({"background-color":"#a6aeb9"});
    });

    $("#containerFoto").on("drop", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $("#containerFoto").css({"background":"white"});
    
         archivo = e.originalEvent.dataTransfer.files;
        
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.originalEvent.dataTransfer.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function(){
            let preview = document.getElementById('containerFoto'),
                    image = document.createElement('img');
                    image.setAttribute('width', '100%');

            image.src = reader.result;

        preview.innerHTML = '';
        preview.append(image);
            if ($(".containerFoto").html() == 0){
                $(".containerFoto").css({"height":"100px"});
            }else{
                $(".containerFoto").css({"height":"auto"});
            }
        }
       
        

         imagen = archivo[0];
        /// Validar tamaño del aimagen
        var imagenSize = imagen.size;
        if (Number(imagenSize) > 2000000){ // Dos millones de Bits (2MB)
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El archivo no tiene el peso correcto',
                footer: '<a href="helpme">ayuda</a>'
              })
        }
    
        else{
            
        }
    
         var imageType = imagen.type;
        if (imageType == "image/jpeg" || imageType  == "image/png"){
            $(".alerta").remove();
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El archivo no es el correcto',
                footer: '<a href="helpme">ayuda</a>'
              })
        }
        $scope.FotodeUsuario = imagen;
    });
    /*Expreciones regulares para validar los datos del formulario*/
    function validarEmail(email){
        var regex = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email); 
        return regex;
    }
    $scope.registrarUsuario = function(datos){
        var succes = false;
        var datosnuevoUsuario = new FormData();
        if(datos.mail == "" || datos.mail == null ||
        datos.nombre == "" || datos.nombre == null
        || datos.ap == "" || datos.ap == null 
        || datos.direc == "" || datos.direc == null
        || datos.am == "" || datos.am == null ||
        datos.number == "" || datos.number == null
        || datos.sex == "" || datos.sex== null
        || datos.depto == "" || datos.depto == null
        || datos.nivel == "" || datos.nivel == null){ // Metemos todo en un solo IF
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Los datos del formulario no estan completos',
              footer: '<a href="helpme">ayuda</a>'
            })
        }else{
            if(validarEmail(datos.mail)){
                  succes = true;
            }else{
                console.log("Email invalido");
            }
            if(succes == true){
                datosnuevoUsuario.append('mail', datos.mail);
                datosnuevoUsuario.append('nombre', datos.nombre);
                datosnuevoUsuario.append('ap', datos.ap);
                datosnuevoUsuario.append('am', datos.am);
                datosnuevoUsuario.append('direccion', datos.direc);
                datosnuevoUsuario.append('numero', datos.number);
                datosnuevoUsuario.append('sex', datos.sex);
                datosnuevoUsuario.append('depto', datos.depto);
                datosnuevoUsuario.append('nivel', datos.nivel);
                datosnuevoUsuario.append('foto', $scope.FotodeUsuario);

                $.ajax({
                    url:"views/ajax/registroUsuario.php",
                    method: "POST",
                    data: datosnuevoUsuario,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success : function (response){
                        Swal.fire({
                            icon: 'success',
                            title: 'Listo',
                            text: 'Registro Exitoso'
                          })
                          $('#registroModal').hide();
                          setTimeout(function(){
                            window.location = 'adminusuarios';
                          }, 3000);
                    }
                    
                    
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Los datos del formulario no estan completos',
                    footer: '<a href="helpme">ayuda</a>'
                  })
            }
        }

        /*Obetner los datos del formulario*/
    }

    

});