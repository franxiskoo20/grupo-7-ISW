<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->

<html>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5"><b>Iniciar sesión</b></h3>
                            <form method="POST" action="loginProceso.php" class="needs-validation" novalidate>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="validacion-correo">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" id="validacion-correo"
                                        autocomplete="off" minlength="10" maxlength="50"
                                        placeholder="Por favor, ingrese su correo electrónico" required />
                                    <div class="invalid-feedback">
                                        ingrese un correo electrónico valido
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="validacion-clave">Clave</label>
                                        <input type="password" name="password" class="form-control"
                                            id="validacion-clave" autocomplete="off" minlength="4" maxlength="50"
                                            placeholder="Por favor, ingrese su contraseña" required />
                                        <div class="invalid-feedback">
                                            ingrese una contraseña valida
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block" style="background: #508bfc;"
                                        type="submit">Entrar</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
    (function() {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>

</body>

</html>