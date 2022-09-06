<?php 
require_once("../bds/conexion.php");

$consulta_reclamos_sql = $bd->prepare("SELECT * FROM reclamos where formulario_remitente =? and formulario_tipo = 'Reclamo';");
$consulta_reclamos_sql->execute([$_SESSION['id']]);

$resultado = $consulta_reclamos_sql->fetchAll();


$consulta_reclamos_conserje_sql = $bd->prepare("SELECT * FROM reclamos_conserje;");
$consulta_reclamos_conserje_sql->execute();
$resultado_conserje = $consulta_reclamos_conserje_sql->fetchAll();



$consulta_usuarios_sql = $bd->prepare("SELECT * FROM vista_usuario where id <> ?");
$consulta_usuarios_sql->execute([$_SESSION['id']]);




?>