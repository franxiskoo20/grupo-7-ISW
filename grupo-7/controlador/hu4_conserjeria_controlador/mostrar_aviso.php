<?php
require_once('../bds/conexion.php');

$consultaSql= "SELECT F.form_clave,U.usuario_correo, U.usuario_nombre,F.usuario_clave,date_format(F.form_fecha, '%d-%m-%Y') AS fecha_formateada,F.form_hora, F.form_titulo, T.tipo_form_nombre, F.form_descripcion  FROM formulario F,usuario U, tipo_formulario T WHERE U.tipo_usuario_clave=1 AND F.tipo_form_clave=T.tipo_form_clave;";
$consulta = mysqli_query($con,$consultaSql);

?>