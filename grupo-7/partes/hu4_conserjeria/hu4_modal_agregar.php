    <!-- Modal -->
    <div class="modal fade" id="agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold mb-0" id="staticBackdropLabel">Agregar Registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Formulario Crear nuevo Aviso de Conserjería -->
          <form action="../controlador/hu4_conserjeria_controlador/hu4_insert.php" method="POST">
            <div class="row">
                <div class="col">
                  <div>
                    <label >Seleccione tipo de registro</label>
                  </div>
                </div>
                <div class="col">
                  <select class="form-select" name="tipo" required>
                          <option value="0" selected>Tipo de Registro</option>
                          <option value="6">Bitacora</option>
                          <option value="7">Encomienda</option>
                          <option value="4">Otro</option>
                  </select>
                </div>
            </div>
            <!-- Un titulo para el aviso -->
              <div class="row">
                
                <div class="form-group col">
                  <label for="exampleInputPassword1"  class="form-label">Titulo</label>
                  <input type="text" placeholder="Ingrese Título" class="form-control" name="titulo" required>
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
                  
                  <div class="col w-100 " >
                  <textarea class="input-text form-control" name="descripcion" placeholder="Ingrese un Comentario" style="height: 135px; width:100%;"></textarea>
                  </div>
              </div>
              <br>

              <div class="row ">
                  <div class="col me-1 text-end">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
              </div>
              
            </form>
        </div>
        
      </div>
    </div>
  </div>