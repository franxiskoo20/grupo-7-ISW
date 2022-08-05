<?php  

include '../../bds/conexion.php';
	

$usuario = $_POST['usuario'];
$usuario_clave = $_POST['usuario_clave']; 
$tipo = $_POST['tipo_form'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$importancia = $_POST['importancia'];
$destacado = $_POST['destacar'];

//  $usuario, $usuario_clave ,$tipo ,$titulo ,$descripcion  , $fecha  ,$hora ,$importancia ,$destacado 

$sentencia = $bd->prepare("INSERT INTO formulario(usuario_clave, tipo_form_clave, form_titulo, form_descripcion, form_fecha, form_hora, form_importancia, form_receptor, form_destacar) VALUES (?,?,?,?,?,?,?,?,?);");

$resultado = $sentencia->execute([$usuario_clave ,$tipo ,$titulo ,$descripcion, $fecha,$hora,$importancia,$usuario,$destacado]);
?>

<?php header('Location: ../../vistas/hu3_reclamos.php'); ?>

