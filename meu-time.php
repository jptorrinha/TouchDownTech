<?php 
// ini_set('display_errors', true);
// error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):

$rel = $_SESSION['id'];

//abre a conexão
$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT * FROM TEAMS WHERE team_rel = '$rel' ORDER BY team_nome ASC";
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
include 'parts/header.php' ?>
<main>
  <div class="container-fluid">
    <?php if($count === 0): ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3>Cadastre seu time!</h3>
          <form action="#" method="post" id="addTime" class="add-time">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome do Time</label>
              <input type="text" class="form-control" id="nome" name="nome-time" aria-describedby="nome">
              <input type="hidden" class="form-control" id="director" name="director"
                value="<?php echo $_SESSION['id']; ?>">
            </div>
            <div class="mb-3 box-center">
              <button type="submit" class="btn btn-primary btn-lg btn_padrao">Cadastrar meu Time</button>
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
    <?php else: ?>
    <div class="container">
      <div class="row mb-4"></div>
      <div class="row mb-5">
        <div class="col-12">
          <ul class="list-group list-payment">
            <?php while ($team = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <li class="list-group-item"><?php echo $team['team_nome']; ?><br>
              <hr><small>Diretor: <?php echo $team['team_id']; ?></small></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</main>
<?php 
else:
  header('Location: login.php');
endif; 
include 'parts/footer.php' ?>