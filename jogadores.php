<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):
$team_rel = $_SESSION['relTime'];
//abre a conexão
$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT * FROM USUARIOS WHERE U_perfil = '3' AND U_director = '$team_rel' ORDER BY U_nome";
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
include 'parts/header.php' ?>
<main>
  <div class="container flui">
    <?php if($_SESSION['perfil'] === "2"): ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  <h3>Cadastrar meus Jogadores</h3>
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <h5>Insira os dados de seus Jogadores!</h5>
                  <form action="#" method="post" id="AddPlayer" class="add-player">
                    <div class="mb-3">
                      <label for="nome" class="form-label">Nome do Jogador</label>
                      <input type="text" class="form-control" id="nome" name="nome_jogador">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">E-mail do Jogador</label>
                      <input type="email" class="form-control" id="email" name="email_jogador">
                    </div>
                    <div class="mb-3">
                      <label for="telefone" class="form-label">Telefone do Jogador</label>
                      <input type="text" class="form-control" id="telefone" name="telefone_jogador">
                    </div>
                    <div class="mb-3">
                      <label for="link" class="form-label">Link do Drive</label>
                      <input type="text" class="form-control" id="link" name="link_jogador">
                    </div>
                    <div class="mb-3">
                      <label for="senha" class="form-label">Senha de Acesso</label>
                      <input type="password" class="form-control" id="senha" name="senha_jogador">
                    </div>
                    <div class="mb-3 box-center">
                      <input type="hidden" class="form-control" id="U_couch" name="U_couch"
                        value="<?php echo $_SESSION['id']; ?>">
                      <input type="hidden" class="form-control" id="director" name="director"
                        value="<?php echo $_SESSION['relTime']; ?>">
                      <input type="hidden" class="form-control" id="U_perfil" name="U_perfil" value="3">
                      <button type="submit" class="btn btn-primary btn-lg btn_padrao">Cadastrar Jogador</button>
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
          </div>

        </div>
      </div>
    </div>
    <?php endif; ?>
    <div class="container">
      <div class="row mb-4"></div>
      <div class="row mb-5">
        <div class="col-12">
          <ul class="list-group list-payment">
            <?php while ($team = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <li class="list-group-item">Jogador: <?php echo $team['U_nome']; ?><br>
              <hr><small>E-mail: <?php echo $team['U_email']; ?></small></li>
            <hr>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</main>
<?php 
endif;
include 'parts/footer.php' ?>