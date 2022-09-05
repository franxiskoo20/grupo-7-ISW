function validar_formulario_modificar() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro que desea modificar el formulario?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#111B54',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            document.formulario_actualizar.submit();
            
        }
        return false;
    })
    return false;
}
