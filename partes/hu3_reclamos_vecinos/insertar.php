<?php  

include '../../bds/conexion.php';
	

$formulario_titulo = $_POST['formulario_titulo']; 
$formulario_tipo = $_POST['formulario_tipo'];
$formulario_remitente_id = $_POST['formulario_remitente_id'];
$formulario_destinatario_id = $_POST['formulario_destinatario_id'];
$formulario_fecha = $_POST['formulario_fecha'];
$formulario_hora = $_POST['formulario_hora'];
$formulario_destacar = $_POST['formulario_destacar'];
$formulario_contenido = $_POST['formulario_contenido'];




//  $usuario, $usuario_clave ,$tipo ,$titulo ,$descripcion  , $fecha  ,$hora ,$importancia ,$destacado 

$sentencia = $bd->prepare("INSERT INTO formulario(formulario_titulo, formulario_tipo, formulario_remitente_id, formulario_destinatario_id, formulario_fecha, formulario_hora,formulario_contenido, formulario_destacar) VALUES (?,?,?,?,?,?,?,?);");

$resultado = $sentencia->execute([$formulario_titulo, $formulario_tipo, $formulario_remitente_id, $formulario_destinatario_id, $formulario_fecha, $formulario_hora,$formulario_contenido, $formulario_destacar]);

$_SESSION['ingresado']= "Ingresado";

header('Location: ../../vistas/hu3_reclamos.php');
?>
