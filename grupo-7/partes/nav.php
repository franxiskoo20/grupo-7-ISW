<?php

if (isset($_SESSION['nombre'])) {
$usernameSesion = $_SESSION['nombre'];}?>

<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 position-relative">
                <li class="nav-item dropdown ">
                    <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://previews.123rf.com/images/jemastock/jemastock1609/jemastock160905175/63043795-persona-ejecutiva-en-traje-con-la-ilustraci%C3%B3n-de-vector-de-imagen-de-iconos-de-negocios-relacionados-co.jpg"
                            class="img-fluid rounded-circle avatar mr-2" alt="imagen" />
                        <?php echo $usernameSesion?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../perfil/"><i class="fas fa-user"></i> Mi perfil</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login/cerrar.php"><i class="fas fa-sign-out-alt"></i> Cerrar
                            sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Fin Navbar -->