<?php 
include 'config/init.php';
if(isLoggedIn()):
include 'parts/header.php' 

?>
<main>
  <?php if($_SESSION['perfil'] === "1"): ?>
  <div class="container-fluid admin">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <p class="text-center">O que você que fazer hoje?</p>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="analise.php" class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-graph-up-arrow"></i><br>Acessar minhas análises
            </a>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="gerencia.php" class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-gear"></i><br>Gerenciar meu time
            </a>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="paymments.php" class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-cash-coin"></i><br>Acompanhar registro de pagamentos
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php elseif($_SESSION['perfil'] === "2"): ?>
  <div class="container-fluid couchs">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <p class="text-center">O que você que fazer hoje?</p>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="https://drive.google.com/drive/folders/1B89WxYpGFN41aTe3oqlF0LcaJpkt631W?usp=drive_link"
              class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-cloud-arrow-up"></i><br>Upload de vídeos
            </a>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="https://drive.google.com/drive/folders/1fjLV2JP2JVMdTlOPBVMDtECvX40K7TfM?usp=drive_link"
              class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-graph-up-arrow"></i><br>Acessar minhas análises
            </a>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="gerencia.php" class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-gear"></i><br>Gerenciar meu time
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php elseif($_SESSION['perfil'] === "3"): ?>
  <div class="container-fluid player">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <p class="text-center">O que você que fazer hoje?</p>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="analise.php" class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-graph-up-arrow"></i><br>Acessar minhas análises
            </a>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="pay-register.php" class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-cash-coin"></i><br>Registrar pagamento de mensalidade
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</main>
<?php 
else:
  header('Location: login.php');
endif; 
include 'parts/footer.php' ?>