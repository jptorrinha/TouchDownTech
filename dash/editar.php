<?php 
  include 'config/init.php';
  if(isLoggedIn()):
  $type = isset($_GET['type']) ? $_GET['type'] : null;
  $U_id = isset($_GET['U_id']) ? $_GET['U_id'] : null;
  $C_id = isset($_GET['C_id']) ? $_GET['C_id'] : null;
  $nomePage = "";
  if($type === "usuario"){
    $nomePage = "Usuários";
  }else{
    $nomePage = "Clientes";
  }
  $PDO = db_connect();
  $sqlUsuarios = "SELECT * FROM USUARIOS WHERE U_id = :U_id";
  $stmtUsuarios = $PDO->prepare($sqlUsuarios);
  $stmtUsuarios->bindParam(':U_id', $U_id);

  $stmtUsuarios->execute();

  $user = $stmtUsuarios->fetch(PDO::FETCH_ASSOC);

  $sqlClientes = "SELECT * FROM CLIENTES WHERE C_id = :C_id";
  $stmtClientes = $PDO->prepare($sqlClientes);
  $stmtClientes->bindParam(':C_id', $C_id);

  $stmtClientes->execute();

  $clientes = $stmtClientes->fetch(PDO::FETCH_ASSOC);
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
                    href="<?php echo $type; ?>s.php"><?php echo $nomePage; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
              </ol>
            </nav>
            <?php if($type === "cliente"): ?>
            <div class="row">
              <div class="col-md-12">
                <h2>Editar Cliente </h2>
                <div class="box-content">
                  <form class="formulario update-cliente" id="updateCliente">
                    <div class="row">
                      <div class="col-md-12">
                        <legend>Dados Gerais</legend>
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <b>#ID: <?php echo $C_id; ?></b>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <input type="text" class="form-control" name="C_nome" id="C_nome"
                              placeholder="Nome Completo" required value="<?php echo $clientes['C_nome']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-xl-6 col-md-12">
                            <input type="text" class="form-control" name="C_empresa" id="C_empresa"
                              placeholder="Empresa" required value="<?php echo $clientes['C_empresa']; ?>">
                          </div>
                          <div class="form-group col-xl-6 col-md-12">
                            <input type="text" class="form-control" name="C_cargo" id="C_cargo" placeholder="Cargo"
                              value="<?php echo $clientes['C_cargo']; ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-xl-6 col-md-12">
                            <input type="email" class="form-control" name="C_email" id="C_email" placeholder="E-mail"
                              required value="<?php echo $clientes['C_email']; ?>">
                          </div>

                          <div class="form-group col-xl-6 col-md-12">
                            <input type="text" class="form-control" name="C_telefone" id="C_telefone"
                              placeholder="Celular" required value="<?php echo $clientes['C_telefone']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <legend>Senha</legend>
                        <div class="row mb-3">
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="C_senha" id="C_senha" placeholder="Senha">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="C_senhaConf" id="C_senhaConf"
                              placeholder="Confirmar Senha">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <input type="hidden" name="C_id" id="C_id" value="<?php echo $clientes['C_id'] ?>">
                            <input type="hidden" name="C_hash" id="C_hash" value="<?php echo $clientes['C_senha'] ?>">
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
            <?php elseif($type === "usuario"): ?>
            <div class="row">
              <div class="col-md-12">
                <h2>Editar Usuário </h2>
                <div class="box-content">
                  <form class="formulario editar-usuario" id="editUsuario">
                    <div class="row">
                      <div class="col-md-12">
                        <legend>Dados Gerais</legend>
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <b>#ID: <?php echo $U_id; ?></b>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <input type="text" class="form-control" name="U_nome" id="U_nome"
                              placeholder="Nome Completo" required value="<?php echo $user['U_nome'] ?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="form-group col-xl-4 col-md-12">
                            <input type="text" class="form-control" name="U_cargo" id="U_cargo" placeholder="Cargo"
                              value="<?php echo $user['U_cargo'] ?>">
                          </div>
                          <div class="form-group col-xl-4 col-md-12">
                            <input type="email" class="form-control" name="U_email" id="U_email" placeholder="E-mail"
                              required value="<?php echo $user['U_email'] ?>">
                          </div>
                          <div class="form-group col-xl-4 col-md-12">
                            <input type="text" class="form-control" name="U_telefone" id="U_telefone"
                              placeholder="Celular" required value="<?php echo $user['U_telefone'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <legend>Senha</legend>
                        <div class="row mb-3">
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="U_senha" id="U_senha" placeholder="Senha">
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <input type="password" class="form-control" name="U_senhaConf" id="U_senhaConf"
                              placeholder="Confirmar Senha">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="form-group col-12">
                            <input type="hidden" name="U_id" id="U_id" value="<?php echo $user['U_id'] ?>">
                            <input type="hidden" name="U_hash" id="U_hash" value="<?php echo $user['U_senha'] ?>">
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