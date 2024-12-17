<?php include 'parts/header.php' ?>
<main class="login">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <form action="config/auth.php" method="POST">
                    <div class="col-12 formulario-login">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3 box-center">
                            <button type="submit" class="btn btn-primary btn-lg btn_padrao">Login</button>
                        </div>
                        <div class="mb-3">
                            <p><a href="#" class="link-primary">
                                <b>Esqueci minha senha</b>
                            </a></p>
                        </div>
                        <div class="mb-3">
                            <p><a href="cadastro.php" class="link-primary">
                                <b>Cadastre-se</b>
                            </a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'parts/footer.php' ?>