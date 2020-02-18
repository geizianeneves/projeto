<?php require_once('./../../vendor/autoload.php');

if (!isset($_SESSION) || !isset($_SESSION['tipo'])) {
    header('Location: ' . BASE_URL . 'index.php');

}

use App\Model\Cidade\CidadeRepository;

$cidadeRepository = new CidadeRepository();

$eventoId = (int)$_GET['id'];

$eventoRepository = new \App\Model\Evento\EventoRepository();

/**
 * @var $evento \App\Model\Evento\Evento
 */
$evento = $eventoRepository->getById($eventoId);

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    .bg-nav, .footer {
        background-color: #171F2C !important;
    }

    .nav-link {
        color: #fff !important;
        margin: 10px 0;
    }

    .nav-link:hover {
        color: #ccc !important;
    }

    .mt-8 {
        margin-top: 8rem;
    }

    .center {
        margin: 0 auto;
    }

    .bg-light-blue {
        background-color: #283141 !important;
    }
</style>

<body class="d-flex flex-column h-100">
<?php
$cidades = $cidadeRepository->getList([], ["id", "nome", "estado_id"], true);
?>
<script>
    var cidades = <?= json_encode($cidades) ?>;

    function mudaEstado(componenteEstado, componenteCidade) {
        var estadoId = componenteEstado.value;

        /**
         * Remover todos os options do select de cidade
         */
        document.getElementById(componenteCidade).innerHTML = "";

        /**
         * Adicionar value default
         */
        var opt = document.createElement('option');
        opt.value = "";
        opt.innerHTML = "Selecione";
        document.getElementById(componenteCidade).appendChild(opt);

        for (var index in cidades) {
            var cidade = cidades[index];
            if (cidade.estado_id == estadoId) {
                var opt = document.createElement('option');
                opt.value = cidade.id;
                opt.innerHTML = cidade.nome;
                document.getElementById(componenteCidade).appendChild(opt);
            }
        }
    }
</script>
<main role="main" class="flex-shrink-0">

    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">

        <a class="navbar-brand text-danger" href="../index.php">AC TICKETS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnav"
                aria-controls="mainnav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainnav">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ATIVIDADES</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($atividades as $key => $atividade) { ?>
                            <a class="dropdown-item" name="<=$atividade->getCod()?>"
                               href="../produtos.php?atividade_id=<?= $atividade->getId() ?>"><?= $atividade->getNome() ?></a>
                        <?php } ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CURSOS</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($cursos as $key => $curso) { ?>
                            <a class="dropdown-item" name="<=$atividade->getCod()?>"
                               href="../produtos.php?curso_id=<?= $curso->getId() ?>"><?= $curso->getNome() ?></a>
                        <?php } ?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INSTITUIÇÕES</a>
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
                            <a class="nav-link active" href="../instituicao/instituicao.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../instituicao/instituicao-edit-account.php">Editar Perfil</a>
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
                <!--formatacao de como mensagem de cadastrado com sucesso vai ser exibida-->
                <?php if (isset($_GET["mensagem"])) : ?>
                    <div class="alert alert-dark d-flex justify-content-center" role="alert">
                    <?= $_GET["mensagem"] ?>
                    </div>
                <?php endif; ?>
                <div class="row">

                    <div class="col-12 p-5">
                        <form class="mb-5" action="<?= BASE_URL . "controller/evento/atualizar.php" ?>" method="POST"
                              id="form_eventoatual" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="nome" class="col-sm-2 col-form-label">Nome do Evento: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           value="<?= $evento->getNome() ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="banner">Banner: </label>
                                <div class="col-sm-10">
                                    <img src="<?= BASE_URL . 'media/banners/' . $evento->getBanner() ?>"
                                         alt="<?= $evento->getNome() ?>"/>
                                    <input type="file" class="form-control-file" id="banner" name="banner">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ticket">Ticket:</label>
                                <div class="col-sm-10">
                                    <img src="<?= BASE_URL . 'media/tickets/' . $evento->getTicket() ?>"
                                         alt="<?= $evento->getNome() ?>"/>
                                    <input type="file" class="form-control-file" id="ticket" name="ticket">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descricao">Descrição: </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control rounded-0" id="descricao" rows="10" maxlenght="300"
                                              name="descricao" required><?= $evento->getDescricao() ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="local" class="col-sm-2 col-form-label">Local: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="local" name="local"
                                           value="<?= $evento->getLocal() ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="logradouro" class="col-sm-2 col-form-label">Logradouro: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="logradouro" name="logradouro"
                                           value="<?= $evento->getLogradouro() ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bairro" class="col-sm-2 col-form-label">Bairro: </label>
                                <div class="col-sm-10">
                                    <input type="text" id="bairro" size="40" name="bairro"
                                           value="<?= $evento->getBairro() ?>" required>
                                    <input type="text" id="numero" name="numero"
                                           value="<?= $evento->getNumero() ?>" required>
                                    <input type="text" id="cep" name="cep"
                                           value="<?= $evento->getCep() ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eventoEstado">Estado: </label>
                                <div class="col-sm-10">
                                    <?php
                                    $estadoRepository = new \App\Model\Estado\EstadoRepository();
                                    $estados = $estadoRepository->getList([], ["id", "sigla"]);

                                    $cidadeId = $evento->getCidadeId();
                                    $cidadeDoCliente = $cidadeRepository->getById($cidadeId);
                                    $estadoId = $cidadeDoCliente->getEstadoId();
                                    ?>
                                    <select name="estado" id="id_estadoCli" class="form-control"
                                            onchange="mudaEstado(this,'id_cidadeCli')" required>
                                        <?php
                                        /**
                                         * @var $estado \App\Model\Estado\Estado
                                         */
                                        ?>
                                        <?php foreach ($estados as $key => $estado) { ?>
                                            <option value='<?= $estado->getId() ?>' <?php if ($estado->getId() === $estadoId) {
                                                echo "selected";
                                            } ?>><?= $estado->getSigla() ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eventoCidade">Cidade: </label>
                                <div class="col-sm-10">
                                    <?php
                                    $cidades = $cidadeRepository->getList(
                                        [
                                            [
                                                "field" => "estado_id",
                                                "condition" => "=",
                                                "value" => $estadoId
                                            ]
                                        ],
                                        [
                                            "id",
                                            "nome"
                                        ]
                                    );
                                    ?>
                                    <select name="cidade_id" id="id_cidadeCli" class="form-control" required>
                                        <?php foreach ($cidades as $cidade): ?>
                                            <option value="<?= $cidade->getId() ?>" <?php if ($cidade->getId() === (int)$cidadeId) {
                                                echo "selected";
                                            } ?>><?= $cidade->getNome() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eventoCurso">Curso: </label>
                                <div class="col-sm-10">
                                    <?php
                                    $cursoRepository = new \App\Model\Curso\CursoRepository();
                                    $cursos = $cursoRepository->getList([], ["id", "nome"]);
                                    $cursoId = $evento->getCursoId();

                                    ?>
                                    <select name="curso_id" id="id_curso" class="form-control" required>
                                        <?php
                                        /**
                                         * @var $curso \App\Model\Curso\Curso
                                         */
                                        ?>
                                        <?php foreach ($cursos as $key => $curso) { ?>
                                            <option value='<?= $curso->getId() ?>' <?php if ($curso->getId() === $cursoId) {
                                                echo "selected";
                                            } ?>><?= $curso->getNome() ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eventoCurso">Atividade: </label>
                                <div class="col-sm-10">
                                    <?php
                                    $atividadeRepository = new \App\Model\Atividade\AtividadeRepository();
                                    $atividades = $atividadeRepository->getList([], ["id", "nome"]);
                                    $atividadeId = $evento->getAtividadeId();

                                    ?>
                                    <select name="atividade_id" id="id_atividade" class="form-control" required>
                                        <?php
                                        /**
                                         * @var $atividade \App\Model\Atividade\Atividade
                                         */
                                        ?>
                                        <?php foreach ($atividades as $key => $atividade) { ?>
                                            <option value='<?= $atividade->getId() ?>' <?php if ($atividade->getId() === $atividadeId) {
                                                echo "selected";
                                            } ?>><?= $atividade->getNome() ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                            $date = new DateTime($evento->getDataHorario());
                            $dataInput = $date->format('Y-m-d\TH:i:s');
                            ?>
                            <div class="form-group row">
                                <label for="inputData" class="col-sm-2 col-form-label">Data e Horário: </label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" id="inputData" name="data_horario"
                                           value="<?= $dataInput ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDuracao" class="col-sm-2 col-form-label">Duração (em minutos): </label>
                                <div class="col-sm-10">
                                    <input type="text" id="inputDuracao" name="duracao" size="10"
                                           value="<?= $evento->getDuracao() ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="preco_normal" class="col-sm-2 col-form-label">Valor Inteira: </label>
                                <div class="col-sm-10">
                                    <input type="text" size="10" id="preco_normal" name="preco_normal"
                                           value="<?= $evento->getPrecoNormal() ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="valor_meia" class="col-sm-2 col-form-label">Valor Meia: </label>
                                <div class="col-sm-10">
                                    <input type="text" size="10" id="valor_meia" name="valor_meia"
                                           value="<?= $evento->getValorMeia() ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="vagas" class="col-sm-2 col-form-label">Vagas Disponíveis: </label>
                                <div class="col-sm-10">
                                    <input type="text" size="10" id="vagas" name="vagas"
                                           value="<?= $evento->getVagas() ?>" required>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $evento->getId() ?>"/>
                            <input type="hidden" class="form-control" id="inputEvStatus" name="ev_status">
                            <button type="submit" name="bAtualizaEvento" class="btn btn-primary">Atualizar</button>
                        </form>
                        <button type="submit" name="bRemoveEvento" class="btn btn-primary"><a href="#"
                                                                                              onclick="confirmaExclusao('http://projeto.test/public_html/controller/evento/deletar.php?id=<?= $eventoId ?>')"
                                                                                              class="btn btn-primary">Excluir
                                Evento</a></button>

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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    // var url = "http://projeto.test/public_html/controller/cliente/deletar.php";
    function confirmaExclusao(url) {
        if (window.confirm("Confirma Exclusao do Evento?")) window.location.href = url;
    }
</script>
</body>
</html>
