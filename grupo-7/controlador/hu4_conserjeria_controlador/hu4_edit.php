<?php 

require_once("../../bds/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $form_clave =  $_POST["form_clave"];
   $formulario_tipo = $_POST["tipo_form_actualizar"];
   $formulario_fecha = $_POST["fecha_actualizar"];
   $formulario_titulo = $_POST["titulo_actualizar"];
   $formulario_contenido = $_POST["descripcion_actualizar"];

    if(isset($_POST['form_clave'])){
        if(!empty($formulario_tipo && $formulario_tipo!='0')){
        $Sql = "UPDATE `formulario` 
        SET `formulario_tipo` = :formulario_tipo,`formulario_titulo` = :formulario_titulo, `formulario_fecha` = :formulario_fecha, `formulario_contenido`= :formulario_contenido
        WHERE formulario_id = '$form_clave' ";
        
        $editSql = $bd->prepare($Sql);
        $editSql->bindParam(':formulario_tipo',$formulario_tipo,PDO::PARAM_STR, 45);
        $editSql->bindParam(':formulario_titulo',$formulario_titulo,PDO::PARAM_STR, 45);
        $editSql->bindParam(':formulario_fecha',$formulario_fecha,PDO::PARAM_STR);
        $editSql->bindParam(':formulario_contenido',$formulario_contenido,PDO::PARAM_STR, 500);

        $editSql->execute();
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