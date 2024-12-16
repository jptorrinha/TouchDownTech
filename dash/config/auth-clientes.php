<?php header_remove();

// inclui o arquivo de inicialização
require 'init.php';
$PDO = db_connect();

// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$docs = isset($_POST['referer']) ? $_POST['referer'] : '';

if (empty($email) || empty($senha)){
  	echo "<div><script>alert('Informe usuário e senha');";
  	echo "javascript:window.location='../../documentation/?docs={$docs}';</script></div>";
  exit;
}

// cria o hash da senha
$senhaHash = make_hash($senha);

$sql = "SELECT * FROM CLIENTES WHERE C_email = :C_email AND C_senha = :C_senha";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':C_email', $email);
$stmt->bindParam(':C_senha', $senhaHash);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0){
  	echo "<div><script>alert('Usuário ou Senha incorreto!');";
  	echo "javascript:window.location='../../documentation/?docs={$docs}';</script></div>";
  	exit;
}

// pega o primeiro usuário
$user = $users[0];

if (!$user['C_status'] === "ATIVO"){
  echo "<div><script>alert('Seu usuário está inativo, entre em contato com o suporte!');";
  echo "javascript:window.location='../../documentation/?docs={$docs}';</script></div>";
  exit;
}

$_SESSION['logged_in_cliente'] = true;
$_SESSION['id_c'] = $user['C_id'];
$_SESSION['nome_c'] = $user['C_nome'];
$_SESSION['email_c'] = $user['C_email'];
$_SESSION['status_c'] = $user['C_status'];
echo "<script>javascript:window.location='../../documentation/?docs={$docs}';</script>";
?>