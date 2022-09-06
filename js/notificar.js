
function validar_formulario_reclamos() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de enviar el reclamo?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#111B54',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            document.formulario_reclamos.submit();
            
        }
        return false;
    })
    return false;
}



function validar_eliminar_reclamo($_formulario_id) {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de eliminar el reclamo?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#111B54',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            
            

        }
        return false;
    })
    return false;
}

