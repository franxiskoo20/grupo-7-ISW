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

/* Para eliminar */
$('.btn-del').on('click',function(e){
    e.preventDefault();
    var href =$('#del').attr('href');
    Swal.fire({
        icon : 'question',
        title: '¿Estás Seguro/a de eliminar a este aviso?',
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
/* No esta en uso */
const flashdata = $('#flashdata').data('flashdata');
if (flashdata){
    Swal.fire({
        icon : 'success',
        title : 'Aviso eliminado',
        text : 'De manera Exitosa',
    })
}
/* funcion eliminar no esta en uso */
function aviso_eliminar_confirmar(id) {
    
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro/a de eliminar a este aviso?',
        showConfirmButton: true,
        confirmButtonText: 'ELIMINAR',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'CANCELAR',
        cancelButtonColor: '#d33',
        buttonsStyling: true,   
    
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '../controlador/hu4_conserjeria_controlador/hu4_delete.php',
                data: {id:id},
                success: function(data) {
                    if (data==1) 
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'Aviso eliminado correctamente',
                            showConfirmButton: false,
                            timer: 2000,
                        })                      
                    }
                    else
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'El aviso no se pudo eliminar',
                            showConfirmButton: false,
                            timer: 2000,
                            })                      
                    }
                }
            });
        }

})}