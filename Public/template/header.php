<?php
require_once('./../vendor/autoload.php');
/*if (!isset($_SESSION) || !isset($_SESSION['tipo'])) {
    header('Location: '. BASE_URL . 'index.php');
}
/*
$atividadeRepository = new \App\Model\Atividade\AtividadeRepository();
$atividades = $atividadeRepository->getList([], ["id", "nome"]);

$instituicaoRepository = new \App\Model\Instituicao\InstituicaoRepository();
$instituicoes = $instituicaoRepository->getList([], ["id", "nome", "inst_status"]);

$cursoRepository = new \App\Model\Curso\CursoRepository();
$cursos = $cursoRepository->getList([], ["id", "nome"]);
*/
?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../web/css/estilosite.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
<main role="main" class="flex-shrink-0">
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
        <a class="navbar-brand text-danger" href="index.php">AC TICKETS</a>
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
                        <!--<php foreach ($atividades as $key => $atividade) { > -->
                            <a class="dropdown-item" name="<=$atividade->getCod()?>"
                               href="produtos.php?atividade_id="></a>
                        <!-- <php } ?> <= $atividade->getId() ?>"><= $atividade->getNome() ?> -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CURSOS</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <!--  <php foreach ($cursos as $key => $curso) { ?> -->
                            <a class="dropdown-item" name="<=$atividade->getCod()?>"
                               href="produtos.php?curso_id="></a>
                        <!-- <php } ?> <= $curso->getId() ?>"><= $curso->getNome() >-->
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INSTITUIÇÕES</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!--<php foreach ($instituicoes as $key => $instituicao) {
                            if ($instituicao->getInstStatus() == "1") {
                                ?> -->
                                <a class="dropdown-item" id="instituicao" href="produtos.php?instituicao_id="></a>
                            <!-- <php }
                        }
                        ?> <= $instituicao->getId() ?>"><= $instituicao->getNome() > -->
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