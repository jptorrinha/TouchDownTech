<?php include 'parts/header.php' ?>
<main>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 formulario-login add-usuario" id="addUsuario">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <p class="cadastro">Selecione o perfil</p>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="check_prefil" id="check_atleta" value="3">
                            <label class="form-check-label" for="check_atleta">Atleta</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="check_prefil" id="check_treinador" value="2">
                            <label class="form-check-label" for="check_treinador">Treinador</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="check_prefil" id="check_tcheck_diretorreinador" value="1">
                            <label class="form-check-label" for="check_diretor">Diretor</label>
                        </div>
                    </div>
                    <div class="mb-3 box-center">
                        <button type="submit" class="btn btn-primary btn-lg btn_padrao">Cadastrar</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'parts/footer.php' ?>