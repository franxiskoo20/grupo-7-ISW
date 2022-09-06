<?php
if(!isset($_SESSION)) 
{   session_start();  
}
if (!isset($_SESSION['nombre'])) {
    header('Location: ../login/login.php');          
}
?>

<?php

if (isset($_SESSION['nombre'])) {
$usernameSesion = $_SESSION['nombre'];
$usuarioId = $_SESSION['id'];

}?>


<?php
function borrarErrores(){
	$borrado = false;
	

	if(isset($_SESSION['eliminado'])){
		$_SESSION['eliminado'] = null;
		$borrado = true;
	}
    if(isset($_SESSION['ingresado'])){
		$_SESSION['ingresado'] = null;
		$borrado = true;
	}
    if(isset($_SESSION['modificado'])){
		$_SESSION['modificado'] = null;
		$borrado = true;
	}
    if(isset($_SESSION['borrar_historial'])){
		$_SESSION['borrar_historial'] = null;
		$borrado = true;
	}
	
	return $borrado;
}
?>



<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->
<!-- mostrar diario mural -->
<?php        include("../controlador/hu1_controlador_diariomural/hu1_mostrar_diariomural.php") ?>
<!-- fin diario mural -->

<?php include '../controlador/hu1_controlador_diariomural/hu1_mostrar_historial_formulario.php'; ?>
<!-- fin historial anuncios -->


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

                <!-- APARTADO DEL TITULO DIARIO MURAL  -->

                <section class="py-3">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3">
                        <div class="row">
                            <h1 class="font-weight-bold mb-0">Bienvenido al Diario mural -
                                <?php echo $usernameSesion?></h1><br>
                            <h5>Donde podrás compartir información que consideres importante para la comunidad y
                                revisar todas las publicaciones existentes hasta el momento. </h5>
                            <hr>
                        </div>
                        <div class="row">
                            <h6 class="text-center"><br>Si tienes la intención de agregar una publicación al diario
                                mural te invitamos a presionar el siguiente botón.</h6>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <!-- botón que permite crear anuncio  -->
                            <div class="col-lg-2 col-md-2">

                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    id="btn_de_agregar" data-bs-target="#publicar_diariomural"><b><i
                                            class="fa fa-plus mx-1"></i>Publicar</b></button>


                            </div>
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
                            
                            }elseif(isset($_SESSION['modificado'])){
                                echo "<div class='alert alert-info d-flex justify-content-center align-items-center alert-dismissible fade show my-0' role='alert'>
                                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'>
                                <use xlink:href='#check-circle-fill'/></svg>
                               <div class='text-center'>Aviso modificado exitosamente</div>
                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                               </div>";

                            }elseif(isset($_SESSION['borrar_historial'])){
                                echo "<div class='alert alert-danger d-flex justify-content-center align-items-center alert-dismissible fade show my-0' role='alert'>
                                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'>
                                <use xlink:href='#check-circle-fill'/></svg>
                               <div class='text-center'>Historial borrado exitosamente</div>
                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                               </div>";

                            }}?>
                    <?php borrarErrores(); ?>

                </div>

                <!-- FILTRO DIARIO MURAL Y HISTORIAL FORMULARIO  -->

                <section class="py-3">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3">

                        <!-- formulario filtrar -->
                        <form action="hu1_diariomural.php" name="filtrar_diariomural_formulario" method="POST">
                            <div class="row">

                                <!-- select del filtro  -->
                                <div class="col-lg-3 col-md-3">
                                    <label for="filtrar_anuncios"><b style='font-weight: bold'>Filtrar
                                            anuncios:</b></label>

                                    <div class="d-flex align-items-center">
                                        <select class="form-control" name="filtrar_anuncios" id="filtrar_anuncios">
                                            <option value="Mis anuncios"
                                                <?php echo ($filtrar_anuncios_opcion == 'Mis anuncios')?'selected':''; ?>>
                                                Mis anuncios</option>
                                            <option value="Todos"
                                                <?php echo ($filtrar_anuncios_opcion == 'Todos')?'selected':''; ?>>Todos
                                            </option>
                                        </select>

                                        <input type="hidden" class="form-control" name="usuario_clave_filtrar"
                                            value=<?php echo $usuarioId?>>

                                        <button type="submit" class="btn btn-primary mx-2"><i
                                                class="fa-solid fa-filter"></i></button>


                                    </div>

                                </div>
                                <!-- boton para filtrar -->

                                <div class="col-lg-2 col-md-2">
                                    <div>
                                        <label for="formularo_historial"><b style='font-weight: bold;'>Historial de
                                                anuncios:</b></label>
                                        <div class="d-flex align-items-end">
                                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                                id="btn_formulario_historial" data-bs-target="#formulario_historial"><i
                                                    class="fa-solid fa-clipboard " style="color:#ffffff;"></i></button>

                                        </div>


                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6">

                                    <label for="simbologia"><b style='font-weight: bold;'>Simbología:</b></label>

                                    <div class="my-1">

                                        <span> <i class="fa-solid fa-star" style="color:#ffaa00;"></i>Destacar
                                            anuncio</span>
                                        <span>
                                            <i class="fa-solid fa-pencil mx-2" style="color:#111B54;"></i>Anuncio modificado

                                        </span>



                                    </div>

                                </div>

                            </div>



                        </form>

                    </div>
                </section>


                <!-- MOSTRAR DIARIO MURAL  -->

                <section class="py-0 my-0">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <table class="table table-hover" name="tabla_diariomural" id="tabla_diariomural">
                                    <thead class="bg-primary">
                                        <tr style="color:white">
                                            <th class="col-lg-3 col-md-2 text-center" scope="col">Nombre</th>
                                            <th class="col-lg-2 col-md-1 text-center" scope="col">Tipo</th>
                                            <th class="col-lg-2 col-md-1 text-center" scope="col">Fecha</th>
                                            <th class="col-lg-4 col-md-6 text-center" scope="col">Descripción</th>
                                            <th class="col-lg-1 col-md-2 text-center" scope="col">Opciónes</th>
                                        </tr>
                                    </thead>

                                    <!-- inicio ciclo -->

                                    <?php 
                                    
                            
                                    if($mostrarDiariomural->rowCount() > 0){
                                
                                $contador =+1;
                                        while($row=$mostrarDiariomural->fetch(PDO::FETCH_ASSOC)){
                                        extract($row); ?>



                                    <tr>
                                        <td class="col text-center">
                                            <?php if($formulario_destacar =='1'){
                                                echo "<b style='font-weight: bold;'>".$usuario_nombre." ".$usuario_apellido."</b><i class='fa-solid fa-star mx-1' style='color:#ffaa00;'></i>";
                                                echo $formulario_actualizar == '1'?'<i class="fa-solid fa-pencil" style="color:#111B54;"></i>':'';


                                                echo "<br><small>"."N° departamento: ".$usuario_departamento."</small><br>";
                                                echo "<small>".$usuario_correo."</small>";
                                                
                                            }else{
                                                echo "<b style='font-weight: bold;'>".$usuario_nombre." ".$usuario_apellido."</b>";
                                                echo $formulario_actualizar == '1'?'<i class="fa-solid fa-pencil mx-1" style="color:#111B54;"></i>':'';
                                                echo "<br><small>"."N° departamento: ".$usuario_departamento."</small><br>";
                                                echo "<small>".$usuario_correo."</small>";

                                            }
                                            ?>
                                        </td>

                                        <td class="col text-center">
                                            <?php
                                        
                                            if($formulario_tipo =='Información'){
                                    
                                                echo '<span class="badge bg-primary text-white">Información</span>';

                                                }else if($formulario_tipo  == 'Publicidad'){
                                            
                                                    echo '<span class="badge bg-danger text-white">Publicidad</span>';

                                                    }else if($formulario_tipo =='Recomendaciones'){

                                                    echo '<span class="badge bg-warning text-white">Recomendaciones</span>';
                                                    
                                                  
                                                }
                                           
                                            ?>

                                        </td>

                                        <td class="col text-center">
                                            <?php echo "<b style='font-weight: bold;'>".$fecha_formateada."</b><br>".$formulario_hora.""?>
                                        </td>

                                        <td><?php echo "<p class='text-center my-0'><b style='font-weight: bold;'>".strtoupper($formulario_titulo)."</p></b>"?>
                                            <?php echo $formulario_contenido?></td>


                                        <td>
                                            <!-- boton de modificar y eleminar -->
                                            <div class="d-flex align-items-stretch justify-content-center">

                                                <?php

                                                    if($formulario_remitente_id == $usuarioId ){

                                     
                                                        echo "<button type='button' class='btn btn-primary mx-1'
                                                        data-toggle='modal'
                                                        data-target='#modificar_publicacion".$formulario_id."'><i
                                                        class='fa-regular fa-pen-to-square'></i></button>";
    

                                                echo "<a class='btn btn-primary' data-bs-toggle='modal'
                                                    href=../controlador/hu1_controlador_diariomural/hu1_eliminar_diariomural.php?id=".$formulario_id."><i
                                                    class='btn-del fa-solid fa-trash-can'></i></a>";


                                                }else{

                                                echo "<button type='button' class='btn btn-secondary mx-1'
                                                    data-toggle='modal'
                                                    data-target='#modificar_publicacion".$formulario_id."'disabled><i
                                                    class='fa-regular fa-pen-to-square'></i></button>";


                                                echo "<a class='btn btn-secondary disabled' data-bs-toggle='modal'
                                                    href=../controlador/hu1_controlador_diariomural/hu1_eliminar_diariomural.php?id=".$formulario_id."><i
                                                    class='btn-del fa-solid fa-trash-can'></i></a>";

                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php include("../partes/hu1_modales_diariomural/modal_modificar_publicacion.php") ?>

                                    <!-- fin ciclo -->
                                    <?php }} ?>

                            </div>

                            </table>

                        </div>

                    </div>
            </div>
            </section>
        </div>

    </div>
    </div>

    <!-- Modal publicar -->

    <?php include("../partes/hu1_modales_diariomural/modal_publicar.php") ?>

    <!-- Modal historial formulario -->
    <?php include("../partes/hu1_modales_diariomural/modal_formulario_historial.php") ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <!-- bostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>

    <!-- Font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Limpiar modal crear anuncio -->

    <script type="text/javascript">
    $(function(e) {

        const $ventanaPublicarDiariomural = $('#publicar_diariomural');
        const $botonCerrar = $('#cerrarModalDiariomural');

        $botonCerrar.on('click', function() {

            $ventanaPublicarDiariomural.modal('show');

        });

        $ventanaPublicarDiariomural.on('hidden.bs.modal', function(event) {

            const $formulario = $ventanaPublicarDiariomural.find('form');
            $formulario[0].reset();
        });

    });
    </script>


    <!-- Data table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js">
    </script>

    <!-- Data table cambio de idioma -->
    <script type="text/javascript" src="../js/data_table.js"></script>


    <!-- Sweet alert-->
    <script type="text/javascript" src="../js/alerta_agregar.js"></script>
    <script type="text/javascript" src="../js/alerta_eliminar_historial.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>