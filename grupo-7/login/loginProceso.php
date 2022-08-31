<?php session_start();
	include_once '../bds/conexion.php';
	$usuario = $_POST['email'];
	$contrasena = $_POST['password'];
	$sentencia = $bd->prepare('select * from usuario where usuario_correo = ? and usuario_clave = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);

	if ($datos === FALSE) {
		echo "errorra 213213";
		header('Location: login.php');

	}elseif($sentencia->rowCount() == 1){
		$usuario_id = $datos->usuario_id;
		$_SESSION['id'] = $usuario_id;
		$_SESSION['nombre'] = $datos->usuario_nombre;
		$_SESSION['clave'] = $datos->usuario_clave;
		$_SESSION['tipo'] = $datos->usuario_tipo;
		header('Location: ../index.php');
	}
?>