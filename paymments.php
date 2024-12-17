<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):
$team_rel = $_SESSION['relTime'];
$player_id = $_SESSION['id'];
//abre a conexão
$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT * FROM 
          BILLINGS
        INNER JOIN
          TEAMS
        INNER JOIN
          USUARIOS
        ON
          (BILLINGS.bill_player_id = '$player_id')
        AND 
          (TEAMS.team_rel = '$team_rel')";
          
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

$stmtRell = $PDO->prepare($sql);
$stmtRell->execute();
$idRel = $stmtRell->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
include 'parts/header.php' ?>
<main>
  <div class="container-fluid">
    <?php if($count === 0): ?>
    <div class="row mb-4">
      <div class="col-12">
        <p>Você ainda não tem histórico de pagamento!</p>
      </div>
    </div>
    <?php else: ?>
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <h2 class="text-center"><?php echo $idRel['team_nome']; ?></h2>
          <p>Confira meu histórico de pagamento</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <ul class="list-group list-payment">
            <?php while ($bill = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <li class="list-group-item"><strong>Player: <?php echo $bill['U_nome']; ?></strong><br>
              <hr><small>Mês de ref.: <?php echo $bill['bill_reference']; ?></small><br><small>#ID da Transação:<br><?php echo $bill['bill_id']; ?><br>Data do pagamento: <?php $date = $bill['bill_date']; echo date('d/m/Y',strtotime($date));?></small></li><br>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</main>
<?php 
endif;
include 'parts/footer.php' ?>