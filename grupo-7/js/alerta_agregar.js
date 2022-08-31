function validar_formulario_publicar() {
    event.preventDefault();
    Swal.fire({
        title: '¿Seguro de enviar el formulario?',
        icon: 'question',
        iconColor: '#a5dc86',
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
    var href =$('#del').attr('href');
    Swal.fire({
        icon : 'question',
        title: '¿Estás Seguro?',
        text : 'El aviso será eliminado',
        showCancelButton: true,
        confirmButtonColor : '#0d6efd',
        cancelButtonColor: '#6e7881',
        confirmButtonText : 'Eliminar aviso!',
    }).then((result) => {
        if(result.value){
            console.log(href);
            document.location.href = href;
        }
    })
})
const flashdata = $('.flash-data').data('flashdata')
if (flashdata){
    Swal.fire({
        icon : 'success',
        title : 'Aviso eliminado',
        text : 'De manera Exitosa',
    })
}
