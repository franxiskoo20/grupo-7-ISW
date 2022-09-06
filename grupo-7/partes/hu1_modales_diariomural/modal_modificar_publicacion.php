<!-- Modal modificar publicacion -->


<div class="modal fade bd-example-modal-lg>" id="modificar_publicacion<?php echo $formulario_id;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- titulo -->
                <h2 class="font-weight-bold mb-0 w-100 text-center">Modificar anuncio</h2>
                <!-- boton de cerrar modal -->
                <button type="button" class="btn-close" id="cerrarFormulario" data-dismiss="modal" aria-label="Close">
                </button>
            </div>


            <div class="modal-body">

                <!-- formulario de actualizar -->
                <form class="was-validated"
                    action="../controlador/hu1_controlador_diariomural/hu1_modificar_diariomural.php"
                    name="formulario_actualizar_diariomural" id="formulario_actualizar_diariomural" method="POST">

                    <div class="row">
                        <div class="form-group col-lg-10 col-md-10">

                            <label>Tipo de anuncio</label>
                            <select class="form-select is-valid" name="tipo_anuncio_actualizar" required>
                                <option value="Información"
                                    <?php echo ($formulario_tipo == 'Información')?'selected':''; ?>>
                                    Información</option>
                                <option value="Publicidad"
                                    <?php echo ($formulario_tipo  == 'Publicidad')?'selected':''; ?>>Publicidad
                                </option>
                                <option value="Recomendaciones"
                                    <?php echo ($formulario_tipo == 'Recomendaciones')?'selected':''; ?>>Recomendaciones
                            </select>
                            <div class="valid-feedback">
                                Tipo de anuncio correcto.
                            </div>
                        </div>
                        <!-- boton destacar  -->
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Destacar</label>
                            <div class="form-check form-switch form-switch-md">
                                <input class="form-check-input is-valid" type="checkbox" role="switch"
                                    name="destacar_anuncio_actualizar"
                                    <?php echo ($formulario_destacar == '1')?'checked':''; ?>>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text"
                            placeholder="Por favor, elija un titulo para su publicación (5 - 50 caracteres)"
                            name="titulo_actualizar" autocomplete="off" value="<?php echo $formulario_titulo?>"
                            class="form-control is-valid" name="titulo_actua_diario" minlength="10" maxlength="50"
                            required>

                        <div class="valid-feedback">
                            Título correcto.
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea
                            placeholder="Por favor, escriba una descripción para su publicación (10 - 1000 caracteres)"
                            rows="10" wrap="hard" name="descripcion_actualizar" class="form-control is-valid"
                            minlength="10" maxlength="1000" required><?php echo $formulario_contenido?></textarea>

                        <div class="valid-feedback">
                            Descripción correcta.
                        </div>
                    </div>

                    <div class="form-group">

                        <input type="hidden"  name="formulario_id_actualizar"
                            value=<?php echo $formulario_id?>>

                    </div>

                    <div class="row py-2">

                        <div class="form-group col-lg-12 col-md-12 d-flex justify-content-center">

                            <button type="submit" class="btn btn-primary col-lg-4 col-md-4 mx-1"><b><i
                                        class="fa fa-plus"></i>Modificar
                                    publicación</b></button>
                            <button type="reset" class="btn btn-primary col-lg-2 col-md-2"><i
                                    class="fa-solid fa-trash"></i>&nbsp</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>