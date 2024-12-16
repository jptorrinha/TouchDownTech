<?php 
include 'config/init.php';
if(isLoggedIn()):
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
                  <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
              </nav>
              <div class="row">
                <div class="col-md-12">
                  <h2>Conheça a First Tech</h2>
                  <p>Estamos há mais de 27 anos no mercado de serviços e soluções em tecnologia da informação, com
                    serviços em desenvolvimento e implantação de projetos dedicados em infraestrutura de colaboração,
                    segurança digital, criptografia para meios de pagamento e proteção de dados.</p>
                  <br>
                  <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item"
                      src="https://www.youtube.com/embed/q8zabLNiqK4" title="YouTube video player" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
                  </div>
                  <br>
                  <p>São 27 anos no mercado de integração de soluções de tecnologia com destaque para serviços
                    especializados em consultoria, implementação e manutenção de ambientes críticos. Temos posição de
                    liderança nas áreas de segurança e colaboração corporativa, posição essa conquistada graças à
                    excelência no relacionamento com clientes – antecipando suas necessidades –, com os colaboradores –
                    promovendo um ambiente de crescimento e evolução profissional – e com os parceiros – garantindo a
                    qualidade da entrega com confiabilidade.</p>

                  <p>Em 2019 reposicionamos nossa estratégia com foco em serviços; investimos em infraestrutura com
                    datacenter, NOC e SNOC operando 24x7x365, sala cofre para suporte às soluções de segurança e
                    proteção de transações financeiras. Oferecemos soluções completas, incluindo modalidades as a
                    services, cloud, consultoria, treinamento, monitoramento e desenvolvimento de aplicações dedicadas
                    ao negócio do cliente.</p>
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