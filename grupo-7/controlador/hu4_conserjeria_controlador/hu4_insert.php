<?php
require_once("../../bds/conexion.php");
date_default_timezone_set('Chile/Continental');  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* Información enviada por el formulario */
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $descripcion = $_POST['descripcion'];
    /* Fin información enviada por el formulario */
    if(!empty($tipo && $titulo )){
        $insertarSql = "INSERT INTO formulario(formulario_titulo,formulario_tipo, formulario_fecha, formulario_hora, formulario_contenido) 
        VALUES(:formulario_titulo,:formulario_tipo, :formulario_fecha, :formulario_hora, :formulario_contenido)";
        
        $insertarSql = $bd->prepare($insertarSql);
        $insertarSql->bindParam(':formulario_titulo',$titulo,PDO::PARAM_STR, 45);
        $insertarSql->bindParam(':formulario_tipo',$tipo,PDO::PARAM_STR, 45);
        $insertarSql->bindParam(':formulario_fecha',$fecha,PDO::PARAM_STR);
        $insertarSql->bindParam(':formulario_hora',$hora,PDO::PARAM_STR);
        $insertarSql->bindParam(':formulario_contenido',$descripcion,PDO::PARAM_STR, 500);
        $insertarSql->execute();
    }else{
        echo "error se ingreso campo vacio";
    }
}  

?>
<script>
    alert('Registro Ingresado Exitosamente!!');
    window.location.href='../../vistas/conserjeria.php'
</script>