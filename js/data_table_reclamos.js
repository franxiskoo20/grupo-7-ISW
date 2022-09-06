$(function(){
    $(document).ready(function() {
        $('#table_reclamos').DataTable({
            "drawCallback": function(settings) {
                $('ul.pagination').addClass("pagination-sm");
            },
            "lengthMenu": [5, 10, 15, 20, 25],
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [3, 4],
            }],
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ reclamos",
                "zeroRecords": "No se encontraron reclamos",
                "emptyTable": "No hay reclamos",
                "info": "Mostrando reclamos del _START_ al _END_ de un total de _TOTAL_",
                "infoEmpty": "Mostrando reclamos del 0 al 0 de un total de 0",
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