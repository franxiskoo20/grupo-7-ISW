<?php

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}

//DATOS DE CONEXION A BASE DE DATOS UBB
$db_host = "146.83.194.142";
$db_user = "E7software";
$db_pass = "E7software1128";
$db_name = "E7software_bd";

//DATOS DE CONEXION A BASE DE DATOS DEL SERVIDOR
// $db_host = "localhost";
// $db_user = "id19376874_e7software";
// $db_pass = "8KWE_I@RWtQ9tmkH";
// $db_name = "id19376874_e7software_bd";

// DATOS DE CONEXION A BASE DE DATOS CLOUD
// $servidor = '34.176.245.209:3306';
$usuario = 'diego';
$password = 'txb+q%Z$}7NV{r@r';
$basededatos = 'diego';


// CONEXIÓN CON PDO ($bd)

try {
    $bd = new PDO(
        'mysql:host=34.176.245.209:3306;
        dbname='.$basededatos,
        $usuario,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (Exception $e) {
    echo "Error de conexión ".$e->getMessage();
}



// //CONEXIÓN CON  MYSQLI_CONNECT ($con)
// $con  = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

//     if(!$con){

//     echo 'no se pudo conectar a la base de datos:' .mysqli_connect_errno()();

//     }else{

   
//     }

?>