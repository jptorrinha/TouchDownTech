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

if(isset($_POST['C_nome'])){
	//retorno formulário
	$C_nome = $_POST['C_nome'];
	$C_cargo = $_POST['C_cargo'];
	$C_email = $_POST['C_email'];
	$C_empresa = $_POST['C_empresa'];
	$C_telefone = $_POST['C_telefone'];
	$C_senha = $_POST['C_senha'];
	$C_id = create_guid(16);
	$C_status = "ATIVO";

	$pw = make_hash($C_senha);

	try {
		//sql de insert
		$sql = "INSERT INTO CLIENTES (
			C_id,
			C_nome,
			C_cargo,
			C_email,
			C_empresa,
			C_telefone,
			C_senha,
			C_status
		) VALUES (
			:C_id,
			:C_nome,
			:C_cargo,
			:C_email,
			:C_empresa,
			:C_telefone,
			:C_senha,
			:C_status
		)";

		//bind para o PDO Insert
		$stmt = $PDO->prepare($sql);

		$stmt->bindParam( ":C_id", $C_id );
		$stmt->bindParam( ":C_nome", $C_nome );
		$stmt->bindParam( ":C_cargo", $C_cargo );
		$stmt->bindParam( ":C_email", $C_email );
		$stmt->bindParam( ":C_empresa", $C_empresa );
		$stmt->bindParam( ":C_telefone", $C_telefone );
		$stmt->bindParam( ":C_senha", $pw );
		$stmt->bindParam( ":C_status", $C_status );
		
		if($stmt->execute()){
			echo json_encode($sucesso);
		}

	} catch (Exception $e) {
		$erroInfo = $e->errorInfo[1];
		$erroDuplicate = array(
			'status' => 'erro',
			'mensagem' => 'O e-mail: <b>' . $C_email . '</b> já existe em nosso cadastro!'
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