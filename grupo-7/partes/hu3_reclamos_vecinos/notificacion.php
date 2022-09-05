<?php
function borrarErrores(){
	$borrado = false;
	

	if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		$borrado = true;
	}
	
	return $borrado;
}
?>