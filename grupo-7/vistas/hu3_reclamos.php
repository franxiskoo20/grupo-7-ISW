<?php

if (isset($_SESSION['nombre'])) {
    $usernameSesion = $_SESSION['nombre'];
} ?>
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
                                <?php echo $usernameSesion ?></h1><br>
                            <h5>Revisa la última información de la tabla de reclamos.</h5>
                            <hr>
                        </div>
                        <div class="row">
                            <h6 class="text-center">Si deseas enviar un reclamo formal, presiona el botón. Los reclamos
                                son
                                totalmente anónimos</h6>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-toggle="modal" id="btn" data-target="#reclamo"><b>Ingresar Reclamo</b>
                        </div>

                    </div>
                </section>

                <section class="py-0 my-0">
                    <div class="container">
                        <div class="row">

                            <table class="table table-hover" id="table_reclamos">
                                <thead class="bg-primary" style="color:white">
                                    <tr>
                                        <th scope="col-4">Nombre</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Descripción</th>

                                    </tr>
                                </thead>

                                <tbody id="body">
                                    <?php if ($consulta_reclamos) : foreach ($$consulta_reclamos as $row) : ?>
                                            <tr>
                                                <td aling="center">
                                                    <?php echo "<b>" . $row['usuario_nombre'] . "</b>" ?>
                                                    <br>
                                                    <?php echo "<small>" . "N° departamento: " . $row['usuario_departamento'] . "</small>" ?>
                                                    <br>
                                                    <?php echo "<small>" . $row['usuario_correo'] . "</small>" ?>
                                                </td>

                                                <td><?php echo $row['formulario_fecha'] ?></td>
                                                <td><?php echo $row['formulario_hora'] ?></td>
                                                <td>
                                                    <?php echo "<b>" . strtoupper($row['formulario_titulo']) . "</b><br>" ?>
                                                    <?php echo $row['formulario_descripcion'] ?></td>
                                                <td>
                                            </tr>
                                    <?php endforeach;
                                    endif ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

            </div>
        </div>
        <!-- Modal publicar -->

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="reclamo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-weight-bold mb-0">Formulario de Reclamos</h2>
                        <button type="button" class="btn btn-primary" id="cerrarFormulario" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../partes/hu3_reclamos_vecinos/insertar.php">
                            <div class="row">
                                <?php $fecha = date("Y-m-d"); ?>
                                <?php $mDate = new DateTime(); ?>
                                <?php $hoy = $mDate->format("H:i"); ?>

                                <div class="form-group col-lg-5 col-md-5">
                                    <label>Titulo</label>
                                    <input placeholder="Ingresa un Titulo" type="text" class="form-control" name="titulo">
                                </div>

                                <div class="form-group col-lg-5 col-md-5">
                                    <label>Dirigido a:</label>
                                    <select name="usuario" class="form form-control">
                                        <?php $getUsuarios = $con->query("SELECT * FROM usuario");
                                        while ($row = mysqli_fetch_array($getUsuarios)) {
                                            $usuario_nombre = $row['usuario_nombre'];
                                            $usuario_clave = $row['usuario_clave'];
                                        ?>
                                            <option value="<?php echo $usuario_clave; ?>">
                                                <?php echo $usuario_nombre ?>
                                            </option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea placeholder="Ingresa una descripción" rows="10" wrap="hard" class="form-control" name="descripcion" required></textarea>
                            </div>
                            </tr>
                            <tr>

                                <td><input type="hidden" name="fecha" value="<?php echo $fecha; ?>"></td>
                            </tr>
                            <tr>

                                <td><input type="hidden" name="hora" value="<?php echo $hoy; ?>"></td>
                            </tr>
                            <tr>
                                <!--						<td>Usuario clave: </td>   -->
                                <td><input type="hidden" name="usuario_clave" value="<?php echo $_SESSION['clave']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <!--						<td>Tipo form: </td>        -->
                                <td><input type="hidden" name="tipo_form" value=5> </td>
                            </tr>

                            <tr>
                                <!--							<td>Importancia: </td>    -->
                                <td><input type="hidden" name="importancia" value=1> </td>
                            </tr>
                            <tr>
                                <!--						<td>Destacar: </td>     -->
                                <td><input type="hidden" name="destacar" value=1> </td>
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
        </script>

        <!-- Font awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Data table -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

        <!-- Data table cambio de idioma -->
        <script type="text/javascript" src="../js/data_table_reclamos.js"></script>

        <!-- Sweet alert-->
        <script type="text/javascript" src="../js/alerta_agregar.js"></script>
        <script type="text/javascript" src="../js/alerta_eliminar.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

</body>

</html>