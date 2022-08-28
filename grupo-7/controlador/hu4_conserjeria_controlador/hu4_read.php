<?php
require_once('../../bds/conexion.php');

$query = "SELECT F.formulario_id,F.formulario_titulo,F.formulario_tipo,date_format(F.formulario_fecha, '%d-%m-%Y') AS fecha_formateada , F.formulario_hora, F.formulario_contenido 
            FROM formulario F WHERE  1  ;";
$stmt = $bd->prepare($query);
$stmt->execute();
                            
                                

?>