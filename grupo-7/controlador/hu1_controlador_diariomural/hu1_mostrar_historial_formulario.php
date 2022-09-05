<?php

require_once('../bds/conexion.php');

$id_session = $_SESSION['id'] ;


$mostrarHistorialFormularioSql = "SELECT form_histo_id,form_histo_titulo,date_format(form_histo_fecha, '%d-%m-%Y') AS fecha_histo_formateada
                                  FROM formulario_historial WHERE formulario_remitente_id = '$id_session'";


$mostrarHistorialFormulario = $bd->prepare($mostrarHistorialFormularioSql);
$mostrarHistorialFormulario->execute();
                                                   
?>