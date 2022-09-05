<!-- Modal modificar publicacion -->


<div class="modal fade bd-example-modal-lg>" id="modificar_publicacion<?php echo $formulario_id;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- titulo -->
                <h2 class="font-weight-bold mb-0">Modificar anuncio</h2>
                <!-- boton de cerrar modal -->
                <button type="button" class="btn-close" id="cerrarFormulario" data-dismiss="modal" aria-label="Close">
                </button>
            </div>


            <div class="modal-body">

                <!-- formulario de actualizar -->
                <form action="../controlador/hu1_controlador_diariomural/hu1_modificar_diariomural.php"
                    name="formulario_actualizar" id="formulario_actualizar" method="POST" onsubmit="return validar_formulario_modificar()">

                    <div class="row">
                        <div class="form-group col-lg-10 col-md-10">

                            <label>Tipo de anuncio</label>
                            <select class="form form-control" name="tipo_anuncio_actualizar" required>
                                <option value="Información"
                                    <?php echo ($formulario_tipo == 'Información')?'selected':''; ?>>
                                    Información</option>
                                <option value="Publicidad"
                                    <?php echo ($formulario_tipo  == 'Publicidad')?'selected':''; ?>>Publicidad
                                </option>
                                <option value="Recomendaciones"
                                    <?php echo ($formulario_tipo == 'Recomendaciones')?'selected':''; ?>>Recomendaciones
                                </option>
                                <option value="Otro" <?php echo ($formulario_tipo  == 'Otro')?'selected':''; ?>>Otro
                                </option>
                            </select>
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
                            class="form-control" name="titulo_actualizar" autocomplete="off" minlength="10"
                            maxlength="50" value="<?php echo $formulario_titulo?>" required>

                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea
                            placeholder="Por favor, escriba una descripción para su publicación (10 - 1000 caracteres)"
                            rows="10" wrap="hard" class="form-control" name="descripcion_actualizar" minlength="10"
                            maxlength="1000" required><?php echo $formulario_contenido?></textarea>

                    </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="formulario_id_actualizar"
                            value=<?php echo $formulario_id?>>

                    </div>
                    <div class="row mx-5 py-2">

                        <div class="form-group col-lg-12 col-md-12">

                            <button type="submit" class="btn btn-primary col-lg-9 col-md-9"><b><i
                                        class="fa fa-plus mx-1"></i>Modificar
                                    publicación</b></button>
                            <button type="reset" class="btn btn-primary col-lg-2  col-md-2"><i
                                    class="fa-solid fa-trash"></i>&nbsp</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>