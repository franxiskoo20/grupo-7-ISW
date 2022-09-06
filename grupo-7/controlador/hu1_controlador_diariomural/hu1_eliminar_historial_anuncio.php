<?php 

  require_once("../../bds/conexion.php");


  if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

    $id_borrar_historial = $_POST["id_borrar_historial"]; 
   

  $eliminarHistorial_diariomuralSql = "DELETE FROM `formulario_historial` WHERE `formulario_remitente_id` = :id_borrar_historial";

  $eliminarHistorial_diariomural = $bd->prepare($eliminarHistorial_diariomuralSql);
  $eliminarHistorial_diariomural -> bindParam(':id_borrar_historial', $id_borrar_historial);
  $eliminarHistorial_diariomural -> execute();

   }
   
   header("Location: ../../vistas/hu1_diariomural.php");
?>