<?php

require_once("../../bds/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* Información enviada por el formulario */

    date_default_timezone_set('Chile/Continental');  
    $titulo = $_POST["titulo"];
    $tipo_anuncio = $_POST["tipo_anuncio"];
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $descripcion = $_POST["descripcion"];
    $usuario_clave = $_POST["usuario_clave"];


    if (isset($_POST['destacar_anuncio'])){
        $destacar_anuncio = '1';
        
    }else{
        $destacar_anuncio = '0';
    }

    /* Fin información enviada por el formulario */
    if(!empty($tipo_anuncio && $fecha && $hora  && $titulo && $descripcion) ){

        $publicar_diariomuralSql = "INSERT INTO formulario(formulario_titulo,formulario_tipo,formulario_remitente_id, formulario_fecha, formulario_hora, 
                                                formulario_contenido, formulario_destacar) 
        VALUES(:formulario_titulo,:formulario_tipo,:formulario_remitente_id,:formulario_fecha,:formulario_hora,:formulario_contenido,:formulario_destacar)";
        
        $publicar_diariomural = $bd->prepare($publicar_diariomuralSql);
        $publicar_diariomural->bindParam(':formulario_titulo', $titulo);
        $publicar_diariomural->bindParam(':formulario_tipo', $tipo_anuncio);
        $publicar_diariomural->bindParam(':formulario_remitente_id', $usuario_clave);
        $publicar_diariomural->bindParam(':formulario_fecha', $fecha);
        $publicar_diariomural->bindParam(':formulario_hora', $hora);
        $publicar_diariomural->bindParam(':formulario_contenido', $descripcion);
        $publicar_diariomural->bindParam(':formulario_destacar', $destacar_anuncio);
        $publicar_diariomural->execute();
        $_SESSION['ingresado'] = "Ingresado";
    }else{
        echo "error se ingreso campo vacio";
    }
    header("Location: ../../vistas/hu1_diariomural.php");
}  

?>