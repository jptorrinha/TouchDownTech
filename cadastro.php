<?php 
include 'config/init.php';
if(isLoggedIn()):
include 'parts/header.php' ?>
<main class="login">
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <form action="#" metod="POST" id="addUsuario" class="add-usuario">
          <div class="col-12 formulario-login">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome completo</label>
              <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">Celular</label>
              <input type="text" class="form-control" id="telefone" name="telefone" aria-describedby="celular">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Senha</label>
              <input type="password" class="form-control" id="password" name="password">
              <input type="hidden" class="form-control" id="U_perfil" name="U_perfil" value="1">
            </div>

            <div class="mb-3 box-center">
              <button type="submit" class="btn btn-primary btn-lg btn_padrao">Cadastrar</button>
            </div>
            <div class="mb-3">
              <p><a href="login.php" class="link-primary">
                  <b>Voltar</b>
                </a></p>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-success" role="alert" style="display: none"></div>
                <div class="alert alert-danger" role="alert" style="display: none"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php 
else:
  header('Location: login.php');
endif; 
include 'parts/footer.php' ?>