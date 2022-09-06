<?php 

require_once("../../bds/conexion.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  

    date_default_timezone_set('Chile/Continental'); 
     
    $titulo_actualizar = $_POST["titulo_actualizar"];
    $tipo_anuncio_actualizar = $_POST["tipo_anuncio_actualizar"];
    $fecha_actualizar = date('Y-m-d');
    $hora_actualizar = date('H:i:s');
    $descripcion_actualizar = $_POST["descripcion_actualizar"];
    $formulario_id_actualizar = $_POST["formulario_id_actualizar"];
    $formulario_actualizar = '1';

    if (isset($_POST['destacar_anuncio_actualizar'])){
       
        $destacar_anuncio_actualizar = '1';
        
    }else{
        $destacar_anuncio_actualizar = '0';

    }

    if(isset($_POST['formulario_id_actualizar'])){
    if(!empty($titulo_actualizar && $tipo_anuncio_actualizar && $fecha_actualizar  && $hora_actualizar && $descripcion_actualizar && $formulario_id_actualizar) ){
    
        

        $modificar_diariomuralSql = "UPDATE `formulario` 
                        SET `formulario_titulo` = :formulario_titulo,`formulario_tipo` = :formulario_tipo, `formulario_fecha` = :formulario_fecha, `formulario_hora` = :formulario_hora,
                            `formulario_contenido`= :formulario_contenido,`formulario_destacar` = :formulario_destacar,`formulario_actualizar` = :formulario_actualizar
                        WHERE  formulario_id = '$formulario_id_actualizar'";
                        
        $publicar_diariomural = $bd->prepare($modificar_diariomuralSql);
        $publicar_diariomural->bindParam(':formulario_titulo', $titulo_actualizar);
        $publicar_diariomural->bindParam(':formulario_tipo', $tipo_anuncio_actualizar);
        $publicar_diariomural->bindParam(':formulario_fecha', $fecha_actualizar);
        $publicar_diariomural->bindParam(':formulario_hora', $hora_actualizar);
        $publicar_diariomural->bindParam(':formulario_contenido', $descripcion_actualizar);
        $publicar_diariomural->bindParam(':formulario_destacar', $destacar_anuncio_actualizar);
        $publicar_diariomural->bindParam(':formulario_actualizar', $formulario_actualizar);
        
        $publicar_diariomural->execute();

        $_SESSION['modificado'] = 'Modificado';
     }else{
        echo "error se ingreso campo vacio";
    }
}
    
  header("Location: ../../vistas/hu1_diariomural.php");

}
?>