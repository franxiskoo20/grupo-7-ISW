<?php 
require_once("../bds/conexion.php");


// $consultaFormularioSql = "SELECT date_format(form_fecha, '%d-%m-%Y') AS fecha_formateada ,formulario.form_clave,usuario.usuario_nombre,usuario.usuario_correo,
//                           formulario.form_titulo,tipo_formulario.tipo_form_clave,tipo_formulario.tipo_form_nombre,formulario.form_fecha,
//                           formulario.form_descripcion,departamento.dep_numero,formulario.form_hora
//                           FROM formulario
//                           INNER JOIN usuario 
//                           ON usuario.usuario_clave = formulario.form_receptor
//                           INNER JOIN tipo_formulario 
//                           ON tipo_formulario.tipo_form_clave = formulario.tipo_form_clave AND 'Reclamo' = tipo_formulario.tipo_form_nombre
//                           INNER JOIN usuario_vive 
//                           ON usuario.usuario_clave = usuario_vive.usuario_clave 
//                           INNER JOIN departamento 
//                           ON usuario_vive.dep_clave  = departamento.dep_clave
//                           ORDER BY formulario.form_importancia DESC,formulario.form_fecha DESC";
                          

// $consultaFormulario = mysqli_query($con,$consultaFormularioSql);

$consulta_reclamos_sql = $bd->prepare('select u.usuario_nombre, u.usuario_correo , v.usuario_departamento ,f.formulario_fecha , f.formulario_hora,
                                        f.formulario_titulo, f.formulario_contenido
                                        from formulario f
                                        INNER JOIN usuario u ON u.usuario_id = f.formulario_remitente_id
                                        INNER JOIN usuario_vive v ON u.usuario_id= v.usuario_id
                                        WHERE u.usuario_id = ?";');
$consulta_reclamos_sql->execute([$_SESSION['id']]);
$consulta_reclamos = $consulta_reclamos_sql->fetch(PDO::FETCH_OBJ);



?>