<!-- Modal modificar publicacion -->


<div class="modal fade bd-example-modal-lg" id="formulario_historial">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- titulo -->
                <h2 class="font-weight-bold mb-0">Historial anuncio</h2>

                <button type="button" class="btn-close" id="cerrarHistorialAnuncio" data-bs-dismiss="modal"
                    aria-label="Close"></button>

            </div>


            <div class="modal-body">

                <table class="table table-hover" name="tabla_diariomural" id="tabla_diariomural">
                    <thead class="bg-primary">
                        <tr style="color:white">
                            <th class="col-lg-6 col-md-6" scope="col">Título</th>
                            <th class="col-lg-6 col-md-6" scope="col">Fecha</th>
                        </tr>
                    </thead>

                    <?php if($mostrarDiariomural->rowCount() > 0):
                          while($row=$mostrarDiariomural->fetch(PDO::FETCH_ASSOC)):
                                extract($row); ?>
                    <tr>
                    <td class="col text-center"> </td>
                    <td class="col text-center"> </td>
                    </tr>

                </table>
                <?php endwhile;endif ?>
            </div>
        </div>
    </div>
</div>


</div>