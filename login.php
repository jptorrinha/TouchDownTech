<?php include 'parts/header.php' ?>
<main>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 formulario-login">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
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
                            <b>Primeiro acesso</b>
                        </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'parts/footer.php' ?>