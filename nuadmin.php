<?php
  include("abrir_conexion.php");
  //print_r($_POST);
  $id=(isset($_POST['id']))?$_POST['id']:"";
  $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
  $documento=(isset($_POST['documento']))?$_POST['documento']:"";
  $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
  $clave=(isset($_POST['clave']))?$_POST['clave']:"";
  $rclave=(isset($_POST['rclave']))?$_POST['rclave']:"";

  $accion=(isset($_POST['accion']))?$_POST['accion']:""; //valor del boton


  $accionAgregar="";
  $accionModificar=$accionEliminar=$accionCancelar="disabled";
  $mostrarModal=false;

  switch ($accion) {
    case "btnAgregar":
        if ($clave==$rclave) {
          $passmd5 = md5($clave);
          $sentencia =$pdo->prepare ("INSERT INTO usuarios(id, nombre, documento, usuario, clave)
                      VALUES ('$id','$nombre','$documento','$usuario','$passmd5')");

          $sentencia->bindParam('$id',$id);
          $sentencia->bindParam('$nombre',$nombre);
          $sentencia->bindParam('$documento',$documento);
          $sentencia->bindParam('$usuario',$usuario);
          $sentencia->bindParam('$passmd5',$passmd5);
          $sentencia->execute();
          header('Location: nuadmin.php');
        }else {
            echo "error"; ////////////////////////////////////////////////////////////////////////cambiar//////////////////
        }
    break;
    case "btnModificar":
      $sentencia =$pdo->prepare ("UPDATE usuarios SET
                                nombre=:nombre,
                                usuario=:usuario,
                                documento=:documento,
                                clave=:clave
                                WHERE
                                id=:id");
      if ($clave==$rclave) {
        $sentencia->bindParam(':id',$id);
        $sentencia->bindParam(':nombre',$nombre);
        $sentencia->bindParam(':usuario',$usuario);
        $sentencia->bindParam(':documento',$documento);
        $sentencia->bindParam(':clave',$clave);
        $sentencia->execute();
        header('Location: nuadmin.php');
      }else {
        echo "error";
      }

    break;
    case "btnEliminar":

    $sentencia =$pdo->prepare ("DELETE FROM usuarios WHERE id=:id");
    $sentencia->bindParam(':id',$id);
    $sentencia->execute();
    header('Location: nuadmin.php');

    break;
    case "btnCancelar":
      header('Location: nuadmin.php');
    break;
    case 'Seleccionar':
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar=$accionCancelar="";
      $mostrarModal=true;
    break;
  }

 //include("abrir_conexion.php");
 $sentencia = $pdo->prepare("SELECT * FROM `usuarios` WHERE 1 ");
 $sentencia->execute();
 $listasalas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-whid, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/nusalas.css">
        <title>Administrador</title>
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
                    <h5 class="modal-title" id="exampleModalLabel">ADMINISTRADOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-row">
                      <br>
                      <input name="id" type="hidden" required value="<?php echo $id?>" placeholder="ID" id="id" >
                      <br><br>
                      <input name="nombre" class="form-control" type="text" required value="<?php echo $nombre?>" placeholder="Nombre Completo" id="nombre" >
                      <br><br>
                      <input type="document" class="form-control" name="documento" value="<?php echo $documento?>" placeholder="Nº Documento" id="documento" required>
                      <br><br>
                      <input name="usuario" class="form-control" value="<?php echo $usuario?>" required type="text" placeholder="Nombre De Usuario" id="usuario">
                      <br><br>
                      <input name="clave" class="form-control" value="<?php echo $clave?>" required type="password" placeholder="&#128273; Clave" id="clave">
                      <br><br>
                      <input name="rclave" class="form-control" value="<?php echo $rclave?>" required type="password" placeholder="&#128273; Confirmar Clave" id="rclave">
                      <br><br>
                      <br>
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
                <th>Nombre</th>
                <th>Nombre Usuario</th>
                <th>Nº Documento</th>
              </tr>
            </thead>
            <?php foreach($listasalas as $salas){ ?>
              <tr>
                <td><?php echo $salas['nombre']; ?></td>
                <td><?php echo $salas['usuario']; ?></td>
                <td><?php echo $salas['documento']; ?></td>

                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $salas['id'];?>">
                <input type="hidden" name="nombre" value="<?php echo $salas['nombre'];?>">
                <input type="hidden" name="documento" value="<?php echo $salas['documento'];?>">
                <input type="hidden" name="usuario" value="<?php echo $salas['usuario'];?>">


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
