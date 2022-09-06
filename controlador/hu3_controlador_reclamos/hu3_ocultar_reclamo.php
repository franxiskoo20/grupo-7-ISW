<?php 
  require_once("../../bds/conexion.php");



    $id_reclamo = $_GET['id'];
    

    $ocultar_sql = "UPDATE FROM formulario SET formulario_destacar = 0  WHERE formulario_id = ?";
    $ocultarsql = $bd->prepare($ocultar_sql);
    $ocultarsql->execute([$id_reclamo]);



header("Location: ../../vistas/hu3_reclamos_conserje.php");