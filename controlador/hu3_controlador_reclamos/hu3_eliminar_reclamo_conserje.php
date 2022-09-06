<?php 

  require_once("../../bds/conexion.php");


  if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
  
  $formulario_id = $_GET['id']; 
  $eliminarPublicacion_diariomuralSql = "DELETE FROM `formulario` WHERE `formulario_id` = :formulario_id";
  $eliminarPublicacion_diariomural = $bd->prepare($eliminarPublicacion_diariomuralSql);
  $eliminarPublicacion_diariomural-> bindParam(':formulario_id', $formulario_id);
  $eliminarPublicacion_diariomural->execute();

  $_SESSION['eliminado']="Eliminado";

   }

  header("Location: ../../vistas/hu3_reclamos_conserje.php");
   
?>