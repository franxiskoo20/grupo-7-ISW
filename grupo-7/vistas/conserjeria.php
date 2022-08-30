<?php
if(!isset($_SESSION)) 
{session_start(); 
}
if (isset($_SESSION['nombre'])) {
$usernameSesion = $_SESSION['nombre'];}?>
<!-- head -->
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
                            <h1 class="font-weight-bold mb-0">¡Bienvenido a Avisos de Conserjería!</h1><br>
                            <h5>Donde podrás revisar información útil de conserjería para la comunidad y
                                revisar todas las publicaciones existentes hasta el momento. </h5>
                            <hr>
                        </div>
                        <div class="row d-flex  text-center">

                            <div class="col">
                                <h7>Si tienes la intención de agregar una publicación al diario mural te invitamos a
                                    presionar el siguiente botón.</h7>
                            </div>

                            <div class="col-lg-2 d-flex justify-content-end my-2">
                                <a href="" class="btn btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#agregar"><b>Agregar</b></a>
                            </div>
                        </div>

                    </div>
                </section>

                <div class="container table-responsive">
                    <!-- Listar tabla de avisos -->
                    <table id="table_id" class="table">
                        <!-- Head Tabla -->
                        <thead>
                            <tr class="bg-primary text-light">
                                <th scope="col-1">Nombre</th>
                                <th scope="col">Título</th>
                                <th scope="col-1">Tipo</th>
                                <th scope="col-1">Fecha</th>
                                <th scope="col-4">Descripcion</th>
                                <th scope="col-2">Acción</th>
                            </tr>
                        </thead>
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
                                
                                <td><?php echo "usuario_nombre";?><br><?php echo "<small>"."usuario_correo"."</small>";?>
                                </td>
                                <td><?php echo $formulario_titulo;?></td>
                                <td><?php
                                                            if($formulario_tipo == "Bitacora"){
                                                                echo '<span class="badge bg-primary text-white">Bitácora</span>';
                                                            }else if($formulario_tipo == "Encomienda"){
                                                                    echo '<span class="badge bg-warning text-dark">Encomienda</span>';
                                                                }else if($formulario_tipo == "Otro"){
                                                                        echo '<span class="badge bg-info text-dark">Otro</span>';
                                                                    }
                                                        ?></td>
                                <td><?php echo $fecha_formateada; ?><br><?php echo $formulario_hora; ?></td>
                                <td ><?php echo "<p style='max-width: 380px;'>".$newdescripcion."</p>" ; ?></td>
                                <td class="">
                                    <a href="javascript:void(0)" class="btn btn-primary"
                                        onclick="fun('<?php echo $formulario_id;?>')"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a class="btn btn-primary "
                                        href="../controlador/hu4_conserjeria_controlador/hu4_delete.php?id=<?php echo $formulario_id;?>"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            <?php
                                    $contador++;
                                        
                                  }
                                    
                                } ?>


                            <!-- Fin bucle -->
                            <div id="divModal">
                                <!-- div para mostrar modal modificar -->
                            </div>
                        </tbody>

                    </table>
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
    <script src="../js/hu4_conserjeria.js"></script>
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
    <script src="../js/alerta_agregar.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>