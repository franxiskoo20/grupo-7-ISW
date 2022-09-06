function borrar_historial() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de eliminar el historial de anuncios?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#6e7881',
    }).then((result) => {
        if (result.value) {
            document.borrar_historial_anuncios.submit();
        }
        return false;
    })
    return false;
}
