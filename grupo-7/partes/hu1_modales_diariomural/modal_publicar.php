<?php 

date_default_timezone_set('Chile/Continental');  

$fecha = date('Y-m-d');

?>

<!-- Modal publicar -->
<div class="modal fade bd-example-modal-lg" id="publicar_diariomural">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-weight-bold mb-0">Formulario de creación de anuncio</h2>

                <button type="button" class="btn btn-primary" class="btn-close" id="cerrarModalDiariomural"
                    data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <form class="was-validated"
                    action="../controlador/hu1_controlador_diariomural/hu1_publicar_diariomural.php"
                    name="formulario_publicar" method="POST" onsubmit="return validar_formulario_publicar()">
                    <div class="row">
                        <div class="form-group col-lg-5 col-md-5">

                            <label>Tipo de anuncio</label>
                            <select class="form form-control is-invalid" name="tipo_anuncio" required>
                                <option selected disabled value="">Seleccione uno...</option>
                                <option value="1">Información</option>
                                <option value="2">Publicidad</option>
                                <option value="3">Recomendaciones</option>
                                <option value="4">Otro</option>
                            </select>
                            <div class="valid-feedback">
                                Aceptado.
                            </div>
                            <!-- <div class="invalid-feedback">
                                Selecciona un estado válido.
                            </div> -->
                        </div>

                        <div class="form-group col-lg-5 col-md-5">
                            <label>Fecha</label>
                            <input type="text" class="form-control" value="<?php echo $fecha ?>" disabled>
                        </div>

                        <div class="form-group col-lg-2 col-md-2">
                            <label>Destacar</label>
                            <div class="form-check form-switch form-switch-md">
                                <input class="form-check-input" type="checkbox" role="switch" name="destacar"
                                    id="destacar">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text"
                            placeholder="Por favor, elija un titulo para su publicació (5 - 50 caracteres)"
                            class="form-control is-invalid" name="titulo" autocomplete="off" minlength="10"
                            maxlength="50" required>
                        <div class="valid-feedback">
                            Aceptado.
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea
                            placeholder="Por favor, escriba una descripción para su publicació (10 - 1000 caracteres)"
                            rows="10" wrap="hard" class="form-control" name="descripcion" minlength="10"
                            maxlength="1000" required></textarea>

                        <div class="valid-feedback">
                            Aceptado.
                        </div>

                    </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="usuario_clave"
                            value=<?php echo $_SESSION['clave']?>>


                    </div>

                    <div class="row mx-5 py-2">

                        <div class="form-group col-lg-12 col-md-12">

                            <button type="submit" class="btn btn-primary col-lg-9 col-md-9"><b>Agregar
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