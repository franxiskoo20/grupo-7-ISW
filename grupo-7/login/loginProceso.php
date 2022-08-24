<?php session_start();
	include_once '../bds/conexion.php';


	if(isset($_POST['email']) && isset($_POST['password'])){


		$sentencia = $bd->prepare('select * from usuario u where usuario_correo = ? and usuario_clave = ?;');
		$sentencia->execute([$_POST['email'], $_POST['password']]);
		$datos = $sentencia->fetch(PDO::FETCH_OBJ);
		
		
		if ($datos === FALSE) {
			echo "no encontro nada";
			unset($usuario_id,$usuario_nombre,$usuario_apellido);
			header('Location: ../inicio');
		}elseif($sentencia->rowCount() == 1){
			$usuario_id= $datos->usuario_id;
			$usuario_nombre= $datos->usuario_nombre;
			$usuario_apellido= $datos->usuario_apellido;
			$usuario_tipo= $datos->usuario_tipo;
		
			echo "ID: ".$usuario_id;
			echo "\n";
			echo "NOMBRE: ".$usuario_nombre;
			echo "\n";
			echo "APELLIDO: ".$usuario_apellido;
			echo "\n";
		
			$_SESSION['nombre'] = $usuario_nombre;
			$_SESSION['apellido'] = $usuario_apellido;
			$_SESSION['id'] = $usuario_id;
			$_SESSION['login']="Logeado";
			$_SESSION['tipo']=$usuario_tipo;
		
			echo $_SESSION['nombre'];
			echo $_SESSION['apellido'];
			echo $_SESSION['id'];
			echo $_SESSION['tipo'];
			
			echo var_dump($_SESSION);

			header('Location: ../inicio');
		}
		}

?>