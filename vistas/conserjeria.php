<?php
if(!isset($_SESSION)) 
{session_start(); 
}
if (isset($_SESSION['nombre'])) {
$usernameSesion = $_SESSION['nombre'];
$usuarioTipo = $_SESSION['tipo'];
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
	
	return $borrado;
}
?>
<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->
<!-- body -->

<body>
    <div class="d-flex">
        <!-- sidebar -->
        <?php include('../partes/sidebar.php') ?>
        <!-- fin sidebar -->
        <div class="w-100">
            <!-- navbar -->
            <?php include('../partes/nav.php') ?>
            <!-- fin navbar -->
            <div id="content" class="bg-light w-100">

                <section class="py-3 bg-light">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3 ">
                        <div class="row">
                            <h1 class="font-weight-bold mb-0">Bienvenido a Avisos de Conserjería -
                                <?php echo $usernameSesion ?></h1><br>
                            <h5>Donde podrás revisar información útil de conserjería para la comunidad y
                                revisar todas las publicaciones existentes hasta el momento. </h5>
                            <hr>
                        </div>
                        <div class="row d-flex  text-center">
                            <div class="col">
                                <h7>Si tienes la intención de agregar una publicación al diario mural te invitamos a
                                    presionar el siguiente botón.</h7>
                            </div>

                            <?php if ($usuarioTipo == 'Conserje') {?>
                            <div class="row d-flex justify-content-end">

                                <div class="col-lg-2 col-md-2">

                                    <a href="" class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#agregar" id="btn_de_agregar"><b><i
                                                class="fa fa-plus mx-1"></i>Agregar</b></a>
                                </div>

                            </div>
                            <?php }?>
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
                    <?php }elseif(isset($_SESSION['ingresado'])){
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

                            } ?>
                    <?php borrarErrores(); ?>

                </div>

                <section class="py-3">
                    <div class="container table-responsive shadow px-4 py-3 bg-grey ">
                        <!-- Listar tabla de avisos -->
                        <table class="table table-hover" id="table_id" class="table">
                            <!-- Head Tabla -->
                            <thead>
                                <tr class="bg-primary text-light text-center">
                                    <th class="text-center" scope="col-1">Nombre</th>
                                    <th class="text-center" scope="col">Título</th>
                                    <th class="text-center" scope="col-1">Tipo</th>
                                    <th class="text-center" scope="col-1">Fecha</th>
                                    <th class="text-center" scope="col-4">Descripción</th>
                                    <?php if ($usuarioTipo == 'Conserje') {?>
                                    <th class="text-center" scope="col-2">Opciónes</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <!-- Condición para viasualizar solo avisos de la vista -->
                            <!-- Body Tabla -->
                            <tbody id="body">
                                <!-- Recorrer fila por cada registro -->
                                <?php
                                /* Se llama a Mostrar_aviso que traerá la variable con la consulta */
                                include '../controlador/hu4_conserjeria_controlador/mostrar_aviso.php';
                                if($stmt->rowCount() > 0) {
                                    $contador =+1;
                                    
                                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                                         
                                    extract($row);
                                    
                            ?>
                                <!-- Se usa replace para mostrar un salto de linea en PHP y html. -->
                                <?php 
                                    $order = array("\n");
                                    $replace = '<br/>';
                                    $newdescripcion = str_replace($order,$replace,$formulario_contenido);
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $usuario_nombre." ".$usuario_apellido;?><br><?php echo "<small>".$usuario_correo."</small>";?>
                                    </td class="text-center">
                                    <td class="text-center"><?php echo $formulario_titulo;?></td>
                                    <td class="text-center"><?php   if($formulario_tipo == "Bitacora"){
                                                 echo '<span class="badge bg-primary text-white">Bitácora</span>';
                                            }else if($formulario_tipo == "Encomienda"){
                                                        echo '<span class="badge bg-warning text-dark">Encomienda</span>';
                                                    }else if($formulario_tipo == "Otro"){
                                                                echo '<span class="badge bg-info text-dark">Otro</span>';
                                                            }
                                    ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $fecha_formateada; ?><br><?php echo $formulario_hora; ?></td>
                                    <td>
                                        <?php echo "<p style='max-width: 380px;'>".$newdescripcion."</p>" ; ?></td>
                                    <?php if ($usuarioTipo == 'Conserje') {?>
                                    <td class="text-center">
                                        <a title="Editar" href="javascript:void(0)" class="btn btn-primary"
                                            onclick="fun('<?php echo $formulario_id;?>')"><i
                                                class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a title="Eliminar" class="btn btn-primary " id="del"
                                            href="../controlador/hu4_conserjeria_controlador/hu4_delete.php?id=<?= $formulario_id;?>"><i
                                                class="btn-del fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                    <?php }?>
                                </tr>
                                <?php  }   
                                } ?>
                                <!-- Fin bucle -->
                                <div id="divModal">
                                    <!-- div para mostrar modal modificar -->
                                </div>
                            </tbody>
                        </table>
                        <br><br>
                        <!-- fin table -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal agregar registro  -->
    <?php include('../partes/hu4_conserjeria/hu4_modal_agregar.php'); ?>
    <!-- fin modal include -->
    <!--         Optional JavaScript          -->

    <!--Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>

    <!-- DataTable -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <!-- script para datatable modificado -->

    <!-- Envía el id y se muestra el registro por modal. -->
    <script>
    function fun(id) {
        var ruta = '../partes/hu4_conserjeria/hu4_modal_modificar.php?id=' + id;
        console.log(ruta);
        $.get(ruta, function(data) {
            $('#divModal').html(data);
            $('#modificar').modal('show');

        });

    }
    </script>

    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.all.min.js"></script>
    <script src="../js/alerta_agregar.js"></script>
    <script src="../js/hu4_conserjeria.js"></script>
    <script type="text/javascript" src="../js/alerta_modificar.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>