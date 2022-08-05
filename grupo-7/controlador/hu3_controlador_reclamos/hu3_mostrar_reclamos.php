<?php 
require_once("../bds/conexion.php");


$consultaFormularioSql = "SELECT date_format(form_fecha, '%d-%m-%Y') AS fecha_formateada ,formulario.form_clave,usuario.usuario_nombre,usuario.usuario_correo,
                          formulario.form_titulo,tipo_formulario.tipo_form_clave,tipo_formulario.tipo_form_nombre,formulario.form_fecha,
                          formulario.form_descripcion,departamento.dep_numero,formulario.form_hora
                          FROM formulario
                          INNER JOIN usuario 
                          ON usuario.usuario_clave = formulario.form_receptor
                          INNER JOIN tipo_formulario 
                          ON tipo_formulario.tipo_form_clave = formulario.tipo_form_clave AND 'Reclamo' = tipo_formulario.tipo_form_nombre
                          INNER JOIN usuario_vive 
                          ON usuario.usuario_clave = usuario_vive.usuario_clave 
                          INNER JOIN departamento 
                          ON usuario_vive.dep_clave  = departamento.dep_clave
                          ORDER BY formulario.form_importancia DESC,formulario.form_fecha DESC";
                          

$consultaFormulario = mysqli_query($con,$consultaFormularioSql);

?>