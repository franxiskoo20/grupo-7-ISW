<?php
     include '../../controlador/hu4_conserjeria_controlador/hu4_read.php';
    $id = $_GET['id'];
   
?>

    <!-- Modal -->
<div class="modal fade" id="modificar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modificar registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <?php 
                    if($stmt->rowCount() > 0) {
                        $contador =+1;
                        
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                             
                        extract($row);
            ?>
            <?php if($_GET['id'] == $formulario_id){ ?>
            <div class="modal-body mt-4">
            <!-- Formulario Crear nuevo Aviso de Conserjería -->
                <form class="was-validated" action="../controlador/hu4_conserjeria_controlador/hu4_edit.php"  method="POST" name="formulario_modificar" onsubmit="return validar_formulario_modificar()">
                    
                        <div class="row">
                            <div class="col">
                                <div class="text-start">
                                    <label >Seleccione tipo de registro</label>
                                </div>
                            </div>
                            <div class="col"  >
                                <select class="form-select is-invalid" name="tipo_form_actualizar" value="<?php echo $formulario_tipo ;?>" required>
                                
                                    <option value="" >Tipo de Registro </option>
                                    <option value="Bitacora">Bitácora</option>
                                    <option value="Encomienda">Encomienda</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <div class="valid-feedback">
                                    Aceptado.
                                </div>
                            </div>
                        </div>
                        <!-- Modificar titulo y Fecha del aviso -->
                        <div class="row">
                            <div class="col text-start">
                                <label for="exampleInputPassword1"  class="form-label">Título</label>
                            </div>
                            <div class="form-group col-12">
                                <input type="text" placeholder="Ingrese Título -(10 - 50 caracteres)" value="<?php echo $formulario_titulo;?>" class="form-control is-invalid" name="titulo_actualizar" 
                                    minlength="10" maxlength="50" required>
                            </div> 
                            <div class="valid-feedback">
                                    Aceptado.
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col text-start">
                                <label for="exampleInputPassword1" class="form-label">Fecha antigua: <?php echo $fecha_formateada;?></label>
                            </div>
                            <div class="col">
                                <input type="date" class="form-control is-invalid" id="datepicker" name="fecha_actualizar" value="<?php echo $fecha_formateada;?>" required>
                            </div>
                            <div class="valid-feedback">
                                    Aceptado.
                            </div>
                        </div>
                        <br>
                        <!-- Modificar Descripcion del Aviso -->
                        <div class="row">
                            <div class="form-group col-4 text-start">
                                <label class="form-label ">Comentario</label>
                            </div>
                            <div class="col-8 w-100 campo" >
                                <textarea class="input-text form-control"placeholder="Por favor, escriba un comentario para su aviso (10 - 900 caracteres)" name="descripcion_actualizar" rows="18" wrap="hard" minlength="10"
                                maxlength="900"  style="height: 135px; width:100%;"><?php echo $formulario_contenido;?></textarea>
                            </div>
                        </div>
                    
                    <br>
                    <div class="row text-end">
                        <div class="col-7"></div>
                        <div class="col-2"><button type="reset" class="btn btn-primary "><i class="fa-solid fa-trash"></i>&nbsp</button></div>
                        <div class="form-group col-2">
                            <button type="submit"  class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="form_clave" value="<?php echo $row['formulario_id']; ?>">
                    <?php }
                        }
                    }?>
                </form>
          </div>
        </div>
      </div>
    </div>
</div>