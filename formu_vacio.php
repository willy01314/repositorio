<form action=" " method="POST" class="form-regllave">
    <h2 class="tituloformsala">___ Registro Sala___</h2>
      <div class="contenedor-inputs"></div>
          <input type="text" name="insertarcodigosala" placeholder="Código de llave" class="input-48" required autofocus>
          <input type="submit" name="Buscarcodigosala" value="Buscar &#128269;" class="btn-buscarcodigosala"><br>

          <input type="text" name="bloque" placeholder="Bloque"  class="input-48" value="">
          <input type="text" name="nombresala" placeholder="Nombre" class="input-48" >
          <input type="text" name="estadosala" placeholder="Estado" class="input-48" >
          <textarea type="text" name="atributossalas" placeholder="&#128221; caracteristicas de la sala" class="input-caracteristicas" ></textarea>

     <h2 class="tituloformdocente">___ Registro Docente___</h2>
      <div class="contenedor-inputs"></div>
          <input type="text" name="insertarcodigodocente" placeholder="CC Docente" class="input-45">
          <input type="submit" name="Buscarcodigodocente" value="Buscar &#128269;" class="btn-buscarcodigodocente"><br>

          <input type="text" name="nombresdocente" placeholder="Nombres" class="input-58" >
          <input type="text" name="apellidosdocente" placeholder="Apellidos" class="input-58">
          <input type="text" name="programa" placeholder="Programa" class="input-58"><br>
          <img class="user-img"src="img/user.png" th:src="@{img/user.png}"/><br>

          <a href="index.html"><input type="submit" value="Volver &#128579;" class="btn-solicitarsala"></a>
          <input type="reset" name="canselar" value="Cancelar Solicitud &#10060;" class="btn-canselarsolicitud">
          <input type="submit" name="solicitarsala" value="Solicitar Sala &#128273;" class="btn-solicitarsala">
</form>
