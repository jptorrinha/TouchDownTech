<?php
	// inicia a sessão
	session_start();
	 
	// muda o valor de logged_in para false
	$_SESSION['logged_in'] = false;
	$_SESSION['id'] = false;
	$_SESSION['nome'] = false;
	$_SESSION['email'] = false;
	$_SESSION['perfil'] = false;
	 
	// finaliza a sessão
	session_destroy();
	 
	// retorna para a index.php
	header('Location: login.php');

?>