<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):
$team_rel = $_SESSION['id'];
//abre a conexão
$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT 
COUNT(*) AS CONTAGEM,
  U.U_director,
  U.U_nome,
  U.U_email,
  B.bill_reference,
  U.U_id,
  B.bill_date,
  B.bill_id
FROM BILLINGS AS B
INNER JOIN USUARIOS AS U ON (U.U_director = B.team_rel)
AND (B.team_rel = U.U_director)
WHERE U.U_director = '$team_rel' AND U.U_id = B.bill_player_id
GROUP BY 
  U.U_director,
  U.U_nome,
  U.U_email,
  B.bill_reference,
  B.bill_date,
  U.U_id,
  B.bill_id
ORDER BY B.bill_reference DESC";
          
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

$stmtRell = $PDO->prepare($sql);
$stmtRell->execute();
$idRel = $stmtRell->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();

;
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
          <h2 class="text-center"><?php echo $_SESSION['relTimeName']; ?></h2>
          <p>Confira meu histórico de pagamento</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <ul class="list-group list-payment">
            <?php while ($bill = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <li class="list-group-item">
              <strong>Player: <?php echo $bill['U_nome']; ?></strong><br><hr>
              <small>Mês de Ref.: <?php echo $bill['bill_reference']; ?></small><br>
              <small>#ID da Transação:<br><?php echo $bill['bill_id']; ?><br>
              Data do pagamento: <?php $date = $bill['bill_date']; echo date('d/m/Y',strtotime($date));?></small>
            </li><br>
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