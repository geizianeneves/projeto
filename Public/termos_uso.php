<?php require_once('./../vendor/autoload.php');
$atividadeRepository = new \App\Model\Atividade\AtividadeRepository();
$atividades = $atividadeRepository->getList([], ["id", "nome"]);

$instituicaoRepository = new \App\Model\Instituicao\InstituicaoRepository();
$instituicoes = $instituicaoRepository->getList([], ["id", "nome", "inst_status"]);

$cursoRepository = new \App\Model\Curso\CursoRepository();
$cursos = $cursoRepository->getList([], ["id", "nome"]);
?>
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="web/css/termos.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>   
<body class="d-flex flex-column h-100">
    <main role="main" class="flex-shrink-0">
    
<!--Navigation-->  
        <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
            
            <a class="navbar-brand text-danger" href="index.php">AC TICKETS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnav" aria-controls="mainnav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainnav">
                
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ATIVIDADES</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($atividades as $key => $atividade) { ?>
                                <a class="dropdown-item" name="<=$atividade->getCod()?>"
                                   href="produtos.php?atividade_id=<?= $atividade->getId() ?>"><?= $atividade->getNome() ?></a>
                            <?php } ?>
                        </div>
                    </li>       

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CURSOS</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($cursos as $key => $curso) { ?>
                                <a class="dropdown-item" name="<=$atividade->getCod()?>"
                                   href="produtos.php?curso_id=<?= $curso->getId() ?>"><?= $curso->getNome() ?></a>
                            <?php } ?>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INSTITUIÇÕES</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($instituicoes as $key => $instituicao) {
                                if ($instituicao->getInstStatus() == "1") {
                                    ?>
                                    <a class="dropdown-item" id="instituicao" href="produtos.php?instituicao_id=<?= $instituicao->getId() ?>"><?= $instituicao->getNome() ?></a>
                                <?php }
                            }
                            ?>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTATO</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="termos_uso.php">TERMOS DE USO</a>
                    </li>
                </ul>
                
                <span class="nav-right">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">LOGIN/CADASTRO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="carrinho-vazio.php">CART</a>
                        </li>
                    </ul>
                </span>
            </div>
        </nav>
<!--END of Navigation-->
        <div class="container py-5 mt-5"> 
          <h3> <center> Termos de Uso - AC Tickets </center></h3> <br> <br>
            <div class="row">
                <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              1.Objetivo
                            </button>
                          </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <p>Bem-Vindo(a) à AC Tickets! Agradecemos a preferência!</p>
                            <p>Somos uma plataforma que presta serviços para a comunidade acadêmica, contamos com uma aplicação web, para a gestão da venda e compra de ingressos para eventos acadêmicos. </p>
                            <p>O nome surgiu a partir dos termos em inglês: "Academic" (que traduzido, significa "Acadêmico"), e "Tickets" (que traduzido, significa "Ingressos").</p>
                            <p>Os termos de uso a seguir visam atender adequadamente todas as partes, trazem as condiçōes para acesso e utilização da plataforma como também todas as suas funcionalidades. Ao aceitar os termos você assegura que efetuou a leitura completa e está atento(a) aos regulamentos do site.</p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">        2. Informações Gerais
                            </button>
                          </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          <div class="card-body">
                            <p>2.1 Os termos abaixo definem os serviços que a plataforma AC Tickets oferece:</p>
                            <p>A)  Dispõe de uma solução através de recursos tecnológicos para que todas as instituições possam divulgar, organizar, e principalmente gerir de maneira eficiente seus eventos.</p>
                            <p>B)  Publicar eventos, assim como o compartilhamento nas mídias sociais a partir da plataforma.</p>
                            <p>C)  Facilitar os procedimentos de venda, compra de ingressos cadastrados pelos usuários organizadores.</p>
                            <p>D)  Hospedar os eventos inseridos na plataforma.</p><br>
                            <p>2.2  Os eventos (produtos) da plataforma, quando cadastrados, serão de responsabilidade da instituição e dos usuários organizadores, que serão incumbidos de estabelecer as condições para a ocorrência das vendas e o cancelamento delas. A AC Tickets não se responsabiliza por criar os eventos ou pelas condições de suas vendas, por não ser parte da organização. A plataforma se responsabiliza pela postagem dos eventos no site, e estabelece as práticas de suas políticas gerais.</p>
                            <p>2.3  Em caso de indisponibilidade, a plataforma buscará solucionar os problemas de forma rápida para que os serviços sejam restabelecidos, dentro dos recursos e limitações que possui.</p>
                            <p>2.4   Os usuários que utilizam a plataforma, tanto os que cadastrarão eventos como os que comprarão os mesmos isentam  a AC Tickets de qualquer anomalia, completa ou parcial que possa ocorrer nos serviços decorrentes a falta temporária de energia, falha dos serviços oferecidos, serviços indisponíveis, falha na hospedagem ou qualquer irregularidade que possa ocorrer no meio interno ou externo.</p>
                            <p>2.5  A plataforma se encarregará de divulgar eventuais processos de manutenção, com antecedência. A fim de não prejudicar as instituições cadastradas. E fará através do e-mail de suporte ou outras comunicações disponíveis. </p>
                            <p>2.6  A plataforma só aceitará cadastro de instituições acadêmicas de deferentes níveis e de deferentes eventos e os mesmos serão analisados pelos administradores da plataforma.</p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">      3. Cadastro de usuários - Clientes </li></ol> 
                            </button>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body">
                            <p>3.1 O registro dos usuários será efetuado de forma gratuita e os serviços a qual o mesmo se interessar pode ter um custo que será estabelecido com a instituição organizadora e os regulamentos tangíveis.</p>
                            <p>3.2 O usuário (cliente) deve informar os dados verídicos e exatos, o mesmo assume o compromisso de atualizá-los quando necessário, caso as informações não forem verdadeiras a plataforma analisará e poderá cancelar a inscrição do mesmo, ou cancelar qualquer serviço que o mesmo tenha se envolvido. Caso seja cadastrado algum usuário com perfil falso, o mesmo poderá ser considerado crime de falsidade ideológica ou estelionato garantidos por lei.</p>
                            <p>3.3 O cadastro só ocorrerá quando o usuário informar os dados solicitados e concordar com os termos de uso, caso o mesmo não concorde, o cadastro não será realizado.</p>
                          </div>
                        </div>
                      </div>
                    <!--Coisa 2 --->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    4. Cadastro de usuários - Instituições </li></ol>
                                </button>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>4.1 O registro das instituições será efetuado de forma gratuita e deverá ser feito pelo responsável pelos eventos da instituição.</p>
                                <p>4.2 A instituição cadastrará os seus dados e os dados dos colaboradores do evento para que possa utilizar a plataforma, e após o cadastro a mesma aguardará um prazo máximo de até 48 horas para a comprovação ou negação do cadastro.</p>
                                <p>4.3 A instituição poderá cadastrar quantos eventos precisar, a plataforma dará suporte a todas elas, porém, todos os eventos serão autorizados da mesma maneira que o cadastro da instituição e dos colaboradores, também em um prazo máximo de 48 horas.
                                O evento terá uma data limite para cadastro, em até no máximo uma semana antes de seu acontecimento. </p>
                                <p>4.4 Os dados da instituição e dos usuários colaboradores devem ser informados e eles devem ser verídicos, o mesmo assume o compromisso de atualizá-los quando necessário, caso as informações não forem verdadeiras a plataforma analisará e poderá cancelar a inscrição do mesmo, ou cancelar qualquer serviço que o mesmo tenha se envolvido, desde os eventos como o próprio cadastro. Caso seja cadastrada alguma instituição com perfil falso, o mesmo poderá ser considerado crime de falsa identidade, falsidade ideológica ou estelionato garantidos por lei.</p>
                                <p>4.5 O cadastro só ocorrerá quando o usuário da instituição informar os dados solicitados e concordar com os termos de uso, caso o mesmo não concorde, o cadastro não será realizado.</p>
                                <p>4.6 A instituição deverá informar caso haja algum problema ou a mesma não conseguir cadastrar algo na plataforma.</p>
                                <p>4.7 A instituição ficará responsável por todos os atos do evento, desde o cadastro do mesmo, formas de pagamento, preços e tudo o que envolva a venda.</p>
                                <p>4.8 A instituição passará por uma avaliação de cadastro, verificação se os dados informados são verídicos e se os eventos, estão de acordo com as diretrizes e regras deste termo de uso.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">   5. Responsabilidades e Obrigações dos Consumidores
                                </button>
                              </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>5.1. Todos os consumidores devem utilizar a plataforma de maneira ética e de forma responsável se adequando ao termos estabelecidos pela plataforma.</p>
                                <p>5.2 Os consumidores devem realizar todas as atividades abaixo corretamente:</p>
                                <p>a) Inserir dados corretos, completos e atualizados no cadastro. Senão o mesmo poderá ser invalidado.</p>
                                <p>b) Os usuários deverão arcar com os valores cobrados dos ingressos, e deverão respeitar as formas de pagamento.</p>
                                <p>c) As instituições deverão reembolsar os compradores caso o evento seja cancelado ou até mesmo se o cliente deseja cancelar o pedido dentro do prazo estabelecido pelo estatuto do consumidor. </p>
                                <p>d) Os clientes poderão comprar os ingressos somente através da plataforma, pois a mesma não garante o recebimento e pagamento com outros profissionais ou até mesmo em outros pontos autorizados.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree"> 6. Entrega e Utilização de Ingressos
                                </button>
                              </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>6.1. Todos os ingressos comprados através da plataforma serão enviados ao e-mail do cliente que realizar o pagamento. </p>
                                <p>6.2 É de responsabilidade do cliente verificar no e-mail a chegada do ingresso. Caso não chegue o e-mail no prazo máximo de 48 horas o cliente poderá solicitar o mesmo no site.</p>
                                <p>6.3 Os Ingressos serão enviados pelos meios eletrônicos e também poderão ser acessados na área do cliente quando logado na plataforma. </p>
                                <p>6.3. Os ingressos são associados a um código alfanumérico único, representado em algarismos, “QR Code” e Código de Barras (exclusivamente no formato PDF). Após o recebimento, caberá ao Consumidor mantê-lo em segurança, não divulgando-o publicamente, sobretudo em redes sociais, ou permitindo o acesso de terceiros a ele.</p>
                                <p>6.5. O check-in do ingresso deverá ser realizado pela instituição pois a mesma tem o interesse de saber quem compareceu aos eventos.</p>
                                <p>6.6 Somente os alunos que comparecerem receberão o certificado do evento.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree"> 7. Vendas de Ingressos
                                </button>
                              </h5>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>7.1. O processo de pagamento começa assim que os eventos são adicionados ao carrinho de compras, o consumidor (cliente) deverá escolher a forma de pagamento e preencher corretamente os dados e depois finalizar o pedido.</p>
                                <p>7.2 Após a confirmação de aprovação do pagamento, que poderá ser feita por intermediário financeiro, a instituição deverá verificar se os valores estão sendo creditados corretamente na conta cadastrada, pois o dinheiro do evento não será passado para a plataforma e sim encaminhado diretamente para a instituição de destino. </p>
                                <p>7.3 Para maior segurança, as compras realizadas utilizando cartão de crédito que necessitem de confirmação ou validação adicional poderão passar pelo processo de análise aprofundada.</p>
                                <p>7.4 Caso ocorra o pagamento efetivo do ingresso, o cliente (consumidor) receberá o QRcode do ingresso, e caso o pagamento não ocorra o consumidor será notificado.</p>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseThree"> 8. Cancelamento e Reembolso de Transações
                                </button>
                              </h5>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <p>8.1. A plataforma permite que o cliente peça reembolso do ingresso dentro do prazo de 7 dias corridos após o pagamento, neste caso o cliente receberá o reembolso pela instituição bancária.</p>
                                <p>8.2 É de responsabilidade do Consumidor informar por qual evento e qual ingresso o mesmo deseja ser reembolsado. </p>
                                <p>8.3 Somente o cliente que comprou os ingressos pode pedir reembolso, caso contrário o participante do evento não poderá pedir qualquer tipo de alteração ou cancelamento. </p>
                                <p>8.4 Caso seja necessário reembolsar Consumidores, o usuário que contatou o site AC Tickets deverá, necessariamente, fazê-lo através da plataforma, e exclusivamente por ela.</p>
                                <p>8.5 O cliente que comprar os ingressos será responsável por qualquer equívoco ou atraso no cadastramento dos dados bancários para reembolso dos valores.</p>
                                <p>8.6 Se um evento que foi cadastrado não ocorrer, o cliente terá direito ao reembolso, e a plataforma se resguarda o direito de reembolsar todas as compras ou mesmo suspender, provisoriamente, o valor do repasse até que a situação esteja regularizada entre todas as partes envolvidas na transação.</p>
                              </div>
                            </div>
                          </div>
                        </div>
            </div><!--End row-->
        </div><!--END of class="container"-->
        
    </main>

    <footer class="container-fluid footer mt-auto py-3">
        <div class="row">
            <ul class="nav p-3">
                <li class="nav-item">
                    <a class="nav-link " href="#">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="termos_uso.php">Termos de Uso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre Nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">E-mail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chat</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <span class="w-100 mr-4 text-muted text-right">Copyright &#9400; AC TICKETS</span>
        </div>
    </footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>