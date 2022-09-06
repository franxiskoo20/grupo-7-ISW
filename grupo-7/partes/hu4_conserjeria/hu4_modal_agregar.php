<!-- Modal -->
<div class="modal fade" id="agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold mb-0 w-100 text-center" id="staticBackdropLabel">Agregar
                    Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario Crear nuevo Aviso de Conserjería -->
                <form class="was-validated" action="../controlador/hu4_conserjeria_controlador/hu4_insert.php"
                    method="POST" name="formulario_publicar" onsubmit="return validar_formulario_publicar()">
                    <div class="row">
                        <div class="col">
                            <div>
                                <label>Seleccione tipo de registro</label>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form form-control is-invalid" name="tipo" required>
                                <option value="" disabled selected>Tipo de Registro</option>
                                <option value="Bitacora">Bitácora</option>
                                <option value="Encomienda">Encomienda</option>
                                <option value="Otro">Otro</option>
                            </select>
                            <div class="valid-feedback">
                                Aceptado.
                            </div>
                        </div>
                    </div>
                    <!-- Un titulo para el aviso -->
                    <div class="row">

                        <div class="form-group col">
                            <label for="exampleInputPassword1" class="form-label">Titulo</label>
                            <input type="text" placeholder="Ingrese Título -(5 - 50 caracteres)"
                                class="form-control is-invalid" name="titulo" autocomplete="off" minlength="5"
                                maxlength="50" required>
                            <div class="valid-feedback">
                            Título correcto.
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Descripcion del Aviso -->
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Comentario</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col w-100 ">
                            <textarea class="input-text form-control" name="descripcion"
                                placeholder="Por favor, escriba un comentario para su aviso (5 - 200 caracteres)"
                                rows="18" wrap="hard" name="descripcion" minlength="5" maxlength="200"
                                style="height: 135px; width:100%;" required></textarea>
                        </div>
                        <div class="valid-feedback">
                        Comentario correcto.
                        </div>

                    </div>
                    <div class="row d-flex just-content-center  py-2">
                        <div class="col me-1 text-center">
                            <button type="submit" class="btn btn-primary"><b s><i
                                        class="fa fa-plus mx-1"></i>Enviar</b></button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>