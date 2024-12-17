<?php header_remove();

// inclui o arquivo de inicialização
require 'init.php';
$PDO = db_connect();

// resgata variáveis do formulário
$U_email = isset($_POST['email']) ? $_POST['email'] : '';
$U_senha = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($U_email) || empty($U_senha)){
  	echo "<div><script>alert('Informe usuário e senha');";
  	echo "javascript:window.location='../login.php';</script></div>";
  exit;
}

// cria o hash da senha
$U_senhaHash = make_hash($U_senha);

$sql = "SELECT * FROM USUARIOS WHERE U_email = :U_email AND U_senha = :U_senha";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':U_email', $U_email);
$stmt->bindParam(':U_senha', $U_senhaHash);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0){
  	echo "<div><script>alert('Usuário ou Senha incorreto!');";
  	echo "javascript:window.location='../login.php';</script></div>";
  	exit;
}

// pega o primeiro usuário
$user = $users[0];

$team_rel = $user['U_id'];

$sqlTeam = "SELECT * FROM TEAMS WHERE team_rel = :team_rel";
$stmtTeam = $PDO->prepare($sqlTeam);
$stmtTeam->bindParam(':team_rel', $team_rel);
$stmtTeam->execute();

$idRel = $stmtTeam->fetch(PDO::FETCH_ASSOC);

$_SESSION['logged_in'] = true;
$_SESSION['id'] = $user['U_id'];
$_SESSION['nome'] = $user['U_nome'];
$_SESSION['email'] = $user['U_email'];
$_SESSION['perfil'] = $user['U_perfil'];
$_SESSION['relTime'] = $idRel['team_rel'];
header('Location: ../index.php');
?>