<?php
  include("abrir_conexion.php");
  //print_r($_POST);
  $id=(isset($_POST['id']))?$_POST['id']:"";
  $codillave=(isset($_POST['codillave']))?$_POST['codillave']:"";
  $bloque=(isset($_POST['bloque']))?$_POST['bloque']:"";
  $nomsala=(isset($_POST['nomsala']))?$_POST['nomsala']:"";
  $caracte=(isset($_POST['caracte']))?$_POST['caracte']:"";
  $estado = "Activa";

  $accion=(isset($_POST['accion']))?$_POST['accion']:""; //valor del boton


  $accionAgregar="";
  $accionModificar=$accionEliminar=$accionCancelar="disabled";
  $mostrarModal=false;

  switch ($accion) {
    case "btnAgregar":
        $sentencia =$pdo->prepare ("INSERT INTO salas(id, codigollave, bloque, nombre, estado, caracteristicas)
                    VALUES ('$id','$codillave','$bloque','$nomsala','$estado','$caracte')");

        $sentencia->bindParam('$id',$id);
        $sentencia->bindParam('$codillave',$codillave);
        $sentencia->bindParam('$bloque',$bloque);
        $sentencia->bindParam('$nomsala',$nomsala);
        $sentencia->bindParam('$estado',$estado);
        $sentencia->bindParam('$caracte',$caracte);
        $sentencia->execute();
        header('Location: nusalas.php');
    break;
    case "btnModificar":
      $sentencia =$pdo->prepare ("UPDATE salas SET
                                codigollave=:codillave,
                                bloque=:bloque,
                                nombre=:nomsala,
                                estado=:estado,
                                caracteristicas=:caracte WHERE
                                id=:id");

      $sentencia->bindParam(':id',$id);
      $sentencia->bindParam(':codillave',$codillave);
      $sentencia->bindParam(':bloque',$bloque);
      $sentencia->bindParam(':nomsala',$nomsala);
      $sentencia->bindParam(':estado',$estado);
      $sentencia->bindParam(':caracte',$caracte);
      $sentencia->execute();
      header('Location: nusalas.php');

    break;
    case "btnEliminar":

    $sentencia =$pdo->prepare ("DELETE FROM salas WHERE id=:id");
    $sentencia->bindParam(':id',$id);
    $sentencia->execute();
    header('Location: nusalas.php');

    break;
    case "btnCancelar":
      header('Location: nusalas.php');
    break;
    case 'Seleccionar':
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar=$accionCancelar="";
      $mostrarModal=true;
    break;
  }

 //include("abrir_conexion.php");
 $sentencia = $pdo->prepare("SELECT * FROM `salas` WHERE 1 ");
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
        <div class="container">
          <form class="" action=" " method="post" enctype="multipart/form-data">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SALAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-row">
                      <br>
                      <input name="id" type="hidden" required value="<?php echo $id?>" placeholder="ID" id="id" >
                      <br><br>
                      <input name="codillave" class="form-control" type="text" required value="<?php echo $codillave?>" placeholder="Codigo llave" id="codillave" >
                      <br><br>
                      <input name="bloque" class="form-control" value="<?php echo $bloque?>" required type="text" placeholder="Bloque" id="bloque">
                      <br><br>
                      <input name="nomsala" class="form-control" value="<?php echo $nomsala?>" required type="text" placeholder="Nombre" id="nomsala">
                      <br><br>
                      <br>
                      <input type="text" class="form-control" value="<?php echo $caracte?>" required name="caracte" placeholder="&#128221; caracteristicas" id="caracte">
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
              Agregar sala +
            </button>
            <a href="admiconf.php"><button type="button" class="btn btn-success">Volver</button></a>
            <br><br>
          </form>
        </div>


        <div class="conten">
        <div class="row">
          <div class="table-responsive">
          <table class="table table-hover table-bordered table-condensed table-dark ">
            <thead class="thead-dark">
              <tr>
                <th>Codigo llave</th>
                <th>Bloque</th>
                <th>Nombre sala</th>
                <th>Caracteristicas</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <?php foreach($listasalas as $salas){ ?>
              <tr>
                <td><?php echo $salas['codigollave']; ?></td>
                <td><?php echo $salas['bloque']; ?></td>
                <td><?php echo $salas['nombre']; ?></td>
                <td><?php echo $salas['caracteristicas']; ?></td>

                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $salas['id'];?>">
                <input type="hidden" name="codillave" value="<?php echo $salas['codigollave'];?>">
                <input type="hidden" name="bloque" value="<?php echo $salas['bloque'];?>">
                <input type="hidden" name="nomsala" value="<?php echo $salas['nombre'];?>">
                <input type="hidden" name="caracte" value="<?php echo $salas['caracteristicas'];?>">

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
