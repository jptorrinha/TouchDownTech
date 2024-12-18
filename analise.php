<?php 
include 'config/init.php';
if(isLoggedIn()):
include 'parts/header.php' ?>
<main>
  <div class="container-fluid">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <p class="text-center">Consulte suas análises nos links abaixo:</p>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="https://drive.google.com/drive/folders/1Y-6C7xQQB8V_YT8eKVysWy8F5yM9DunJ?usp=drive_link"
              class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-controller"></i><br>Por Jogo
            </a>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="https://www.youtube.com/@CBFATV/videos" class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-camera-reels"></i><br>Vídeos do Campeonato
            </a>
          </div>
        </div>
      </div>
      <?php if($_SESSION['perfil'] === "1" || $_SESSION['perfil'] === "2"): ?>
      <div class="row mb-5">
        <div class="col-12">
          <div class="d-grid gap-2 box-buttons">
            <a href="https://drive.google.com/drive/folders/1KrUJx-iezJo8fPMALr3o3JWMHi-93-Ug?usp=drive_link"
              class="btn btn-outline-info btn-lg lk">
              <i class="bi bi-person-walking"></i><br>Por atleta
            </a>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php 
else:
    header('Location: login.php');
endif; 
include 'parts/footer.php' ?>