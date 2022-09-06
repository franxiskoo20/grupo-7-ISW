<?php
require_once('../bds/conexion.php');

$query = "SELECT U.usuario_nombre, U.usuario_apellido, U.usuario_correo, F.formulario_id,F.formulario_titulo,F.formulario_tipo,date_format(F.formulario_fecha, '%d-%m-%Y') AS fecha_formateada , F.formulario_hora, F.formulario_contenido 
            FROM formulario F, usuario U 
            WHERE usuario_tipo= 'conserje' and formulario_remitente_id = usuario_id  and formulario_tipo <> 'Reclamo' and formulario_tipo <> 'Publicidad' and formulario_tipo <> 'Información' and formulario_tipo <> 'Recomendaciones';";
$stmt = $bd->prepare($query);
$stmt->execute();
?>