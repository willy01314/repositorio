<?php
  include("abrir_conexion.php");
  //print_r($_POST);
  $id=(isset($_POST['id']))?$_POST['id']:"";
  $cedula=(isset($_POST['cedula']))?$_POST['cedula']:"";
  $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
  $apellido=(isset($_POST['apellido']))?$_POST['apellido']:"";
  $programa=(isset($_POST['programa']))?$_POST['programa']:"";
  $estado = "sin prestamo";

  $accion=(isset($_POST['accion']))?$_POST['accion']:""; //valor del boton


  $accionAgregar="";
  $accionModificar=$accionEliminar=$accionCancelar="disabled";
  $mostrarModal=false;

  switch ($accion) {
    case "btnAgregar"://///arreglar
    if (condition) {
      $sentencia =$pdo->prepare ("INSERT INTO docentes(id, cedula, nombre, apellido, programa, estado)
                  VALUES ('$id','$cedula','$nombre','$apellido','$programa','$estado')");

      $sentencia->bindParam('$id',$id);
      $sentencia->bindParam('$cedula',$cedula);
      $sentencia->bindParam('$nombre',$nombre);
      $sentencia->bindParam('$apellido',$apellido);
      $sentencia->bindParam('$programa',$programa);
      $sentencia->bindParam('$estado',$estado);
      $sentencia->execute();
      header('Location: nudocente.php');
    }else {
      echo "El docente ya existe";
    }

    break;
    case "btnModificar":
      $sentencia =$pdo->prepare ("UPDATE docentes SET
                                cedula=:cedula,
                                nombre=:nombre,
                                apellido=:apellido,
                                programa=:programa,
                                estado=:estado WHERE
                                id=:id");

      $sentencia->bindParam(':id',$id);
      $sentencia->bindParam(':cedula',$cedula);
      $sentencia->bindParam(':nombre',$nombre);
      $sentencia->bindParam(':apellido',$apellido);
      $sentencia->bindParam(':programa',$programa);
      $sentencia->bindParam(':estado',$estado);
      $sentencia->execute();
      header('Location: nudocente.php');

    break;
    case "btnEliminar":

    $sentencia =$pdo->prepare ("DELETE FROM docentes WHERE id=:id");
    $sentencia->bindParam(':id',$id);
    $sentencia->execute();
    header('Location: nudocente.php');

    break;
    case "btnCancelar":
      header('Location: nudocente.php');
    break;
    case 'Seleccionar':
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar=$accionCancelar="";
      $mostrarModal=true;
    break;
  }

 //include("abrir_conexion.php");
 $sentencia = $pdo->prepare("SELECT * FROM `docentes` WHERE 1 ");
 $sentencia->execute();
 $listasalas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-whid, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/nusalas.css">
        <title>Administrar Docentes</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
          <form class="" action=" " method="post" enctype="multipart/form-data">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DOCENTES</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-row">
                      <br>
                      <input name="id" type="hidden" required value="<?php echo $id?>" placeholder="ID" id="id" >
                      <br><br>
                      <input name="cedula" class="form-control" type="text" required value="<?php echo $cedula?>" placeholder="Cedula" id="cedula" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                      <br><br>
                      <input name="nombre" class="form-control" value="<?php echo $nombre?>" required type="text" placeholder="Nombre" id="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                      <br><br>
                      <input name="apellido" class="form-control" value="<?php echo $apellido?>" required type="text" placeholder="Apellido" id="apellido" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                      <br><br>
                      <br>
                      <input type="text" class="form-control" value="<?php echo $programa?>" required name="programa" placeholder="Programa" id="programa" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                      <br><br>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                    <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
                    <button value="btnEliminar" <?php echo $accionEliminar; ?> onclick="return Confirmar('¿Realmente deseas ELIMINAR el registro?');" type="submit" class="btn btn-danger" name="accion">Eliminar</button>
                    <button value="btnCancelar" <?php echo $accionCancelar; ?> type="submit" class="btn btn-primary" name="accion">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
          </br>
        </br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Agregar registro +
            </button>
            <a href="admiconf.php"><button type="button" class="btn btn-success">Volver</button></a>
            <br><br><br>
          </form>
        </div>


        <div class="conten">
        <div class="row">
          <div class="table-responsive">
          <table class="table table-hover table-bordered table-condensed table-dark ">
            <thead class="thead-dark">
              <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Programa</th>
                <th>Accion</th>
              </tr>
            </thead>
            <?php foreach($listasalas as $salas){ ?>
              <tr>
                <td><?php echo $salas['cedula']; ?></td>
                <td><?php echo $salas['nombre']; ?></td>
                <td><?php echo $salas['apellido']; ?></td>
                <td><?php echo $salas['programa']; ?></td>

                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $salas['id'];?>">
                <input type="hidden" name="cedula" value="<?php echo $salas['cedula'];?>">
                <input type="hidden" name="nombre" value="<?php echo $salas['nombre'];?>">
                <input type="hidden" name="apellido" value="<?php echo $salas['apellido'];?>">
                <input type="hidden" name="programa" value="<?php echo $salas['programa'];?>">

                <td><input type="submit" value="Seleccionar" class="btn btn-info" name="accion">
                <button value="btnEliminar" onclick="return Confirmar('¿Realmente deseas ELIMINAR el registro?');" type="submit" class="btn btn-danger" name="accion">Eliminar</button></td>

                </form>

                </tr>
              <?php } ?>
            </table>
          </div>
          </div>
        </div>
        <?php if($mostrarModal){ ?>
          <script>
              $('#exampleModal').modal('show');
          </script>
        <?php } ?>
        <script>
          function Confirmar(Mensaje){
            return(confirm(Mensaje))?true:false;
          }
        </script>
        </div>
    </body>
</html>
