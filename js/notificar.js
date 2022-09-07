
function validar_formulario_reclamos() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de enviar el reclamo?',
        icon: 'question',
        iconColor: '#111B54',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#111B54',
        cancelButtonColor: '#FF0000',
    }).then((result) => {
        if (result.value) {
            document.formulario_reclamos.submit();
            
        }
        return false;
    })
    return false;
}



