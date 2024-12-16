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

if(isset($_POST['nome'])){
	//retorno formulário
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$senha = $_POST['password'];
	$perfil = $_POST['check_prefil'];
	$id = create_guid(16);

	$pw = make_hash($senha);

	try {
		//sql de insert
		$sql = "INSERT INTO USUARIOS (
			U_id,
			U_nome,
			U_email,
			U_telefone,
			U_perfil,
			U_senha
		) VALUES (
			:U_id,
			:U_nome,
			:U_email,
			:U_telefone,
			:U_perfil,
			:U_senha
		)";

		//bind para o PDO Insert
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam( ":U_id", $id );
		$stmt->bindParam( ":U_nome", $nome );
		$stmt->bindParam( ":U_email", $email );
		$stmt->bindParam( ":U_telefone", $telefone );
		$stmt->bindParam( ":U_perfil", $perfil );
		$stmt->bindParam( ":U_senha", $pw );
		
		if($stmt->execute()){
			echo json_encode($sucesso);
		}

	} catch (Exception $e) {
		$erroInfo = $e->errorInfo[1];
		$erroDuplicate = array(
			'status' => 'erro',
			'mensagem' => 'O e-mail: <b>' . $email . '</b> já existe em nosso cadastro!'
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