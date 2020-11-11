<form action=" " method="POST" class="form-regllave">
    <h2 class="tituloformsala">___ Registro Sala___</h2>
      <div class="contenedor-inputs"></div>
          <input type="text" name="insertarcodigosala" placeholder="Codigo de llave" value="<?php echo  $codSal ?>" class="input-48" required>
          <input type="submit" name="Buscarcodigosala" value="Buscar &#128269;" class="btn-buscarcodigosala"><br>

          <input type="text" name="bloque" placeholder="Bloque"  class="input-48" value="<?php echo $bloqueS ?>">
          <input type="text" name="nombresala" placeholder="Nombre" value="<?php echo $Nsala ?>" class="input-48" >
          <input type="text" name="estadosala" placeholder="Estado" value="<?php echo $EstadoS ?>" class="input-48" >
          <textarea type="text" name="atributossalas"  placeholder="<?php echo $caractS ?>"  class="input-caracteristicas" ><?php echo $caractS ?></textarea>

     <h2 class="tituloformdocente">___ Registro Docente___</h2>
      <div class="contenedor-inputs"></div>
          <input type="text" name="insertarcodigodocente" placeholder="CC Docente" value="<?php echo  $CedDoc ?>" class="input-45">
          <input type="submit" name="Buscarcodigodocente" value="Buscar &#128269;" class="btn-buscarcodigodocente" required><br>

          <input type="text" name="nombresdocente" placeholder="Nombres"  value="<?php echo  $NombDoc ?>" class="input-58" >
          <input type="text" name="apellidosdocente" placeholder="Apellidos"  value="<?php echo  $ApelliDoc ?>" class="input-58">
          <input type="text" name="programa" placeholder="Programa"  value="<?php echo  $program ?>" class="input-58"><br>
          <img class="user-img"src="img/user.png" th:src="@{img/user.png}"/><br>

          <a href="index.html"><input type="submit" value="Volver &#128579;" class="btn-solicitarsala"></a>
          <input type="reset" name="canselar" value="Cancelar Solicitud &#10060;" class="btn-canselarsolicitud">
          <input type="submit" name="solicitarsala" value="Solicitar Sala &#128273;" class="btn-solicitarsala">
</form>
