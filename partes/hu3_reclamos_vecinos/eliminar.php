<?php  

include '../../bds/conexion.php';
	

$formulario_titulo = $_POST['formulario_titulo']; 

//  $usuario, $usuario_clave ,$tipo ,$titulo ,$descripcion  , $fecha  ,$hora ,$importancia ,$destacado 


$sentencia = $bd->prepare("DELETE FROM `E7software_bd`.`formulario` WHERE (`formulario_id` = '20')");

$_SESSION['eliminado']= "Eliminado";

header('Location: ../../vistas/hu3_reclamos.php');
?>
