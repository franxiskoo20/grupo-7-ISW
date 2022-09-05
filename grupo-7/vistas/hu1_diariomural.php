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

                <!-- APARTADO DEL TITULO DIARIO MURAL  -->

                <section class="py-3 bg-light">
                    <div class="container shadow px-4 py-3 bg-grey rounded-3 ">
                        <div class="row">
                            <h1 class="font-weight-bold mb-0">¡Bienvenido al Diario mural! -
                                <?php echo $_SESSION['nombre'] ?></h1><br>
                            <h5>Donde podrás compartir información que consideres importante para la comunidad y
                                revisar todas las publicaciones existentes hasta el momento. </h5>
                            <hr>
                        </div>
                        <div class="row">
                            <h6 class="text-center"><br>Si tienes la intención de agregar una publicación al diario
                                mural te invitamos a presionar el siguiente botón.</h6>
                        </div>
                        <div class="row">
                            <!-- botón que permite crear anuncio  -->
                            <div class="d-flex justify-content-end">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    id="btn_publicar_diario" data-bs-target="#publicar_diariomural"><b><i
                                            class="fa fa-plus mx-1"></i>Publicar</b></button>


                            </div>
                        </div>

                    </div>
                </section>

                <!-- FILTRO DIARIO MURAL  -->

                <section class="py-3 bg-light">
                    <div class="container px-4 py-3 bg-grey rounded-3 ">

                        <!-- formulario filtrar -->
                        <form action="hu1_diariomural.php" name="filtrar_diariomural_formulario" method="POST">
                            <div class="row">

                                <!-- select del filtro  -->
                                <div class="col-lg-3 col-md-2">
                                    <label for="filtrar_anuncios"><b style='font-weight: bold;'>Filtrar
                                            anuncios:</b></label>
                                    <select class="form-control" name="filtrar_anuncios" id="filtrar_anuncios">
                                        <option value="Mis anuncios"
                                            <?php echo ($filtrar_anuncios_opcion == 'Mis anuncios')?'selected':''; ?>>
                                            Mis anuncios</option>
                                        <option value="Todos"
                                            <?php echo ($filtrar_anuncios_opcion == 'Todos')?'selected':''; ?>>Todos
                                        </option>
                                    </select>

                                </div>
                                <!-- boton para filtrar -->
                                <div class="col-lg-3 col-md-2 d-flex align-items-end">
                                    <input type="hidden" class="form-control" name="usuario_clave_filtrar"
                                        value=<?php echo $_SESSION['id']?>>

                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-filter"></i></button>
                                </div>

                            </div>
                        </form>
                    </div>


                </section>


                <!-- MOSTRAR DIARIO MURAL  -->

                <section class="py-0 my-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 ">
                                <table class="table table-hover" name="tabla_diariomural" id="tabla_diariomural">
                                    <thead class="bg-primary">
                                        <tr style="color:white">
                                            <th class="col-lg-3 col-md-2" scope="col">Nombre</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Tipo</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Fecha</th>
                                            <th class="col-lg-4 col-md-6" scope="col">Descripción</th>
                                            <th class="col-lg-1 col-md-2" scope="col">Opciónes</th>
                                        </tr>
                                    </thead>

                                    <!-- inicio ciclo -->
                                    <?php if($mostrarDiariomural->rowCount() > 0):
                                

                                        while($row=$mostrarDiariomural->fetch(PDO::FETCH_ASSOC)):
                                        extract($row); ?>

                                    <tr>
                                        <td>
                                            <?php if($formulario_destacar =='1'){
                                                echo "<b style='font-weight: bold;'>".$usuario_nombre." ".$usuario_apellido."</b><i class='fa-solid fa-star mx-1' style='color:#ffaa00;'></i>";
                                                echo $formulario_actualizar == '1'?'<i class="fa-solid fa-pencil" style="color:#111B54;"></i>':'';


                                                echo "<br><small>"."N° departamento: ".$usuario_departamento."</small><br>";
                                                echo "<small>".$usuario_correo."</small>";
                                            }else{
                                                echo "<b style='font-weight: bold;'>".$usuario_nombre." ".$usuario_apellido."</b>";
                                                echo $formulario_actualizar == '1'?'<i class="fa-solid fa-pencil" style="color:#111B54;"></i>':'';
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
                                                    
                                                    }else if($formulario_tipo  =='Otro'){

                                                    echo '<span class="badge bg-success text-white">Otro</span>';

                                                }
                                           
                                            ?>

                                        </td>

                                        <td class="col text-center">
                                            <?php echo "<b style='font-weight: bold;'>".$fecha_formateada."</b>"?></td>

                                        <td><?php echo "<p class='text-center my-0'><b style='font-weight: bold;'>".strtoupper($formulario_titulo)."</p></b>"?>
                                            <?php echo $formulario_contenido?></td>


                                        <td>
                                            <!-- boton de modificar y eleminar -->
                                            <div class="d-flex align-items-stretch justify-content-center">

                                                <?php

                                                    if($formulario_remitente_id == $_SESSION['id'] ){

                                     
                                                        echo "<button type='button' class='btn btn-primary mx-1'
                                                        data-toggle='modal'
                                                        data-target='#modificar_publicacion".$formulario_id."'>
                                                        <i class='fa-solid fa-book'></i></button>";
    

                                                echo "<a class='btn btn-primary' data-bs-toggle='modal'
                                                    href=../controlador/hu1_controlador_diariomural/hu1_eliminar_diariomural.php?id=".$formulario_id."><i
                                                        class='fa-solid fa-trash'></i></a>";


                                                }else{

                                                echo "<button type='button' class='btn btn-secondary mx-1'
                                                    data-toggle='modal'
                                                    data-target='#modificar_publicacion".$formulario_id."' disabled>
                                                    <i class='fa-solid fa-book'></i></button>";


                                                echo "<a class='btn btn-secondary disabled' data-bs-toggle='modal'
                                                    href=../controlador/hu1_controlador_diariomural/hu1_eliminar_diariomural.php?id=".$formulario_id."><i
                                                        class='fa-solid fa-trash'></i></a>";

                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php include("../partes/hu1_modales_diariomural/modal_modificar_publicacion.php") ?>

                                    <!-- fin ciclo -->
                                    <?php endwhile;endif ?>

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
    <script type="text/javascript" src="../js/alerta_modificar_diariomural.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>