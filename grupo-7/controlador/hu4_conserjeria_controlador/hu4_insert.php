<?php
if(!isset($_SESSION)) 
{session_start(); 
}
if (isset($_SESSION['id'])) {
    $usuario_idd = $_SESSION['id'];
    }
require_once("../../bds/conexion.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* Información enviada por el formulario */
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $fecha = date('Y-m-d');
    $destacar = 0;
    $descripcion = $_POST['descripcion'];
    /* Fin información enviada por el formulario */
    if(!empty($tipo && $titulo )){
        $insertarSql = "INSERT INTO formulario(formulario_titulo,formulario_tipo,formulario_remitente_id, formulario_fecha, formulario_hora,formulario_destacar, formulario_contenido) 
        VALUES(:formulario_titulo,:formulario_tipo, :formulario_remitente_id, :formulario_fecha, CURTIME() ,:formulario_destacar, :formulario_contenido)";
        
        $insertarSql = $bd->prepare($insertarSql);
        $insertarSql->bindParam(':formulario_titulo',$titulo,PDO::PARAM_STR, 45);
        $insertarSql->bindParam(':formulario_tipo',$tipo,PDO::PARAM_STR, 45);
        $insertarSql->bindParam(':formulario_remitente_id',$usuario_idd,PDO::PARAM_STR);
        $insertarSql->bindParam(':formulario_fecha',$fecha,PDO::PARAM_STR);
        $insertarSql->bindParam(':formulario_destacar',$destacar,PDO::PARAM_STR);
        $insertarSql->bindParam(':formulario_contenido',$descripcion,PDO::PARAM_STR, 500);
        $insertarSql->execute();
    }else{
        echo "error se ingreso campo vacio";
    }
    header("Location: ../../vistas/conserjeria.php");
}  

?>
