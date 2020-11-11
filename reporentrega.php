<?php
  include("abrir_conexion.php");
 //include("abrir_conexion.php");
 $sentencia = $pdo->prepare("SELECT * FROM `registro_entrega` WHERE 1 ");
 $sentencia->execute();
 $listasalas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-whid, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/nusalas.css">
        <title>Administrar Salas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>
      <br>
      <a href="admiconf.php"><button type="button" class="btn btn-success">Volver</button></a>
      <h1><center>REPORTE ENTREGA</center></h1>
        <div class="conten">
        <div class="row">
          <div class="table-responsive">
          <table class="table table-hover table-bordered table-condensed table-dark ">
            <thead class="thead-dark">
              <tr>
                <th>Nom. Sala</th>
                <th>Bloque</th>
                <th>Codigo Llave</th>
                <th>Nom. Docente</th>
                <th>Apell. Docente</th>
                <th>Cudela</th>
                <th>Programa</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Novedades</th>
              </tr>
            </thead>
            <?php foreach($listasalas as $salas){ ?>
              <tr>
                <td><?php echo $salas['nombre_sala']; ?></td>
                <td><?php echo $salas['bloque']; ?></td>
                <td><?php echo $salas['codigo_llave']; ?></td>
                <td><?php echo $salas['nombre_docente']; ?></td>
                <td><?php echo $salas['apellido_docente']; ?></td>
                <td><?php echo $salas['cedula_docente']; ?></td>
                <td><?php echo $salas['programa']; ?></td>
                <td><?php echo $salas['fecha']; ?></td>
                <td><?php echo $salas['hora']; ?></td>
                <td><?php echo $salas['novedades']; ?></td>
                </tr>
              <?php } ?>
            </table>
          </div>
          </div>
        </div>
    </body>
</html>
