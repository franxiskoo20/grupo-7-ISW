<?php
require_once("../../bds/conexion.php");
$eliminar = $_GET["id"]; 
$eliminarPublicacion_ConserjeriaSql = "DELETE FROM `formulario` WHERE form_clave = $eliminar";
$eliminarPublicacion_Conserjeria = mysqli_query($con,$eliminarPublicacion_ConserjeriaSql);
?>
<script>
    alert('Registro Eliminado Exitosamente!!');
    window.location.href='../../vistas/conserjeria.php'
</script>