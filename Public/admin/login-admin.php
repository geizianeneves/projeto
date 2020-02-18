<?php require_once('./../../vendor/autoload.php'); ?>

<?php
if (!isset($_SESSION) || !isset($_SESSION['tipo'])){

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
        <link rel="stylesheet" type="text/css" href="../web/css/login.css">
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
                            <a class="nav-link" href="../login.php">LOGIN/CADASTRO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../carrinho-vazio.php">CART</a>
                        </li>
                    </ul>
                </span>
                
            </div>
        </nav>
<!--END of Navigation-->
        <div class="container py-5 mt-5">
            <!--formatacao de como mensagem de cadastrado com sucesso vai ser exibida-->
                <?php if (isset($_GET["mensagem"])) : ?>
            <div class="alert alert-dark d-flex justify-content-center" role="alert">
            <?= $_GET["mensagem"] ?>
            </div>
                <?php endif; ?>
            <div class="row">
<!--LOGIN FORM-->
                <div class="col-md-6">
                    <div class="card border-0 p-5">
                    <div class="card-header text-center"><h2 class="mb-0">Login</h2></div>
                    <form class="mb-5" action="<?= BASE_URL . "controller/loginPost.php" ?>" method="POST" id="form_login">
                        <div class="form-group ">
                            <label for="loginUser">USUÁRIO</label>
                            <input type="text" class="form-control" id="loginUser" name="usuario" aria-describedby="loginUserHelp" placeholder="usuário" required>
                            <small id="loginUserHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword1">SENHA</label>
                            <input type="password" class="form-control" name="senha" id="loginPassword1" placeholder="********" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    </div>
                </div>
<!--END of LOGIN FORM-->

                <div class="col-md-6">
                    <div class="accordion pt-5" id="accordionlogin">

    <!--REGISTER FORM -->
                        <div class="card border-0">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="showForm('collapseOne')">Cadastro de Administrador</button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionlogin">
                                <div class="card-body">
    <!-- form-->               <form class="mb-5" action="<?= BASE_URL . "controller/admin/cadastrar.php" ?>" method="POST" id="form_admin">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="nome" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sobrenome">Sobrenome</label>
                                            <input type="text" name="sobrenome" class="form-control" id="sobrenome" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="usuario">Usuário</label>
                                            <input type="text" name="usuario" class="form-control" id="usuario" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="cpf">CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                                        </div>

                                        <div class="form-group ">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@email.com" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="senha">Senha</label>
                                            <input type="password" class="form-control" name="senha" id="senha" placeholder="********" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="conf_senha">Confirme a Senha</label>
                                            <input type="password" class="form-control" name="conf_senha" id="conf_senha" placeholder="Repetir senha" required>
                                        </div>
                                        <button type="submit" name="bRegistraAdmin" class="btn btn-primary">Registrar</button>
<!-- FIM FORM -->                 </form>
                                </div>
                            </div>
                        </div>
<!--END of REGISTER FORM 1-->


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
<?php
}
else if ($_SESSION['tipo'] === 1) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao.php');
}
else if ($_SESSION['tipo'] === 2) {
    header('Location: ' . BASE_URL . 'cliente/user.php');
}

else if ($_SESSION['tipo'] === 3) {
    header('Location: ' . BASE_URL . 'admin/admin.php');
}
?>