<?php
if(!isset($_SESSION)) 
{   session_start();  
}
if (!isset($_SESSION['nombre'])) {
    header('Location: ../login/login.php');          
}
?>

<?php
function borrarErrores(){
	$borrado = false;
	

	if(isset($_SESSION['ingresado'])){
		$_SESSION['ingresado'] = null;
		$borrado = true;
	}
    if(isset($_SESSION['eliminado'])){
		$_SESSION['eliminado'] = null;
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
<?php if($_SESSION['tipo']=='Vecino' || !isset($_SESSION['tipo'])){

header('Location: ../inicio');
}
?>

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
            <div id="content" class="bg-light w-100">

                <!-- Button trigger modal -->
                <section class="py-3 bg-light">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3">
                        <div class="row">
                            <h1 class="font-weight-bold mb-0">Bienvenido al apartado de Reclamos </h1><br>
                            <h5>Revisa la última información de la tabla de reclamos.</h5>
                            <hr>
                        </div>
                        <div class="row">
                            <h5 class="text-center">Recuerda mantener discreción con las privacidad de los reclamos
                                emitidos.</h5>


                            <?php if(isset($_SESSION['ingresado'])): ?>
                            <div class="alert alert-success" role="alert">
                                <h5 class="text-center">Reclamo eliminado exitosamente!</h5>
                            </div>
                            <?php endif; ?>
                            <?php borrarErrores(); ?>



                        </div>

                    </div>
                </section>
                <!-- ALERTAS  -->

                <!-- ICONO DE ALERTA BOOTSTRAP  -->
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>

                <div class="container">

                    <?php if(isset($_SESSION['eliminado'])){ ?>

                    <div class="alert alert-danger d-flex align-items-center justify-content-center alert-dismissible fade show my-0"
                        role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div class="text-center">Aviso eliminado exitosamente</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <!-- ALERTA BOOTSTRAP  -->
                    <?php }else{if(isset($_SESSION['ingresado'])){
                            echo "<div class='alert alert-success d-flex justify-content-center align-items-center alert-dismissible fade show my-0' role='alert'>
                             <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'>
                             <use xlink:href='#check-circle-fill'/></svg>
                            <div class='text-center my-0'>Aviso ingresado exitosamente</div>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                            }}?>
                    <?php borrarErrores(); ?>

                </div>

                <section class="py-3">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3">
                        <!-- Listar tabla de avisos -->
                        <table class="table table-hover" id="table_reclamos">
                            <!-- Head Tabla -->
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th scope="col-lg-3 col-md-2 text-center">Remitente</th>
                                    <th scope="col-lg-3 col-md-2 text-center">Destinatario</th>
                                    <th scope="col-lg-3 col-md-2 text-center">Fecha</th>
                                    <th scope="col-lg-3 col-md-2 text-center">Descripción</th>
                                    <th scope="col-lg-3 col-md-2 text-center">Opciones </th>




                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php if($consulta_reclamos_conserje_sql): foreach($resultado_conserje as $row): ?>
                                <tr>
                                    <td class="col text-center">
                                        <?php  echo "<b style='font-weight: bold;'>".$row['remitente_nombre']." ".$row['remitente_apellido']."</b><br>";?>

                                        <?php echo "<small>".$row['remitente_edificio']." - ".$row['remitente_departamento']."</small>"?>
                                        <br>
                                        <?php echo "<small>".$row['remitente_correo']."</small>"?>
                                    </td>

                                    <td class="col text-center">
                                        <?php  echo "<b style='font-weight: bold;'>".$row['destinatario_nombre']." ".$row['destinatario_apellido']."</b><br>";?>

                                        <?php echo "<small>".$row['destinatario_edificio']." - ".$row['destinatario_departamento']."</small>"?>
                                        <br>
                                        <?php echo "<small>".$row['destinatario_correo']."</small>"?>
                                    </td>

                                    <td class="col text-center"><?php echo $row['formulario_fecha']." ".$row['formulario_hora']?></td>

                                    <td class="col text-center">
                                        <?php  echo "<b style='font-weight: bold;'>".$row['formulario_titulo']."</b><br>";?>
                                        <?php echo $row['formulario_contenido']?></td>

                                    <?php $formulario_id = $row['reclamo_id']; ?>
                                    <div class="d-flex justify-content-center">
                                     
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-primary " id="eliminar"
                                            href="../controlador/hu3_controlador_reclamos/hu3_eliminar_reclamo_conserje.php?id=<?= $formulario_id?>"><i
                                                class="btn-del fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                    </div>

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
                            <form class="was-validated" method="POST" id="formulario_reclamos"
                                name="formulario_reclamos" action="../partes/hu3_reclamos_vecinos/insertar.php"
                                onsubmit="return validar_formulario_reclamos()">
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
                                        <select id="myselect" class="form form-control is-invalid"
                                            name="formulario_destinatario_id" required>
                                            <option value="" disabled selected>Ingresa un Vecino.</option>
                                            <?php $getUsuarios= $con->query("SELECT * FROM usuario");
                                                                        while($row = mysqli_fetch_array($getUsuarios))
                                                                        {
                                                                         $usuario_nombre = $row['usuario_nombre'];
                                                                         $usuario_apellido = $row['usuario_apellido'];
                                                                         $usuario_clave = $row['usuario_id'];                                                              
                                                                   ?>
                                            <option value="<?php echo $usuario_clave ?>">
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

            <script type="text/javascript" src="../js/alerta_agregar.js"></script>

            <?php include('../partes/hu4_conserjeria/hu4_modal_agregar.php'); ?>

</body>

</html>