<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include '../../config/init.php';
$PDO = db_connect();
$sucesso = array(
	'status' => 'sucesso',
	'mensagem' => 'Time cadastrado com sucesso.'
);
$erro = array(
	'status' => 'erro',
	'mensagem' => 'Aconteceu algum coisa ao enviar o seu cadastro, tente novamente!'
);

if(isset($_POST['nome-time'])){
	//retorno formulário
	$nome = $_POST['nome-time'];
	$director = $_POST['director'];
	$id = create_guid(16);

	try {
		//sql de insert
		$sql = "INSERT INTO TEAMS (
			team_id,
			team_nome,
			team_rel
		) VALUES (
			:team_id,
			:team_nome,
			:team_rel
		)";

		//bind para o PDO Insert
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam( ":team_id", $id );
		$stmt->bindParam( ":team_nome", $nome );
		$stmt->bindParam( ":team_rel", $director );
		
		if($stmt->execute()){
			echo json_encode($sucesso);
		}

	} catch (Exception $e) {
		echo "erro 1" .  json_encode($erro);
	}
}else{
	echo json_encode($erro);
}

?>