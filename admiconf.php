<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-whid, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/fontello.css"><!--llama los atributos de los archivos de tipo fontello(iconos) -->
    <link rel="stylesheet" href="css/admconfig.css"><!--importa la hoja de estilos de el contenedor (inicio) -->
    <title>administradores</title><!-- inserta el titulo al archivo html -->
  </head>
  <body>

    <main>
      <section id="banner">
        <img src="img/fondoadmiconf.jpg" alt="fondo">
        <div class="contenedor">
          <?php
          session_start();
          $sesion = $_SESSION['username'];
          if(!isset($sesion)){
              header("location: administracion.html");
          }else{
              echo "<a href='salir.php'>Salir</a>";
          }
          ?>
        </div>
      </section>

      <section id="info">
          <h3> CONFIGURACIÓN </h3>
            <div class="contenedor">
            <div class="info-uni">
              <a href="nudocente.php"><img src="img/docentes.jpg" alt="" /> </a>
                <h4>Administar<br>Docentes</h4>
            </div>

            <div class="info-uni">
              <a href="nusalas.php">  <img src="img/salas.jpg" alt=""/></a>
                <h4>Administrar<br>Salas</h4>

            </div>

            <div class="info-uni">
              <a href="nuadmin.php"><img src="img/administradores.jpg" alt=""/></a>
                <h4>Administardores</h4>
            </div>

            <div class="info-uni">
              <a href="reporsolicitud.php"><img src="img/reportesolicitud.jpg" alt=""/></a>
                <h4>Reporte de<br>Solicitud</h4>
            </div>

            <div class="info-uni">
              <a href="reporentrega.php"><img src="img/reporteentrega.jpg" alt=""/></a>
                <h4>Reporte de<br>Entrega</h4>
            </div>

          </div>
      </section>
    </main>

    <footer>
        <div class="contenedor">
          <p class="copy"> UCundinamarca/AdminKey &copy; 2019</p>
            <div class="sociales">
              <a class="icon-facebook" href="https://www.facebook.com/ucundinamarcaoficial/"></a>
              <a class="icon-youtube" href="https://www.youtube.com/channel/UCHAmWg53w4HyIXmD26AExog"></a>
              <a class="icon-navegador" href="https://www.ucundinamarca.edu.co/"></a>
            </div>
        </div>
    </footer>
  </body>
</html>
