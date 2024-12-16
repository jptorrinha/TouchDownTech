<?php include 'parts/header.php' ?>
<main>
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
<?php include 'parts/footer.php' ?>