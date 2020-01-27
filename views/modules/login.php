<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b style="color:#7f564d;">CMS</b>Ayuntamiento</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia seción en tu portal</p>

      <form  method="post" id="formIngreso" onsubmit="return validarIngreso()">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuarioIngreso" id="usuarioIngreso" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="passwordIngreso" id="passwordIngreso" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" value="evniar" class="btn btn-primary btn-block btn-flat">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
        $ingreso = new IngresoSystema();
        $ingreso -> IngresoController();
      ?>
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Iniciar seción con Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Iniciar seción con Google
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">Olvide mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Contactar con soporte</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->



</body>