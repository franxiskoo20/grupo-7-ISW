<!-- Sidebar -->
<div id="sidebar-container" class="bg-primary">
    <div class="logo">
        <h4 class="text-light font-weight-bold mb-0">INGENIERÍA DE SOFTWARE</h4>
    </div>
    <div class="menu">
        <a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-tachometer-alt"></i>
            Inicio</a>

        <a href="../vistas/hu1_diariomural.php" class="d-block text-light p-3 border-0"><i class="fas fa-clipboard"></i>
            Dirario mural</a>

        <a href="../vistas/conserjeria.php" class="d-block text-light p-3 border-0"><i
                class="fas fa-concierge-bell"></i>
            Conserjería</a>

        <?php if(isset($_SESSION['nombre']) && $_SESSION['tipo']=="Vecino" ){
                
                echo '<a href="../vistas/hu3_reclamos.php" class="d-block text-light p-3 border-0"><i class="fas fa-exclamation-triangle"></i>
                Reclamos</a>';
            
            }?>

        <!-- Solo muestra reclamos si ingreso como administrador -->

        <?php if(isset($_SESSION['nombre']) && ($_SESSION['tipo']=="Conserje" || $_SESSION['tipo']=="Administrador")){
                
                echo '<a href="../vistas/hu3_reclamos_conserje.php" class="d-block text-light p-3 border-0"><i class="fas fa-exclamation-triangle"></i>
                Reclamos Conserje</a>';
            
            }?>
    </div>
</div>