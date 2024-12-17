<footer>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="box-footer help">
                        <a href="#" class=""><i class="bi bi-question-circle"></i><br>Ajuda</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="box-footer exit">
                        <a href="sair.php" class=""><i class="bi bi-box-arrow-right"></i><br>Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/jquery.maskedinput.min.js"></script>
<script src="assets/js/jquery.maskMoney.min.js"></script>
<script src="assets/js/adicionar.js"></script>
<script>
    $("#datepicker").datepicker( {
        format: "mm-yyyy",
        viewMode: "years", 
        minViewMode: "year",
        autoclose: true
    });
</script>
</body>
</html>