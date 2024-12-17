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
                        <a href="#" class="btn btn-outline-info btn-lg lk">
                            <i class="bi bi-controller"></i><br>Por Jogo
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-grid gap-2 box-buttons">
                        <a href="#" class="btn btn-outline-info btn-lg lk">
                            <i class="bi bi-person-walking"></i><br>Por atleta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
else:
    header('Location: login.php');
endif; 
include 'parts/footer.php' ?>