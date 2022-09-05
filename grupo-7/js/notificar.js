

function validar_formulario_reclamos() {
    event.preventDefault();
    Swal.fire({
        title: '¿Segur@ de enviar el reclamo?',
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
