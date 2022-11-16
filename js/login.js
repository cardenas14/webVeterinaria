const formulario = document.querySelector('#formlogin');
const usuario = document.querySelector('#usuario');
const nombre = document.querySelector('#nombre');
formulario.addEventListener('submit', validar);

function validar(e){
    e.preventDefault();
    if(usuario.value == '' ||nombre.value == ''){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Debes ingresar el Usuario y el Nombre',
            showConfirmButton: false,
            timer: 2000
        })
    }else{
        Swal.fire({
            type: 'success',
            title: 'Bienvenido '+ usuario.value+'!!',
            showConfirmButton: false,
            timer: 2000
        }).then(function () {
            window.location = "index.html";
        })
        
    }

    
}