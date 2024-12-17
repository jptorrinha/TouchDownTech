<?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!doctype html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TouchDown Tech</title>
	<link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon.ico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon.ico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon.ico/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon.ico/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon.ico/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon.ico/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon.ico/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon.ico/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon.ico/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon.ico/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon.ico/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon.ico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon.ico/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.ico/favicon-16x16.png">
	<link rel="manifest" href="assets/images/favicon.ico/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="assets/images/favicon.ico/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body <?php
	if($activePage === 'index' ):
			echo 'class="page home"';
	elseif($activePage === 'analise' ):
			echo 'class="page interna analise"';
	elseif($activePage === 'gerencia'):
			echo 'class="page interna gerencia"';
	elseif($activePage === 'paymments'):
			echo 'class="page interna pagamentos"';
	elseif($activePage === 'meu-time'):
			echo 'class="page interna meu-time"';
	elseif($activePage === 'pay-register'):
			echo 'class="page interna pay-register"';
	elseif($activePage === 'jogadores'):
			echo 'class="page interna jogadores"';
	elseif($activePage === 'treinadores'):
			echo 'class="page interna treinadores"';
	endif;
?>>
	<header>
		<div class="container-fluid">
			<div class="logo">
				<img src="assets/images/Logo.png" alt="">
			</div>
			<div class="row welcome">
				<div class="col-12">
					<h1>Bem vindo, <?php $nome = $_SESSION['nome']; $name = explode(" ", $nome); echo $name[0]; ?></h1>
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
			<div class="row navgation meu-time">
				<div class="col-12">
					<h1><a href="gerencia.php"><i class="bi bi-arrow-left"></i></a> Meu Time</h1>
				</div>
			</div>
			<div class="row navgation pay-register">
				<div class="col-12">
					<h1><a href="index.php"><i class="bi bi-arrow-left"></i></a> Registrar Pagamento</h1>
				</div>
			</div>
			<div class="row navgation jogadores">
				<div class="col-12">
					<h1><a href="gerencia.php"><i class="bi bi-arrow-left"></i></a> Meus Jogadores</h1>
				</div>
			</div>
			<div class="row navgation treinadores">
				<div class="col-12">
					<h1><a href="gerencia.php"><i class="bi bi-arrow-left"></i></a> Meu Treinador</h1>
				</div>
			</div>
		</div>
	</header>