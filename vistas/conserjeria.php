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
                            <?php if(isset($_SESSION['eliminado'])){ ?>
                            <div class="alert alert-success" role="alert">
                                <h5 class="text-center">Aviso eliminado exitosamente</h5>
                            </div>

                            <?php }else{if(isset($_SESSION['ingresado'])){
                            echo "<div class='alert alert-success' role='alert'>
                            <h5 class='text-center'>Aviso ingresado exitosamente</h5>
                            </div>";
                            }else{if(isset($_SESSION['modificado'])){
                                echo "<div class='alert alert-success' role='alert'>
                                <h5 class='text-center'>Aviso modificado exitosamente!</h5>
                                </div>";

                            }}} ?>
                            <?php borrarErrores(); ?>

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

    //Envía el id y se muestra el registro por modal.
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