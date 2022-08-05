<?php 
	session_start();
	include_once '../bds/conexion.php';
	$usuario = $_POST['email'];
	$contrasena = $_POST['password'];
	$sentencia = $bd->prepare('select * from usuario where usuario_correo = ? and pass = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);

	$sentencia_2 = $bd->prepare('select t.tipo_usuario_nombre
								FROM tipo_usuario t, usuario u
								where u.usuario_correo = ? and u.pass = ?
								and u.tipo_usuario_clave=t.tipo_usuario_clave;');
	$sentencia_2->execute([$usuario, $contrasena]);
	$datos_2 = $sentencia_2->fetch(PDO::FETCH_OBJ);
	
	//print_r($datos);

	if ($datos === FALSE) {
		header('Location: login.php');
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->usuario_nombre;
		$_SESSION['tipo'] = $datos_2->tipo_usuario_nombre;
		$_SESSION['clave'] = $datos->usuario_clave;
		header('Location: ../index.php');
	}
?>