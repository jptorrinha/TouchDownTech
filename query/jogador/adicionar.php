<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include '../../config/init.php';
$PDO = db_connect();
$sucesso = array(
	'status' => 'sucesso',
	'mensagem' => 'Jogador cadastrado com sucesso.'
);
$erro = array(
	'status' => 'erro',
	'mensagem' => 'Aconteceu algum coisa ao enviar o seu cadastro, tente novamente!'
);

if(isset($_POST['nome_jogador'])){
	//retorno formulário
	$nome = $_POST['nome_jogador'];
	$email = $_POST['email_jogador'];
	$telefone = $_POST['telefone_jogador'];
	$senha = $_POST['senha_jogador'];
	$perfil = $_POST['U_perfil'];
	$director = $_POST['director'];
	$couch = $_POST['U_couch'];
	$link_jogador = $_POST['link_jogador'];
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
			U_senha,
			U_director,
			U_couch,
			Link_Analise
		) VALUES (
			:U_id,
			:U_nome,
			:U_email,
			:U_telefone,
			:U_perfil,
			:U_senha,
			:U_director,
			:U_couch,
			:Link_Analise
		)";

		//bind para o PDO Insert
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam( ":U_id", $id );
		$stmt->bindParam( ":U_nome", $nome );
		$stmt->bindParam( ":U_email", $email );
		$stmt->bindParam( ":U_telefone", $telefone );
		$stmt->bindParam( ":U_perfil", $perfil );
		$stmt->bindParam( ":U_senha", $pw );
		$stmt->bindParam( ":U_director", $director );
		$stmt->bindParam( ":U_couch", $couch );
		$stmt->bindParam( ":Link_Analise", $link_jogador );
		
		if($stmt->execute()){
			echo json_encode($sucesso);
		}

	} catch (Exception $e) {
		echo $e;
		//echo json_encode($erro1);
	}
}else{
	echo json_encode($erro);
}

?>