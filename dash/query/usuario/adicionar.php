<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include '../../config/init.php';
$PDO = db_connect();
$sucesso = array(
	'status' => 'sucesso',
	'mensagem' => 'Usuário cadastrado com sucesso.'
);
$erro = array(
	'status' => 'erro',
	'mensagem' => 'Aconteceu algum coisa ao enviar o seu cadastro, tente novamente!'
);

if(isset($_POST['U_nome'])){
	//retorno formulário
	$U_nome = $_POST['U_nome'];
	$U_cargo = $_POST['U_cargo'];
	$U_email = $_POST['U_email'];
	$U_telefone = $_POST['U_telefone'];
	$U_senha = $_POST['U_senha'];
	$U_id = create_guid(16);

	$pw = make_hash($U_senha);

	try {
		//sql de insert
		$sql = "INSERT INTO USUARIOS (
			U_id,
			U_nome,
			U_cargo,
			U_email,
			U_telefone,
			U_senha
		) VALUES (
			:U_id,
			:U_nome,
			:U_cargo,
			:U_email,
			:U_telefone,
			:U_senha
		)";

		//bind para o PDO Insert
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam( ":U_id", $U_id );
		$stmt->bindParam( ":U_nome", $U_nome );
		$stmt->bindParam( ":U_cargo", $U_cargo );
		$stmt->bindParam( ":U_email", $U_email );
		$stmt->bindParam( ":U_telefone", $U_telefone );
		$stmt->bindParam( ":U_senha", $pw );
		
		if($stmt->execute()){
			echo json_encode($sucesso);
		}

	} catch (Exception $e) {
		$erroInfo = $e->errorInfo[1];
		$erroDuplicate = array(
			'status' => 'erro',
			'mensagem' => 'O e-mail: <b>' . $U_email . '</b> já existe em nosso cadastro!'
		);

		if($erroInfo === 1062){
			echo json_encode($erroDuplicate);
		}else{
			echo json_encode($erro);
		}
	}
}else{
	echo json_encode($erro);
}

?>