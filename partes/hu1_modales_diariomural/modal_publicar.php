<!-- Modal publicar -->
<div class="modal fade bd-example-modal-lg" id="publicar_diariomural">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-weight-bold mb-0 w-100 text-center">Formulario de creación de anuncio</h2>

                <button type="button" class="btn-close" id="cerrarModalDiariomural" data-bs-dismiss="modal"
                    aria-label="Close"></button>

            </div>
            <div class="modal-body">


                <form class="was-validated"
                    action="../controlador/hu1_controlador_diariomural/hu1_publicar_diariomural.php"
                    name="formulario_publicar" id="formulario_publicar" method="POST"
                    onsubmit="return validar_formulario_publicar()">
                    <div class="row">
                        <div class="form-group col-lg-10 col-md-10">

                            <label>Tipo de anuncio</label>
                            <select class="form-select is-invalid" name="tipo_anuncio" required>
                                <option selected disabled value="">Seleccione uno...</option>
                                <option value="Información">Información</option>
                                <option value="Publicidad">Publicidad</option>
                                <option value="Recomendaciones">Recomendaciones</option>
                            </select>
                            <div class="valid-feedback">
                                Tipo de anuncio correcto.
                            </div>
                            <!-- <div class="invalid-feedback">
                                Selecciona un estado válido.
                            </div> -->
                        </div>
                        <div class="form-group col-lg-2 col-md-2">
                            <label>Destacar</label>
                            <div class="form-check form-switch form-switch-md">
                                <input class="form-check-input" type="checkbox" role="switch" name="destacar_anuncio"
                                    id="destacar_anuncio">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text"
                            placeholder="Por favor, elija un titulo para su publicación (5 - 50 caracteres)"
                            class="form-control is-invalid" name="titulo" autocomplete="off" minlength="10"
                            maxlength="50" required>
                        <div class="valid-feedback">
                            Título correcto.
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea
                            placeholder="Por favor, escriba una descripción para su publicación (5 - 200 caracteres)"
                            rows="10" wrap="hard" class="form-control" name="descripcion" minlength="10"
                            maxlength="1000" required></textarea>

                        <div class="valid-feedback">
                            Descripción correcta.
                        </div>

                    </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="usuario_clave"
                            value=<?php echo $_SESSION['id']?>>


                    </div>
                    <div class="row py-2">

                        <div class="form-group col-lg-12 col-md-12 d-flex justify-content-center">

                            <button type="submit" class="btn btn-primary col-lg-4 col-md-4  mx-1"><b><i
                                        class="fa fa-plus"></i>Agregar
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