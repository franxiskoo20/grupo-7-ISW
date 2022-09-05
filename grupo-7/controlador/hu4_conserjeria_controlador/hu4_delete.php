<?php
if(!isset($_SESSION)) 
{session_start(); 
}
require_once("../../bds/conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
    $eliminar = $_GET["id"]; 
    $eliminarPublicacion_ConserjeriaSql = "DELETE FROM `formulario` WHERE formulario_id = $eliminar";
    $eliminarPublicacion_Conserjeria = mysqli_query($con,$eliminarPublicacion_ConserjeriaSql);
    $_SESSION['eliminado'] = "Eliminado";
    
}
header("Location: ../../vistas/conserjeria.php");
?>

