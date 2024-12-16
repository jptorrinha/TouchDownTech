<?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TouchDown Tech</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body
        <?php
            if($activePage === 'index' ):
                echo 'class="page home"';
            elseif($activePage === 'analise' ):
                echo 'class="page interna analise"';
            elseif($activePage === 'gerencia'):
                echo 'class="page interna gerencia"';
            elseif($activePage === 'paymments'):
                echo 'class="page interna pagamentos"';
            endif;

        ?>
    >
        <header>
            <div class="container-fluid">
                <div class="logo">
                    <img src="assets/images/Logo.png" alt="">
                </div>
                <div class="row welcome">
                    <div class="col-12">
                        <h1>Bem vindo, XXXX</h1>
                    </div>
                </div>
                <div class="row navgation analise">
                    <div class="col-12">
                        <h1><a href="index.php"><i class="bi bi-arrow-left"></i></a> Minhas análises</h1>
                    </div>
                </div>
                <div class="row navgation gerenciar">
                    <div class="col-12">
                        <h1><a href="index.php"><i class="bi bi-arrow-left"></i></a> Gerenciar meu Time</h1>
                    </div>
                </div>
                <div class="row navgation pagamentos">
                    <div class="col-12">
                        <h1><a href="index.php"><i class="bi bi-arrow-left"></i></a> Pagamentos</h1>
                    </div>
                </div>
            </div>
        </header>