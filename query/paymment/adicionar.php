<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include '../../config/init.php';
$PDO = db_connect();
$sucesso = array(
	'status' => 'sucesso',
	'mensagem' => 'Informe de pagamento registrado com sucesso.'
);
$erro = array(
	'status' => 'erro',
	'mensagem' => 'Aconteceu algum coisa ao enviar o seu cadastro, tente novamente!'
);

if(isset($_POST['paymment_date'])){
	//retorno formulário
	$bill_player_id = $_POST['player'];
	$bill_reference = $_POST['paymment_month'];
	$bill_date = $_POST['paymment_date'];
	$bill_value = $_POST['paymment_value'];
	$team_rel = $_POST['director'];
	$id = create_guid(16);

	try {
		//sql de insert
		$sql = "INSERT INTO BILLINGS (
			bill_id,
			bill_player_id,
			bill_reference,
			bill_date,
			bill_value,
			team_rel
		) VALUES (
			:bill_id,
			:bill_player_id,
			:bill_reference,
			:bill_date,
			:bill_value,
			:team_rel
		)";

		//bind para o PDO Insert
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam( ":bill_id", $id );
		$stmt->bindParam( ":bill_player_id", $bill_player_id );
		$stmt->bindParam( ":bill_reference", $bill_reference );
		$stmt->bindParam( ":bill_date", $bill_date );
		$stmt->bindParam( ":bill_value", $bill_value );
		$stmt->bindParam( ":team_rel", $team_rel );
		
		if($stmt->execute()){
			echo json_encode($sucesso);
		}

	} catch (Exception $e) {
		echo $e;
		//echo "erro 1" .  json_encode($erro);
	}
}else{
	echo "Erro 2" . json_encode($erro);
}

?>