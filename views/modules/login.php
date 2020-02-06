<div class="container">
    <div class="row">
      <div class="col-12 containerForm">
        <p class="contanier-login">Proyecto Ayuntamiento</p>
        <form method="POST" onsubmit="return validarIngreso()">
          <div class="form-group">
            <label for="inpurUser"> Usuario</label>
            <input type="text" class="form-control" name="userInput" id="userInput" required>
          </div>
          <div class="form-group">
            <label for="passINput">Contraseña</label>
            <input type="password" class="form-control" name="passInput" id="passInput" required>
          </div>
          <div class="form-group">
            <button class="btn btn-success" type="submit" style="width: 100%;"> Entrar </button>
          </div>
        </form>
        <?php
          $ingreso = new IngresoAyuntmiento();
          $ingreso -> ingresoControllerr();
        ?>
      </div>
    </div>
</div>