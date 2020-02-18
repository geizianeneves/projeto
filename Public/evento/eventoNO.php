<?php require_once('./../../vendor/autoload.php');
if (!isset($_SESSION) || !isset($_SESSION['tipo'])) {
header('Location: '. BASE_URL . 'index.php');

}

use App\Model\Cidade\CidadeRepository;

use App\Model\Estado\EstadoRepository;

use App\Model\Curso\CursoRepository;

use App\Model\Atividade\AtividadeRepository;

use App\Model\Evento\Evento;

use App\Model\Evento\EventoRepository;

$eventoRepository = new EventoRepository();

$evento = new Evento();

//$evento = $eventoRepository->getList([],["id","nome"]);

$nomeCity = new CidadeRepository();


$nomeState = new EstadoRepository();

$nomeCurso = new CursoRepository();

$nomeAtividade = new AtividadeRepository();

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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <style>
        .bg-nav, .footer {
            background-color: #171F2C!important;
        }
        .nav-link {
            color: #fff!important;
            margin: 10px 0;
        }
        .nav-link:hover {
            color: #ccc!important;
        }
        .mt-8 {
            margin-top: 8rem;
        }
        .center{
            margin:0 auto;
        }
        .bg-light-blue {
            background-color: #283141!important;
        }
   </style>   

<body class="d-flex flex-column h-100">
 <main role="main" class="flex-shrink-0">
    
<!--Navigation-->  
        <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
            
            <a class="navbar-brand text-danger" href="../index.php">AC TICKETS</a>
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
                                   href="../produtos.php?atividade_id=<?= $atividade->getId() ?>"><?= $atividade->getNome() ?></a>
                            <?php } ?>
                        </div>
                    </li>		

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CURSOS</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($cursos as $key => $curso) { ?>
                                <a class="dropdown-item" name="<=$atividade->getCod()?>"
                                   href="../produtos.php?curso_id=<?= $curso->getId() ?>"><?= $curso->getNome() ?></a>
                            <?php } ?>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INSTITUIÇÕES</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($instituicoes as $key => $instituicao) {
                                if ($instituicao->getInstStatus() == "1") {
                                    ?>
                                    <a class="dropdown-item" id="instituicao" href="../produtos.php?instituicao_id=<?= $instituicao->getId() ?>"><?= $instituicao->getNome() ?></a>
                                <?php }
                            }
                            ?>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTATO</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../termos_uso.php">TERMOS DE USO</a>
                    </li>
                </ul>
                
                <span class="nav-right">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../controller/logout.php">SAIR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../carrinho-vazio.php">CART</a>
                        </li>
                    </ul>
                </span>
                
            </div>
        </nav>
<!--END of Navigation-->

    <div class="container-fluid">
        <div class="row">
            
            <div class="container col-md-3 bg-light-blue mt-5 pt-5">
                <div class="row">
                    <!--<div class="col-12 text-center text-white py-3">
                    <h2><b><?php echo $_SESSION['nome']; ?></b></h2>
                    </div> -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="evento.php">Evento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="edit-evento.php">Editar Evento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../instituicao/instituicao-produto.php">Meus Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-evento.php">Incluir Evento</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container col-md-9 mt-5 pt-3">
                <div class="row">
                    
                    <div class="col-12 p-5">
                        <table class="table table-hover m-5 py-3">
                            <tbody>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Nome do Evento:</th>
                                <td><?=$eventoRepository->getList([],["nome"])?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Banner:</th>
                                <td><?= $_SESSION['dados']['banner'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Ticket:</th>
                                <td><?= $_SESSION['dados']['ticket'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Descrição:</th>
                                <td><?= $_SESSION['dados']['descricao'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Local:</th>
                                <td><?= $_SESSION['dados']['local'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Logradouro:</th>
                                <td><?= $_SESSION['dados']['logradouro'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Bairro:</th>
                                <td><?= $_SESSION['dados']['bairro'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Número:</th>
                                <td><?= $_SESSION['dados']['numero'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">CEP:</th>
                                <td><?= $_SESSION['dados']['cep'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Cidade:</th>
                                <td><?= $nomeCity->mostraNomeCidade($_SESSION['dados']['cidade_id']) ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Estado:</th>
                                <td><?= $nomeState->getEstadoNome($_SESSION['dados']['cidade_id']) ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Curso:</th>
                                <td><?= $nomeCurso->mostraNomeCurso($_SESSION['dados']['curso_id']) ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Atividade:</th>
                                <td><?= $nomeAtividade->mostraNomeAtividade($_SESSION['dados']['atividade_id']) ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Data e Horário:</th>
                                <td><?= $_SESSION['dados']['data_horario'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Duração (em minutos):</th>
                                <td><?= $_SESSION['dados']['duracao'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Valor Inteira:</th>
                                <td><?= $_SESSION['dados']['preco_normal'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Valor Meia:</th>
                                <td><?= $_SESSION['dados']['valor_meia'] ?></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Vagas Disponíveis:</th>
                                <td><?= $_SESSION['dados']['vagas'] ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <footer class="container-fluid footer mt-auto py-3">
        <div class="row">
            <ul class="nav p-3">
                <li class="nav-item">
                    <a class="nav-link " href="#">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../termos_uso.php">Termos de Uso</a>
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
            <span class="w-100 mr-4 text-muted text-right">Copyright &#9400; AC TICKETS <?= date('Y'); ?></span>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
