<?php
function borrarErrores(){
	$borrado = false;
	

	if(isset($_SESSION['ingresado'])){
		$_SESSION['ingresado'] = null;
		$borrado = true;
	}
	
	return $borrado;
}
?>
<!-- head -->
<?php include('../partes/head.php') ?>

<!-- fin head -->

<!-- mostrar diario mural -->
<?php include("../controlador/hu3_controlador_reclamos/hu3_mostrar_reclamos.php") ?>

<!-- fin diario mural -->

<body>

    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        <?php include('../partes/sidebar.php') ?>
        <!-- fin sideBar -->

        <div class="w-100">
            <!-- Navbar -->

            <?php include('../partes/nav.php') ?>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">

                <!-- Button trigger modal -->
                <section class="py-3 bg-light">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3 ">
                        <div class="row">
                            <h1 class="font-weight-bold mb-0">¡Bienvenido al apartado de reclamos -
                                <?php echo$_SESSION['nombre'] ?></h1><br>
                            <h5>Revisa la última información de la tabla de reclamos.</h5>
                            <hr>
                        </div>
                        <div class="row">
                            <h6 class="text-center">Si deseas enviar un reclamo formal, presiona el botón "Ingresar
                                Reclamo". Recuerda, los reclamos
                                son
                                totalmente anónimos.</h6>


                            <?php if(isset($_SESSION['ingresado'])): ?>
                            <div class="alert alert-success" role="alert">
                            <h5 class="text-center">Reclamo ingresado exitosamente!</h5>
                            </div>
                            <?php endif; ?>
                            <?php borrarErrores(); ?>        



                        </div>

                        <div class="col d-flex justify-content-end">

                            <button type="button" class="btn btn-primary" data-toggle="modal" id="btn"
                                data-target="#reclamo"><b>Ingresar Reclamo</b>
                        </div>

                    </div>
                </section>

                <section class="py-0 my-0">
                    <div class="container">
                        <!-- Listar tabla de avisos -->
                        <table class="table table-hover" id="table_reclamos">
                            <!-- Head Tabla -->
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th scope="col-1">Destinatario</th>
                                    <th scope="col">Residencia</th>
                                    <th scope="col-1">Fecha</th>
                                    <th scope="col-1">Descripción </th>


                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php if($consulta_reclamos_sql): foreach($resultado as $row): ?>
                                <tr>
                                    <td aling="center">
                                        <?php echo "<b>".$row['destinatario_nombre']." ".$row['destinatario_apellido']."</b>"?>
                                        <br>
                                        <?php echo "<small>"."N° departamento: ".$row['destinatario_departamento']."</small>"?>
                                        <br>
                                        <?php echo "<small>".$row['destinatario_correo']."</small>"?>
                                    </td>

                                    <td><?php echo "Edificio: ".$row['destinatario_edificio']?>
                                        <br>
                                        <?php echo "N° departamento:".$row['destinatario_departamento']?>
                                    </td>

                                    <td><?php echo $row['formulario_fecha']." ".$row['formulario_hora']?></td>

                                    <td>
                                        <?php echo "<b>".strtoupper($row['formulario_titulo'])."</b><br>"?>
                                        <?php echo $row['formulario_contenido']?></td>
                                    <td>
                                </tr>
                                <?php endforeach; endif ?>

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <!-- Modal publicar -->

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="reclamo" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-weight-bold mb-0 w-100 text-center">Formulario de Reclamos</h2>
                            <button type="button" class="btn btn-primary" id="cerrarFormulario" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="was-validated" method="POST"
                                action="../partes/hu3_reclamos_vecinos/insertar.php">
                                <div class="row">
                                    <?php $fecha = date("Y-m-d");?>
                                    <?php $mDate=new DateTime();?>
                                    <?php $hoy= $mDate->format("H:i");?>

                                    <div class="form-group col-lg-5 col-md-5">
                                        <label>Titulo</label>
                                        <input type="text" placeholder="Ingresa un Titulo"
                                            class="form-control is-invalid" autocomplete=" off" minlength="10"
                                            maxlength="50" required name="formulario_titulo">
                                        <div class="valid-feedback">
                                            Titulo Correcto.
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-5 col-md-5">
                                        <label>Dirigido a:</label>
                                        <select class="form form-control is-invalid" name="formulario_destinatario_id"
                                            required>
                                            <option value="" disabled selected>Ingresa un Vecino.</option>
                                            <?php $getUsuarios= $con->query("SELECT * FROM usuario");
                                                                        while($row = mysqli_fetch_array($getUsuarios))
                                                                        {
                                                                         $usuario_nombre = $row['usuario_nombre'];
                                                                         $usuario_apellido = $row['usuario_apellido'];
                                                                         $usuario_clave = $row['usuario_id'];                                                              
                                                                   ?>
                                            <option value="<?php echo $usuario_clave; ?>">
                                                <?php echo $usuario_nombre." ".$usuario_apellido    ?>
                                            </option>
                                            <?php 
                                                                        }?>
                                        </select>
                                        <div class="valid-feedback">
                                            Aceptado.
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea placeholder="Ingresa una descripción" rows="10" wrap="hard"
                                        class="form-control" name="formulario_contenido" required></textarea>
                                    <div class="valid-feedback">
                                        Descripción Correcta.
                                    </div>
                                </div>
                                </tr>
                                <tr>

                                    <td><input type="hidden" name="formulario_fecha" value="<?php echo $fecha;?>"></td>
                                </tr>
                                <tr>

                                    <td><input type="hidden" name="formulario_hora" value="<?php echo $hoy;?>"></td>
                                </tr>
                                <tr>
                                    <!--						<td>Usuario clave: </td>   -->
                                    <td><input type="hidden" name="formulario_remitente_id"
                                            value="<?php echo $_SESSION['id'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <!--						<td>Tipo form: </td>        -->
                                    <td><input type="hidden" name="formulario_tipo" value="Reclamo"> </td>
                                </tr>

                                <tr>
                                    <!--						<td>Destacar: </td>     -->
                                    <td><input type="hidden" name="formulario_destacar" value=1> </td>
                                </tr>

                                <!-- Siempre los reclamos tienen tipo_form 5 -->


                                <div class="d-flex justify-content-center mt-2">
                                    <button type="submit" class="btn btn-primary col-lg-9 col-md-9"><b>Agregar
                                            publicación</b></button>

                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
            </script>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
                integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
                integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
                integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
                crossorigin="anonymous">
            </script>

            <!-- Font awesome -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
                integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <!-- Data table -->
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

            <!-- Data table cambio de idioma -->
            <script type="text/javascript" src="../js/data_table_reclamos.js"></script>

            <!-- Sweet alert-->
            <script type="text/javascript" src="../js/alerta_agregar.js"></script>
            <script type="text/javascript" src="../js/alerta_eliminar.js"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>

            <!-- sweetalert2 -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../js/alerta_agregar.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>

            <?php include('../partes/hu4_conserjeria/hu4_modal_agregar.php'); ?>

</body>

</html>