<?php 
  require_once("../../bds/conexion.php");


  if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
  $eliminar = $_GET["id"]; 
  $eliminarPublicacion_diariomuralSql = "DELETE FROM `formulario` WHERE form_clave = $eliminar";
  
  $eliminarPublicacion_diariomural = mysqli_query($con,$eliminarPublicacion_diariomuralSql);
   
   }

/*
  header("Location: http://localhost/grupo-7edifref/vistas/hu1_diariomural.php");

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $eliminar = $_POST["id"];

    $eliminarPublicacion_diariomuralSql = "DELETE FROM `formulario` WHERE form_clave = $eliminar";
  
    $eliminarPublicacion_diariomural = mysqli_query($con,$eliminarPublicacion_diariomuralSql);
 

     }*/
     header("Location: ../../vistas/hu1_diariomural.php");
   
?>