<?php 

  require_once("../../bds/conexion.php");


  if ($_SERVER['REQUEST_METHOD'] === 'GET') { 

    $formulario_id = $_GET["id"]; 
    $formulario_id_insert = $_GET["id"]; 

    $insertar_fomrulario_historialSql = "INSERT INTO formulario_historial(formulario_remitente_id,form_histo_titulo,form_histo_fecha)
    SELECT formulario_remitente_id,formulario_titulo,formulario_fecha FROM formulario WHERE formulario_remitente_id = ':formulario_id_insert'; ";

  $insartar_fomrulario_historial = $bd->prepare($insertar_fomrulario_historialSql);
  $eliminarPublicacion_diariomural-> bindParam(':formulario_id_insert', $formulario_id_insert);
  $insartar_fomrulario_historial->execute();

  $eliminarPublicacion_diariomuralSql = "DELETE FROM `formulario` WHERE `formulario_id` = :formulario_id";
  $eliminarPublicacion_diariomural = $bd->prepare($eliminarPublicacion_diariomuralSql);
  $eliminarPublicacion_diariomural-> bindParam(':formulario_id', $formulario_id);
  $eliminarPublicacion_diariomural->execute();

   }

  header("Location: ../../vistas/hu1_diariomural.php");
   
?>