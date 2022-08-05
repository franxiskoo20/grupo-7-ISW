<?php 

require_once("../../bds/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $form_clave =  $_POST["form_clave"];
   $tipo_anuncio = $_POST["tipo_form_actualizar"];
   $fecha = $_POST["fecha_actualizar"];
   $titulo = $_POST["titulo_actualizar"];
   $descripcion = $_POST["descripcion_actualizar"];

    if(isset($_POST['form_clave'])){
        if(!empty($tipo_anuncio && $tipo_anuncio!='0')){
        $modificarPublicacion_avisoSql = "UPDATE `formulario` 
        SET tipo_form_clave = '$tipo_anuncio', form_titulo = '$titulo',  form_fecha = '$fecha', form_descripcion = '$descripcion'
        WHERE form_clave = '$form_clave' ";
        
        $modificarPublicacion_aviso = mysqli_query($con,$modificarPublicacion_avisoSql);
        
     }else{
        echo "error se ingreso campo vacio";
    }
        
    }
}
?>
<script>
alert("Registro Modificado exitosamente!!");
window.location.href = '../../vistas/conserjeria.php';
</script>