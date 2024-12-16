<?php include 'includes/header.php'; ?>
<main>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="conteudo-login">
            <div class="form-login">
              <form action="config/auth.php" method="POST">
                <div class="mb-3">
                  <label for="user" class="form-label text-start">E-mail</label>
                  <input type="text" class="form-control" id="user" name="U_email"
                    placeholder="Insira seu e-mail">
                </div>
                <div class="mb-3">
                  <label for="pass" class="form-label">Senha</label>
                  <input type="password" class="form-control" id="pass" name="U_senha"
                    placeholder="Insira sua senha">
                </div>
                <div class="mb-3">
                  <button type="submit" class="btn btn-primary btn-login">Entrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include 'includes/footer-login.php'; ?>