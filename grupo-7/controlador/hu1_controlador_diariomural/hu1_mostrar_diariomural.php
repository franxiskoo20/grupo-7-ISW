<?php 
/*
require_once("../bds/conexion.php");


$consultaFormularioSql = "SELECT date_format(form_fecha, '%d-%m-%Y') AS fecha_formateada ,formulario.form_clave,usuario.usuario_nombre,usuario.usuario_correo,
                          formulario.form_titulo,tipo_formulario.tipo_form_clave,tipo_formulario.tipo_form_nombre,formulario.form_fecha,
                          formulario.form_descripcion,departamento.dep_numero
                          FROM formulario 
                          INNER JOIN usuario 
                          ON usuario.usuario_clave = formulario.usuario_clave
                          INNER JOIN tipo_formulario 
                          ON tipo_formulario.tipo_form_clave = formulario.tipo_form_clave AND 'Reclamo' <> tipo_formulario.tipo_form_nombre
                          INNER JOIN usuario_vive 
                          ON usuario.usuario_clave = usuario_vive.usuario_clave 
                          INNER JOIN departamento 
                          ON usuario_vive.dep_clave  = departamento.dep_clave
                          ORDER BY formulario.form_importancia DESC,formulario.form_fecha DESC";
                          

$consultaFormulario = mysqli_query($con,$consultaFormularioSql);
*/
?>

<?php
require_once('../bds/conexion.php');

$consultaMostrarDiariomural  = "SELECT
                                        F.formulario_id,
                                        F.formulario_titulo,
                                        F.formulario_tipo,
                                        F.formulario_contenido,
                                        U.usuario_nombre,
                                        U.usuario_apellido,
                                        U.usuario_correo,
                                        V.usuario_departamento,
                                        DATE_FORMAT(F.formulario_fecha, '%d-%m-%Y') AS fecha_formateada
                                        FROM
                                        formulario F
                                        INNER JOIN usuario U ON U.usuario_id = F.formulario_remitente_id
                                        INNER JOIN usuario_vive V ON U.usuario_id = V.usuario_id
                                        WHERE F.formulario_tipo <> 'Reclamo'
                                        ORDER BY
                                        F.formulario_fecha
                                        DESC";
                                                 
$mostrarDiariomural = $bd->prepare($consultaMostrarDiariomural);
$mostrarDiariomural->execute();

?>