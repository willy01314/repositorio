<form action=" " method="POST" class="form-regllave">
    <h2 class="tituloformsala"> ___Registro Sala___ </h2>
      <div class="contenedor-inputs"></div>
          <input type="text" name="insertarcodigosala" placeholder="Código de llave" class="input-48" required>
          <input type="submit" name="Buscarcodigosala" value="Buscar &#128269;" class="btn-buscarcodigosala"><br>

          <input type="text" name="bloque" placeholder="Bloque" class="input-48">
          <input type="text" name="nombresala" placeholder="Nombre" class="input-48">
          <textarea type="text" name="atributossalas" placeholder="&#128221; caracteristicas de la sala"class="input-caracteristicas"></textarea>

          <h2 class="tituloformdocente">___ Información del Encargado___</h2>
          <div class="contenedor-inputs"></div>

          <input type="text" name="nombresdocente" placeholder="Nombres" class="input-58">
          <input type="text" name="apellidosdocente" placeholder="Apellidos" class="input-58">
          <input type="text" name="ceduladocente" placeholder="Cedula" class="input-58">

          <input type="text" name="programa" placeholder="Programa" class="input-58">
          <textarea type="text" name="novedadessala" placeholder="&#128221; Novedades de la sala (Ejemplo: Equipos dañados, falta de aseo,etc,)"class="input-caracteristicas"></textarea>
          <img class="user-img"src="img/user.png" th:src="@{img/user.png}"/><br>

          <a href="index.html"><input type="submit" value="Volver &#128579;" class="btn-entregarsala"></a>
          <input type="reset" name="cancelar" value="Cancelar Entrega &#10060;" class="btn-canselarentrega">
          <input type="submit" name="solicitaentrega" value="Entregar Sala &#128273;" class="btn-entregarsala">
</form>
