<?php require_once('./../../vendor/autoload.php');
if (!isset($_SESSION) || !isset($_SESSION['tipo'])) {
    header('Location: '. BASE_URL . 'index.php');

}
$instituicaoId = $_SESSION['dados']['id'];

$eventosRepository = new \App\Model\Evento\EventoRepository();

$eventos = $eventosRepository->getList([[
        'field' => 'instituicao_id',
        'condition' => '=',
        'value' => $instituicaoId
]], [
        'id',
        'nome',
        'descricao',
        'local',
        'data_horario',
        'curso_id',
        'ticket'
]);

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
        <link rel="stylesheet" type="text/css" href="../web/css/instituicaoProduto.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
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
                    <div class="col-12 text-center text-white py-3">
                        <h2><?= $_SESSION['dados']['nome'] ?></h2>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="instituicao.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="instituicao-edit-account.php">Editar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="instituicao-produto.php">Meus Eventos</a>
                        </li>
                        <li class="nav-item">
                            <?php if($_SESSION['dados']['inst_status']==1) { ?>
                                <a class="nav-link" href="../evento/add-evento.php">Incluir Evento</a>
                            <?php } else { ?>
                                <a class="nav-link" href="aprovacao.php">Incluir Evento</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            
            
            <div class="container col-md-9 mt-5 pt-3">
                <div class="row col-12 p-5">
                    <?php
                    /**
                     * @var $evento \App\Model\Evento\Evento
                     */
                    foreach ($eventos as $evento){
                        ?>
                        <div class="card mb-5 border-0">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= BASE_URL.'media/tickets/'.$evento->getTicket() ?>" class="card-img" alt="<?=$evento->getNome() ?>">
                            </div>
                            <div class="col-md-8">
                                    <div class="card-body">
                                    <h5 class="card-title"> Evento: <?= $evento->getNome() ?></h5>
                                    <p class="card-text"> Curso: <?= $cursoRepository->mostraNomeCurso($evento->getCursoId()) ?></p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Local: <?= $evento->getLocal() ?></li>
                                        <li class="list-group-item">Data e Horário: <?= $evento->getDataHorario()?> </li>
                                        <li class="list-group-item"> Descrição: <?= $evento->getDescricao() ?></li>
                                        <a href="<?= BASE_URL.'evento/edit-evento.php?id='.$evento->getId() ?>" class="btn btn-primary">EDITAR EVENTO</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

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