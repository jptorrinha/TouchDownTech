<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):
//abre a conexão
$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT * FROM TEAMS ORDER BY team_id DESC";
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
include 'parts/header.php' ?>
<main>
    <div class="container-fluid">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-center">{Meu Time}</h2>
                    <p>Confira meu histórico de pagamento</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="list-group list-payment">
                        <?php for ($i=0; $i < 20; $i++): ?>
                            <li class="list-group-item">Pagamento XXXXXX<br><small>#ID 000001</small></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
endif;
include 'parts/footer.php' ?>