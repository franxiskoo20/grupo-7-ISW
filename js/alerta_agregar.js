function validar_formulario_publicar() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de enviar el formulario?',
        icon: 'question',
        iconColor: '#111B54',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#111B54',
        cancelButtonColor: '#FF0000',
    }).then((result) => {
        if (result.value) {
            document.formulario_publicar.submit();
        }
        return false;
    })
    return false;
}
