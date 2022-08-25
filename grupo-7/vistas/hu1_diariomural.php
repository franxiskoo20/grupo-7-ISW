<?php

if (isset($_SESSION['nombre'])) {
$usernameSesion = $_SESSION['nombre'];}?>
<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->
<!-- mostrar diario mural -->
<?php include("../controlador/hu1_controlador_diariomural/hu1_mostrar_diariomural.php") ?>
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

                <section class="py-3 bg-light">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3 ">
                        <div class="row">
                            <h1 class="font-weight-bold mb-0">¡Bienvenido al Diario mural! -
                                <?php echo $usernameSesion ?></h1><br>
                            <h5>Donde podrás compartir información que consideres importante para la comunidad y
                                revisar todas las publicaciones existentes hasta el momento. </h5>
                            <hr>
                        </div>
                        <div class="row">
                            <h6 class="text-center"><br>Si tienes la intención de agregar una publicación al diario
                                mural
                                te invitamos a
                                presionar el siguiente botón.</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                id="btn_publicar_diario" data-bs-target="#publicar_diariomural"><b>Publicar</b></button>
                        </div>

                    </div>
                </section>

                <section class="py-0 my-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 ">
                                <table class="table table-hover" id="table_id">
                                    <thead class="bg-primary">
                                        <tr style="color:white">
                                            <th class="col-lg-3 col-md-2" scope="col">Nombre</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Tipo</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Fecha</th>
                                            <th class="col-lg-4 col-md-6" scope="col">Descripción</th>
                                            <th class="col-lg-1 col-md-2" scope="col">Opciónes</th>
                                        </tr>
                                    </thead>

                                    <?php if($consultaFormulario): foreach($consultaFormulario as $row): ?>
                                    <tr>
                                        <td><?php echo "<b style='font-weight: bold;'>".$row['usuario_nombre']."</b><br>"?>
                                            <?php echo "<small>"."N° departamento: ".$row['dep_numero']."</small><br>"?>
                                            <?php echo "<small>".$row['usuario_correo']."</small>"?></td>
                                        <td>
                                            <?php
                                        
                                            if($row['tipo_form_nombre'] =='Informacion'){
                                    
                                                echo '<span class="badge bg-primary text-white">Información</span>';

                                                }else if($row['tipo_form_nombre']  == 'Publicidad'){
                                            
                                                    echo '<span class="badge bg-danger text-white">Publicidad</span>';

                                                    }else if($row['tipo_form_nombre']  =='Recomendaciones'){

                                                    echo '<span class="badge bg-warning text-white">Recomendaciones</span>';
                                                    
                                                    }else if($row['tipo_form_nombre']  =='Otro'){

                                                    echo '<span class="badge bg-success text-white">Otro</span>';

                                                }
                                           
                                            ?>

                                        </td>

                                        <td><?php echo $row['fecha_formateada']?></td>

                                        <td><?php echo "<b style='font-weight: bold;'>".strtoupper($row['form_titulo'])."</b><br>"?>
                                            <?php echo $row['form_descripcion']?></td>


                                        <td>

                                            <div class="d-flex align-items-stretch justify-content-center">

                                                <a class="btn btn-primary" data-bs-toggle="modal"
                                                    href="../controlador/hu1_controlador_diariomural/hu1_eliminar_diariomural.php?id=<?php echo $row['form_clave'];?>"><i
                                                        class="fa-solid fa-trash"></i></a>


                                            </div>
                                        </td>
                                    </tr>
                            </div>


                            <?php endforeach; endif ?>

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
    <script type="text/javascript" src="../js/alerta_eliminar.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>

</html>