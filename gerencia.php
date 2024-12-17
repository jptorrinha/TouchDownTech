<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):
include 'parts/header.php' ?>
<main>
  <div class="container">
    <div class="row mb-4">
      <div class="col-12">
        <p class="text-center">Consulte os dados do seu time abaixo:</p>
      </div>
    </div>
    <?php if($_SESSION['perfil'] === "1"): ?>
    <div class="row mb-5">
      <div class="col-12">
        <div class="d-grid gap-2 box-buttons">
          <a href="meu-time.php" class="btn btn-outline-info btn-lg lk">
            <i class="bi bi-dribbble"></i><br>Meus Time
          </a>
        </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-12">
        <div class="d-grid gap-2 box-buttons">
          <a href="treinadores.php" class="btn btn-outline-info btn-lg lk">
            <i class="bi bi-person-walking"></i><br>Meus Treinadores
          </a>
        </div>
      </div>
    </div>
    <?php elseif($_SESSION['perfil'] === "2"): ?>
    <div class="row mb-5">
      <div class="col-12">
        <div class="d-grid gap-2 box-buttons">
          <a href="jogadores.php" class="btn btn-outline-info btn-lg lk">
            <i class="bi bi-controller"></i><br>Meus Jogadores
          </a>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
  </div>
</main>
<?php 
endif;
include 'parts/footer.php' ?>