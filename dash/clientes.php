<?php 
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'config/init.php';

if(isLoggedIn()):
//abre a conexão
$PDO = db_connect();
//SQL para selecionar os registros
$sql = "SELECT * FROM CLIENTES ORDER BY C_id DESC";
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
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
              </ol>
            </nav>
            <div class="row">
              <div class="col-md-12">
                <h2>Clientes <span class="btn-add"><a href="novo.php?type=cliente"><i class="fas fa-plus"></i>
                      Cliente</a></span></h2>
                <table class="table table-bordered table-hover" id="tabela" data-page-length="25">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Empresa</th>
                      <th scope="col">Cargo</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                      <td><?php echo $cliente['C_nome']; ?></td>
                      <td><?php echo $cliente['C_empresa']; ?></td>
                      <td><?php echo $cliente['C_cargo']; ?></td>
                      <td>
                        <div class="actions">
                          <a href="editar.php?type=cliente&C_id=<?php echo $cliente['C_id']; ?>" title="Editar"><i
                              class="fas fa-edit"></i></a>
                          <?php if($cliente['C_status'] === "ATIVO"): ?>
                          <a class="ativo" href="query/cliente/status.php?action=inactive&C_id=<?php echo $cliente['C_id']; ?>"
                            onclick="return confirm('Tem certeza de que deseja inativar este cliente?');"
                            title="Ativar/Inativar"><i class="fas fa-check-circle"></i></a>
                          <?php else: ?>
                            <a href="query/cliente/status.php?action=active&C_id=<?php echo $cliente['C_id']; ?>"
                            onclick="return confirm('Tem certeza de que deseja ativar este cliente?');"
                            title="Ativar/Inativar"><i class="fas fa-check-circle"></i></a>
                          <?php endif; ?>
                          <a href="query/cliente/deletar.php?type=cliente&C_id=<?php echo $cliente['C_id']; ?>"
                            onclick="return confirm('Tem certeza de que deseja remover este cliente?');"
                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
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