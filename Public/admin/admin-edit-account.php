<?php
require_once('./../../vendor/autoload.php');

if (!isset($_SESSION) || !isset($_SESSION['tipo'])) {
    header('Location: ' . BASE_URL . 'index.php');

}

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
    <link rel="stylesheet" type="text/css" href="../web/css/userEditAccount.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">


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
                            <a class="nav-link active" href="admin.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-edit-account.php">Editar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="instituicoes.php">Aprovar Instituições</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="eventos.php">Aprovar Eventos</a>
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
                        <form class="mb-5" action="<?= BASE_URL . "controller/admin/atualizar.php" ?>" method="POST"
                              id="form_clienteatual">
                            <div class="form-group row">
                                <label for="inputUsuario" class="col-sm-2 col-form-label">Usuário: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputUsuario" name="usuario"
                                           value="<?= $_SESSION['dados']['usuario'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNome" class="col-sm-2 col-form-label">Nome: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNome" name="nome"
                                           value="<?= $_SESSION['dados']['nome'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSobrenome" class="col-sm-2 col-form-label">Sobrenome: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSobrenome" name="sobrenome"
                                           value="<?= $_SESSION['dados']['sobrenome'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputCPF" class="col-sm-2 col-form-label">CPF: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputCPF" name="cpf"
                                           value="<?= $_SESSION['dados']['cpf'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">E-mail: </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                           value="<?= $_SESSION['dados']['email'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNovaSenha" class="col-sm-2 col-form-label">Nova Senha: </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputNovaSenha" name="senha"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputConfSenha" class="col-sm-2 col-form-label">Confirme Senha: </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputConfSenha" name="conf_senha"
                                           placeholder="">
                                </div>
                            </div>
                            <button type="submit" name="bAtualizaAdmin" class="btn btn-primary">Atualizar</button>

                        </form>
                        <button type="submit" name="bRemoveAdmin" class="btn btn-primary"><a href="#"
                                                                                             onclick="confirmaExclusao('http://projeto.test/public_html/controller/admin/deletar.php')"
                                                                                             class="btn btn-primary">Excluir
                                Perfil</a></button>

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
        <span class="w-100 mr-4 text-muted text-right">Copyright &#9400; AC TICKETS</span>
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
        if (window.confirm("Confirma Exclusao do Perfil?")) window.location.href = url;
    }
</script>

</body>
</html>