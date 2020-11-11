<?php
/*consulta de solicitud de llave*/
/*busqueda de datos de llave*/
include ("abrir_conexion.php");

if(isset($_POST['Buscarcodigosala'])){
  $numerollave = $_POST['insertarcodigosala'];
  $resultados = mysqli_query($conex,"SELECT * FROM salas WHERE codigollave = '$numerollave'");
  while($consulta = mysqli_fetch_array($resultados)){
  //$caracter = $consulta['caracteristicas'];
  /*echo $idsala." ";
  echo $nombresala." ";
  echo $estado." ";
  echo $caracter." ";*/
  }
}

?>


<?php
/*busqueda de datos Docente*/
include ("abrir_conexion.php");

if(isset($_POST['Buscarcodigodocente'])){
  $buscar = $_POST['insertarcodigodocente'];
  $resultados = mysqli_query($conex,"SELECT * FROM docentes WHERE cedula = '$buscar'");
  while($consulta = mysqli_fetch_array($resultados)){
  $nombredocen = $consulta['nombre'];
  $apellido = $consulta['apellido'];
  $programa = $consulta['programa'];
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-whid, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/estilossolicitud.css">
    <title>AdminKey/Sol. llave</title>
  </head>
  <body>
              <?php
                if(isset($_POST['Buscarcodigosala'])){
                  $numerollave = $_POST['insertarcodigosala'];
                  $resultados = mysqli_query($conex,"SELECT * FROM salas WHERE codigollave = '$numerollave'");
                  while($consulta = mysqli_fetch_array($resultados)){
                    $CedDoc="";
                    $NombDoc="";
                    $ApelliDoc="";
                    $program="";
                  $codSal=$consulta['codigollave'];
                  $bloqueS=$consulta['bloque'];
                  $Nsala=$consulta['nombre'];
                  $EstadoS=$consulta['estado'];
                  $caractS=$consulta['caracteristicas'];

                  include_once("formulario_llen.php");
                  }}elseif(isset($_POST['Buscarcodigodocente'])){
                    $buscar = $_POST['insertarcodigodocente'];
                    $resultados = mysqli_query($conex,"SELECT * FROM docentes WHERE cedula = '$buscar'");
                    while($consulta = mysqli_fetch_array($resultados)){
                    $CedDoc=$consulta['cedula'];
                    $NombDoc=$consulta['nombre'];
                    $ApelliDoc=$consulta['apellido'];
                    $program=$consulta['programa'];

                    $codSal=$_POST['insertarcodigosala'];
                    $bloqueS=$_POST['bloque'];
                    $Nsala=$_POST['nombresala'];
                    $EstadoS=$_POST['estadosala'];
                    $caractS=$_POST['atributossalas'];
                    include_once("formulario_llen.php");
                  }
              }else {
                include_once("formu_vacio.php");
              }


               ?>

  </body>
</html>



<?php
//funcion para solicitud de sala
include ("abrir_conexion.php");
/*funcion boton solicitar sala*/
if(isset($_POST['solicitarsala'])){
    $nombresal = $_POST['nombresala'];
    $bloque = $_POST['bloque'];
    $codillave  = $_POST['insertarcodigosala'];
    $caracter = $_POST['atributossalas'];
    $nombredocen = $_POST['nombresdocente'];
    $apellidocen = $_POST['apellidosdocente'];
    $codigodoce = $_POST['insertarcodigodocente'];
    $programa = $_POST['programa'];
    $fecha = date("d-m-Y");
    date_default_timezone_set("America/Bogota");
    $hora = date("h:i a");
    $consulta = "INSERT INTO registro_solicitud(nombre_sala, bloque, codigo_llave, caracteristicas_sala, nombre_docente, apellido_docente, cedula_docente, programa, fecha, hora)
                VALUES ('$nombresal','$bloque','$codillave','$caracter','$nombredocen','$apellidocen','$codigodoce ','$programa','$fecha','$hora')";
    $resultado = mysqli_query($conex,$consulta);
    if ($resultado) {
      echo $hora;
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
