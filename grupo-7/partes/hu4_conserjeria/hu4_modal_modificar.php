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
            <!-- Formulario Crear nuevo Aviso de Conserjería -->
            <form action="../controlador/hu4_conserjeria_controlador/hu4_edit.php"  method="POST">
                <div class="modal-body mt-4">
                    <div class="row">
                        <div class="col">
                            <div>
                                <label >Seleccione tipo de registro</label>
                            </div>
                        </div>
                        <div class="col"  >
                            <select class="form-select" name="tipo_form_actualizar" value="<?php echo $formulario_tipo ;?>" required>
                            
                                <option value="" >Tipo de Registro </option>
                                <option value="Bitacora">Bitácora</option>
                                <option value="Encomienda">Encomienda</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <!-- Modificar titulo y Fecha del aviso -->
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputPassword1"  class="form-label">Título</label>
                            <input type="text" placeholder="Entrega de llaves" value="<?php echo $formulario_titulo;?>" class="form-control" name="titulo_actualizar" required>
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Fecha antigua: <?php echo $fecha_formateada;?></label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="datepicker" name="fecha_actualizar" value="<?php echo $fecha_formateada;?>" required>
                        </div>
                    </div>
                    <br>
                    <!-- Modificar Descripcion del Aviso -->
                    <div class="row">
                        <div class="form-group col-3">
                            <label >Comentario</label>
                        </div>
                        <div class="col-7 campo" >
                            <textarea class="input-text form-control" name="descripcion_actualizar" rows="18" wrap="hard" minlength="10"
                            maxlength="1000"  style="height: 135px; width:100%;"><?php echo $formulario_contenido;?></textarea>
                        </div>
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