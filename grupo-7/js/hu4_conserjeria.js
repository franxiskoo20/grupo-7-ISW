$(function(){
    $(document).ready(function() {
        $('#table_id').DataTable({
            "drawCallback": function(settings) {
                $('ul.pagination').addClass("pagination-sm");
            },
            "lengthMenu": [5, 10, 15, 20, 25],
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [5,5],
                
            }],
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ avisos",
                "zeroRecords": "No se encontraron resultados de avisos",
                "emptyTable": "Ningún aviso disponible en el diario mural",
                "info": "Mostrando avisos del _START_ al _END_ de un total de _TOTAL_",
                "infoEmpty": "Mostrando avisos del 0 al 0 de un total de 0",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        
    });
    
});