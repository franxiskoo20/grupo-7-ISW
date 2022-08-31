function validar_formulario_publicar() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de enviar el formulario?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#6e7881',
    }).then((result) => {
        if (result.value) {
            document.formulario_publicar.submit();
            
        }
        return false;
    })
    return false;
}

$('.btn-del').on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    Swal.fire({

        title: '¿Estás Seguro?',
        text : 'El aviso será eliminado',
        type : 'question',
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonColor : '#0d6efd',
        cancelButtonColor: '#6e7881',
        confirmButtonText : 'Eliminar aviso!',
        closeOnConfirm: false,
    }).then((result) => {
        if(result.value){
            console.log(href);
            document.location.href = "../controlador/hu4_conserjeria_controlador/hu4_delete.php?="+id;
        }
    })
})
const flashdata = $('.flash-data').data('flashdata')
if (flashdata){
    Swal.fire({
        type : 'succes',
        title : 'Aviso eliminado',
        text : 'De manera Exitosa',
    })
}
