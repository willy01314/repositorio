<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-whid, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/estilosentrega.css">
    <title>AdminKey/Ent. llave</title>

  </head>
  <body>

    <?php
      include ("abrir_conexion.php");
      if(isset($_POST['Buscarcodigosala'])){
        $numerollave = $_POST['insertarcodigosala'];
        $resultados = mysqli_query($conex,"SELECT * FROM registro_solicitud WHERE codigo_llave = '$numerollave'");
        while($consulta = mysqli_fetch_array($resultados)){
        $codSal=$consulta['codigo_llave'];
        $bloqueS=$consulta['bloque'];
        $Nsala=$consulta['nombre_sala'];
        $caractS=$consulta['caracteristicas_sala'];
        $CedDoc=$consulta['cedula_docente'];
        $NombDoc=$consulta['nombre_docente'];
        $ApelliDoc=$consulta['apellido_docente'];
        $program=$consulta['programa'];
        include_once("formulario_lleEn.php");
      }
    }else {
      include_once("formulaEnVacio.php");
    }
    ?>

  </body>
</html>

<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//funcion boton entregar llave
include ("abrir_conexion.php");
if(isset($_POST['solicitaentrega'])) {
  $enombresal = $_POST['nombresala'];
  $ebloque = $_POST['bloque'];
  $ecodigollave = $_POST['insertarcodigosala'];
  $enombredocen = $_POST['nombresdocente'];
  $eapellidocen = $_POST['apellidosdocente'];
  $ecedulado = $_POST['ceduladocente'];
  $eprograma = $_POST['programa'];
  $fechaen = date("d-m-Y");
  date_default_timezone_set("America/Bogota");
  $horaen = date("h:i a");
  $novedades = $_POST['novedadessala'];

  $consulta = "INSERT INTO registro_entrega(nombre_sala, bloque, codigo_llave, nombre_docente, apellido_docente, cedula_docente, programa, fecha, hora, novedades)
              VALUES ('$enombresal','$ebloque','$ecodigollave','$enombredocen','$eapellidocen','$ecedulado','$eprograma','$fechaen','$horaen','$novedades')";
  $resultado = mysqli_query($conex,$consulta);
  if ($resultado) {
    header("location: index.html");
  /*?>
  <h3 class="ok">¡Solicitud Exitosa!</h3>
  <?php*/
}else {
  ?>
  <h3 class="bad">Error en la base de datos</h3>
  <?php
  }

}

?>
