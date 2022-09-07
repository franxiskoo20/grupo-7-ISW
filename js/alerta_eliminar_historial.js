function borrar_historial() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de eliminar el historial de anuncios?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#111B54',
        cancelButtonColor: '#FF0000',
    }).then((result) => {
        if (result.value) {
            document.borrar_historial_anuncios.submit();
        }
        return false;
    })
    return false;
}
