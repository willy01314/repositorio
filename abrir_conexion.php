<?php
	// Parametros a configurar para la conexion de la base de datos
	$host = "localhost";    // sera el valor de nuestra BD
	$basededatos = "adminkey";    // sera el valor de nuestra BD
	$usuariodb = "root";    // sera el valor de nuestra BD
	$clavedb = "";    // sera el valor de nuestra BD
	//Lista de Tablas
	$tabla_db1 = "salas"; 	   // tabla de salas
	$tabla2_db1 = "usuarios";
	//error_reporting(0); //No me muestra errores
	$conex = new mysqli($host,$usuariodb,$clavedb,$basededatos);
	if ($conex->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}
?>

<?php
$servidor="mysql:dbname=adminkey;host=127.0.0.1";
$usuario="root";
$password="";
try {
	$pdo = new PDO($servidor,$usuario,$password);

} catch (PDOException $e) {
	echo "Conexion mala :(".$e->getMessage();
}
?>
