<?php
require_once("../../bds/conexion.php");
date_default_timezone_set('Chile/Continental');  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $descripcion = $_POST['descripcion'];
    if(!empty($tipo && $titulo )){
        $insertarSql = "INSERT INTO formulario(usuario_clave,tipo_form_clave, form_titulo, form_descripcion, form_fecha, form_hora) 
        VALUES('3','$tipo','$titulo','$descripcion','$fecha','$hora');";
        $insertar = mysqli_query($con,$insertarSql);

        
    }else{
        echo "error se ingreso campo vacio";
    }
}  

?>
<script>
    alert('Registro Ingresado Exitosamente!!');
    window.location.href='../../vistas/conserjeria.php'
</script>