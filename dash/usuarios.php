<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);
include 'config/init.php';

if(isLoggedIn()):
//abre a conexão
$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT * FROM USUARIOS ORDER BY U_id DESC";
//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();

include 'includes/header.php'; ?>
<main>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <?php include 'includes/sidebar.php'; ?>
        <div class="col-md-10">
          <div class="conteudo">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
              </ol>
            </nav>
            <div class="row">
              <div class="col-md-12">
                <h2>Usuários <span class="btn-add"><a href="novo.php?type=usuario"><i class="fas fa-plus"></i>
                      Usuário</a></span></h2>
                <table class="table table-bordered table-hover" id="tabelaUsers" data-page-length="25">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Cargo</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                      <td><?php echo $user['U_nome']; ?></td>
                      <td><?php echo $user['U_cargo']; ?></td>
                      <td><?php echo $user['U_email']; ?></td>
                      <td>
                        <div class="actions">
                          <a href="editar.php?type=usuario&U_id=<?php echo $user['U_id']; ?>" title="Editar"><i class="fas fa-edit"></i></a>
                          <a href="query/usuario/deletar.php?type=usuario&U_id=<?php echo $user['U_id']; ?>" onclick="return confirm('Tem certeza de que deseja remover este usuário?');" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php 
include 'includes/footer.php';
else:
header('Location: login.php');
endif;
?>