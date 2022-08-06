<?php

require_once("../../bds/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    date_default_timezone_set('Chile/Continental');  

$tipo_anuncio = $_POST["tipo_anuncio"];
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$usuario_clave = $_POST["usuario_clave"];

if(!empty($tipo_anuncio && $fecha && $hora  && $titulo && $descripcion) ){
    
    if (isset($_POST['destacar'])){
 
        $destacar = 'Si';
        
    }else{

        $destacar = 'No';
    }

    $publicar_diariomuralSql = "INSERT INTO `formulario`(`usuario_clave`, `tipo_form_clave`, `form_titulo`, `form_descripcion`, `form_fecha`, `form_hora`, `form_importancia`)
    VALUES ($usuario_clave,'$tipo_anuncio','$titulo','$descripcion','$fecha','$hora','$destacar');";
    
    $publicar_diariomural = mysqli_query($con,$publicar_diariomuralSql);


}else{

    echo "error se ingreso campo vacio";

}

}

header("Location: ../../vistas/hu1_diariomural.php");

?>