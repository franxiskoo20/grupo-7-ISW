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

                <table class="table table-hover">
                    <thead class="bg-primary">
                        <tr style="color:white">
                            <th class="col-lg-6 col-md-6" scope="col">Título</th>
                            <th class="col-lg-6 col-md-6" scope="col">Fecha</th>
                        </tr>
                    </thead>

                    <?php if($mostrarHistorialFormulario->rowCount() > 0):
                          while($row=$mostrarHistorialFormulario->fetch(PDO::FETCH_ASSOC)):
                                extract($row); ?>
                    <tr>

                        <td class="col text-center">
                            <?php echo "<b style='font-weight: bold;'>".$form_histo_titulo."</b>"?></td>
                        </td>

                        <td class="col text-center">
                            <?php echo "<b style='font-weight: bold;'>".$fecha_histo_formateada."</b>"?></td>
                    </tr>
                    <?php endwhile?>
                    <?php else:?>

                    <td class="col text-center" colspan="2">
                        <p>Historial de anuncios borrados vacio</p>
                    </td>

                    <?php endif?>
                </table>


                <form action="../controlador/hu1_controlador_diariomural/hu1_eliminar_historial_anuncio.php"
                    name="borrar_historial_anuncios" id="borrar_historial_anuncios" method="POST">

                    <div class="d-flex justify-content-center"> >

                        <input type="hidden" class="form-control" name="id_borrar_historial"
                            value=<?php echo $_SESSION['id']?>>

                        <button type="submit" class="btn btn-primary col-lg-3 col-md-3"><b><i
                                    class="fa-solid fa-broom mx-1"></i>Borrar historial</b></button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>


</div>