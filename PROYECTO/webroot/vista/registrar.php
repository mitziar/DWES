<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">

      </div>
        <div class="modal-body p-5 pt-0">
        <form action="index.php" method="POST" class="">
          <div class="text-center">
            <h3>Registro</h3>
          </div>
          <hr class="my-4">
          <div class="form-floating mb-3">
            <input type="text" name="user" class="form-control rounded-3" id="floatingInput" placeholder="Usuario">
            <label for="floatingInput">Usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-3" id="floatingInput" placeholder="alguien@email.com">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Contraseña</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password2" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Repita contraseña</label>
          </div>
          <hr class="my-4">
          <div class="text-center">
            <input type="submit" name="registrarse" class="btn btn-outline-primary text-center" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>