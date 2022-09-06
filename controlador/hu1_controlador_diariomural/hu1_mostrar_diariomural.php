<?php
require_once('../bds/conexion.php');


    if(isset($_POST['filtrar_anuncios']) && $_POST['filtrar_anuncios'] == 'Mis anuncios' ){
      
        $filtrar_anuncios_opcion =  'Mis anuncios';
       
        $usuario_filtrar = $_POST['usuario_clave_filtrar'];
 // Mis anuncios 
                $consultaMostrarDiariomural  = "SELECT
                F.formulario_id,
                F.formulario_titulo,
                F.formulario_tipo,
                F.formulario_contenido,
                F.formulario_remitente_id,
                F.formulario_destacar,
                F.formulario_actualizar,
                F.formulario_hora,
                U.usuario_nombre,
                U.usuario_apellido,
                U.usuario_correo,
                V.usuario_departamento,
                DATE_FORMAT(F.formulario_fecha, '%d-%m-%Y') AS fecha_formateada
                FROM
                formulario F
                INNER JOIN usuario U ON U.usuario_id = F.formulario_remitente_id  
                INNER JOIN usuario_vive V ON U.usuario_id = V.usuario_id and  U.usuario_id = '$usuario_filtrar'
                WHERE F.formulario_tipo <> 'Reclamo' and F.formulario_tipo <> 'Bitácora' and F.formulario_tipo <> 'Encomienda' and F.formulario_tipo <> 'Otro'
                ORDER BY
                F.formulario_destacar 
                DESC";
        
	}else{

 // Todos 
        
       $filtrar_anuncios_opcion = 'Todos';
        $consultaMostrarDiariomural  = "SELECT
         F.formulario_id,
         F.formulario_titulo,
         F.formulario_tipo,
         F.formulario_contenido,
         F.formulario_remitente_id,
         F.formulario_destacar,
         F.formulario_actualizar,
         F.formulario_hora,
         U.usuario_nombre,
         U.usuario_apellido,
         U.usuario_correo,
         V.usuario_departamento,
        DATE_FORMAT(F.formulario_fecha, '%d-%m-%Y') AS fecha_formateada
        FROM
        formulario F
        INNER JOIN usuario U ON U.usuario_id = F.formulario_remitente_id
        INNER JOIN usuario_vive V ON U.usuario_id = V.usuario_id
        WHERE F.formulario_tipo <> 'Reclamo' and F.formulario_tipo <> 'Bitácora' and F.formulario_tipo <> 'Encomienda' and F.formulario_tipo <> 'Otro'
        ORDER BY
        F.formulario_destacar 
        DESC;";

                
   
	}


        $mostrarDiariomural = $bd->prepare($consultaMostrarDiariomural);
        $mostrarDiariomural->execute();
       


?>