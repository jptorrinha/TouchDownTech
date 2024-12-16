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

if(isset($_POST['U_id'])){
	$U_id = $_POST['U_id'];
	$U_nome = $_POST['U_nome'];
	$U_cargo = $_POST['U_cargo'];
	$U_email = $_POST['U_email'];
	$U_telefone = $_POST['U_telefone'];
	//trata se o usuário altara ou não a senha!
  $password = '';
  $U_senha = $_POST['U_senha'];
  $passH = $_POST['U_hash'];

  if($U_senha === ''){
    $password = $passH;
  }else{
    $password = make_hash($U_senha);
  }

  $sql = "
		UPDATE 
			USUARIOS 
		SET
			U_nome = :U_nome,
			U_cargo = :U_cargo,
			U_email = :U_email,
			U_telefone = :U_telefone,
			U_senha = :U_senha
		WHERE 
			U_id = :U_id
		";
	try {
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam( ":U_id", $U_id);
    $stmt->bindParam( ":U_nome", $U_nome );
		$stmt->bindParam( ":U_cargo", $U_cargo );
		$stmt->bindParam( ":U_email", $U_email );
		$stmt->bindParam( ":U_telefone", $U_telefone );
		$stmt->bindParam( ":U_senha", $password );

    if ($stmt->execute()){
    	echo json_encode($sucesso);
    }else{
    	echo json_encode($erro);
    }
	}catch (Exception $e){
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
}
?>