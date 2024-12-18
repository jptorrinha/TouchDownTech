<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):
include 'parts/header.php' ?>
<main>
  <div class="container-fluid">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12">
          <p class="text-center">Registre seu seu pagamento abaixo</p>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-12">
          <form action="#" method="post" id="addPaymment" class="add-paymment">
            <div class="mb-3">
              <label for="paymment_date" class="form-label">Data do Pagamento</label>
              <input type="date" class="form-control" id="paymment_date" name="paymment_date">
            </div>
            <div class="mb-3">
              <label for="paymment_month" class="form-label">Mês de Referência</label>
              <input type="text" readonly="readonly" class="form-control" id="datepicker" name="paymment_month">
            </div>
            <div class="mb-3">
              <label for="paymment_value" class="form-label">Valor do Pagamento</label>
              <input type="text" class="form-control" id="paymment_value" name="paymment_value">
              <input type="hidden" class="form-control" id="player" name="player"
                value="<?php echo $_SESSION['id']; ?>">
              <input type="hidden" class="form-control" id="director" name="director"
                value="<?php echo $_SESSION['relTime']; ?>">
            </div>
            <div class="mb-3 box-center">
              <button type="submit" class="btn btn-primary btn-lg btn_padrao">Enviar</button>
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
</main>
<?php 
else:
  header('Location: login.php');
endif; 
include 'parts/footer.php' ?>