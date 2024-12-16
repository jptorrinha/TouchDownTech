<?php 
  include 'config/init.php';
  $name = isset($_GET['type']) ? $_GET['type'] : null;
  $nomePage = "";
  if($name === "usuario"){
    $nomePage = "Usuários";
  }else{
    $nomePage = "Clientes";
  }
  if(isLoggedIn()):
  include 'includes/header.php';
?>
<main>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <?php include 'includes/sidebar.php'; ?>
        <div class="col-md-10">
          <div class="conteudo">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item" aria-current="page"><a
                    href="<?php echo $name; ?>s.php"><?php echo $nomePage; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
              </ol>
            </nav>
            <?php if($name === "cliente"): ?>
            <div class="row">
              <div class="col-md-12">
                <h2>Adicionar novo Cliente </h2>
                <div class="box-content">
                  <form class="formulario add-cliente" id="addCliente">
                    <div class="row">
                      <div class="col-md-12">
                        <legend>Dados Gerais</legend>
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <input type="text" class="form-control" name="C_nome" id="C_nome"
                              placeholder="Nome Completo" required>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-xl-6 col-md-12">
                            <input type="text" class="form-control" name="C_empresa" id="C_empresa"
                              placeholder="Empresa" required>
                          </div>
                          <div class="form-group col-xl-6 col-md-12">
                            <input type="text" class="form-control" name="C_cargo" id="C_cargo" placeholder="Cargo">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-xl-6 col-md-12">
                            <input type="email" class="form-control" name="C_email" id="C_email" placeholder="E-mail"
                              required>
                          </div>

                          <div class="form-group col-xl-6 col-md-12">
                            <input type="text" class="form-control" name="C_telefone" id="C_telefone"
                              placeholder="Celular" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <legend>Senha</legend>
                        <div class="row mb-3">
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="C_senha" id="C_senha" placeholder="Senha"
                              required>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="C_senhaConf" id="C_senhaConf"
                              placeholder="Confirmar Senha" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <button type="submit" class="btn btn-outline-success btn-lg">SALVAR DADOS</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-success" role="alert" style="display: none"></div>
                        <div class="alert alert-danger" role="alert" style="display: none"></div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php elseif($name === "usuario"): ?>
            <div class="row">
              <div class="col-md-12">
                <h2>Adicionar novo Usuário </h2>
                <div class="box-content">
                  <form class="formulario add-usuario" id="addUsuario">
                    <div class="row">
                      <div class="col-md-12">
                        <legend>Dados Gerais</legend>
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <input type="text" class="form-control" name="U_nome" id="U_nome"
                              placeholder="Nome Completo" required>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-xl-4 col-md-12">
                            <input type="text" class="form-control" name="U_cargo" id="U_cargo" placeholder="Cargo">
                          </div>
                          <div class="form-group col-xl-4 col-md-12">
                            <input type="email" class="form-control" name="U_email" id="U_email" placeholder="E-mail"
                              required>
                          </div>
                          <div class="form-group col-xl-4 col-md-12">
                            <input type="text" class="form-control" name="U_telefone" id="U_telefone"
                              placeholder="Celular" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <legend>Senha</legend>
                        <div class="row mb-3">
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="U_senha" id="U_senha" placeholder="Senha"
                              required>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="U_senhaConf" id="U_senhaConf"
                              placeholder="Confirmar Senha" required>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <button type="submit" class="btn btn-outline-success btn-lg">SALVAR DADOS</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-success" role="alert" style="display: none"></div>
                        <div class="alert alert-danger" role="alert" style="display: none"></div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include 'includes/footer.php';
else:
header('Location: login.php');
endif;
?>