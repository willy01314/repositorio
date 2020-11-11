<?php
session_start();
require 'abrir_conexion.php';
$user = $_POST['username'];
$clave = $_POST['password'];
$clave1 = md5($clave);

$query = "SELECT COUNT(*) as contar FROM $tabla2_db1 where usuario = '$user' and clave = '$clave1' ";
$bdconect = mysqli_query($conex,$query);
$parametros = mysqli_fetch_array($bdconect);
if($parametros['contar']>0){
   $_SESSION['username'] = $user;
  header("location: admiconf.php");
}else {
    echo "<h1>Datos incorrectos</h1> <br> ";
    echo "<a href='index.html'>Volver</a>";
}


?>
