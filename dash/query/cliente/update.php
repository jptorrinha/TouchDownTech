<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include '../../config/init.php';

$sucesso = array(
	'status' => 'atualizado',
	'mensagem' => 'Usuário atualizado com sucesso!'
);

$erro = array(
	'status' => 'erro',
	'mensagem' => 'Aconteceu algum coisa ao alterar o cadastro, tente novamente!'
);

$PDO = db_connect();

// print_r($_POST);
// exit;

if(isset($_POST['C_id'])){
	$C_id = $_POST['C_id'];
	$C_nome = $_POST['C_nome'];
	$C_cargo = $_POST['C_cargo'];
	$C_email = $_POST['C_email'];
	$C_empresa = $_POST['C_empresa'];
	$C_telefone = $_POST['C_telefone'];
	$C_status = "ATIVO";

	//trata se o usuário altara ou não a senha!
  $password = '';
  $C_senha = $_POST['C_senha'];
  $passH = $_POST['C_hash'];

  if($C_senha === ''){
    $password = $passH;
  }else{
    $password = make_hash($C_senha);
  }

  $sql = "
		UPDATE 
			CLIENTES 
		SET
			C_nome = :C_nome,
			C_cargo = :C_cargo,
			C_email = :C_email,
			C_empresa = :C_empresa,
			C_telefone = :C_telefone,
			C_senha = :C_senha,
			C_status= :C_status
		WHERE 
			C_id = :C_id
		";
	try {
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam( ":C_id", $C_id);
    $stmt->bindParam( ":C_nome", $C_nome );
		$stmt->bindParam( ":C_cargo", $C_cargo );
		$stmt->bindParam( ":C_email", $C_email );
		$stmt->bindParam( ":C_empresa", $C_empresa );
		$stmt->bindParam( ":C_telefone", $C_telefone );
		$stmt->bindParam( ":C_senha", $password );
		$stmt->bindParam( ":C_status", $C_status );

    if ($stmt->execute()){
    	echo json_encode($sucesso);
    }else{
    	echo json_encode($erro);
    }
	}catch (Exception $e){
		print_r($e);
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
}
?>