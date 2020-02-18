<?php require_once('./../vendor/autoload.php');

$eventosRepository = new \App\Model\Evento\EventoRepository();

$id = (int) $_GET['id'];

$eventos = new \App\Model\Evento\Evento();

$eventos = $eventosRepository->getById($id);
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
            
            <a class="navbar-brand text-danger" href="index.php">AC TICKETS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnav" aria-controls="mainnav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainnav">
                
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ATIVIDADES</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            /**
                             * @var $atividade \App\Model\Atividade\Atividade
                             */
                            ?>
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
                            <a class="nav-link" href="controller/logout.php">SAIR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="carrinho-vazio.php">CART</a>
                        </li>
                    </ul>
                </span>
                
            </div>
        </nav>
<!--END of Navigation-->

        <div class="container mt-8 mb-5">
            <div class="row justify-content-md-center">
            
            <div class="col-lg-5 bg-light p-4 m-2 border border-secondary">
                <h4 class="text-capitalize">1 - DADOS DE PAGAMENTO</h4>
                <p class="font-italic">Insira os dados</p>
                
                
                <div class="form-check my-4">
                    <input class="form-check-input" type="radio" name="radio" id="CARDO" value="option1" checked>
                    <img class="mx-2" src="web/img/icones/master.png" width="30" height="auto" alt="img"/>
                    <label class="form-check-label mx-2 text-danger" for="CARDO">CARTÃO</label>
                </div>
                <form>
                    <div class="form-row">
                        <div class="col-7">
                            <label for="text">Número do cartão</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-5">
                            <label for="text">Código de Segurança</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 my-4">
                        <img class="mx-2" src="web/img/icones/agro.png" width="30" height="auto" alt="img"/>
                        <img class="mx-2" src="web/img/icones/economia.png" width="30" height="auto" alt="img"/>
                        <img class="mx-2" src="web/img/icones/engenharia.png" width="30" height="auto" alt="img"/>
                        <img class="mx-2" src="web/img/icones/medicina.png" width="30" height="auto" alt="img"/>
                        <img class="mx-2" src="web/img/icones/sistemas.png" width="30" height="auto" alt="img"/>
                    </div>
                </form>
                
                <div class="row mt-3">
                        <div class="col-6">
                            Nome no cartão
                        </div>
                        <div class="col-6">
                           Validade
                        </div>
                </div>
                 <form>
                    <div class="form-row">
                        <div class="col-6">
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-3">
                            <select class="form-control" id="errere" required>
                                <option>Mês</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>

                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" id="dfdsfd" required>
                                <option>Ano</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                <option>2026</option>
                                <option>2027</option>
                                <option>2028</option>

                            </select>
                        </div>
                    </div>
                </form>
                
                  <form>
                    <div class="form-row mt-3">
                        <div class="col-12">
                            <label for="text">Número de Parcelas</label>
                            <select class="form-control" id="dfff" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>

                            </select>
                        </div>
                    </div>
                </form>
                
                
               
                
               
                
          </div>
                
            <div class="col-lg-5 bg-light p-4 m-2 border border-secondary">
                <h4 class="text-capitalize">2 - DADOS DE PAGAMENTO</h4>
                <div class="row">
                    <div class="col-7 text-danger">
                        Total De Items
                    </div>
                    <div class="col-5 text-right">
                        1 Unidade
                    </div>
                </div>
                <form class="my-3">
                    <div class="form-group">
                        <small id="somethingn" class="form-text text-muted">CUPOM DE DESCONTO</small>
                        <div class="row mt-2">
                            <div class="col-9 text-right">
                                <input type="text" class="form-control" id="something" aria-describedby="somethingn">
                            </div>                            
                            <div class="col-3 text-right">
                                <button type="submit" class="btn btn-danger">USAR</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row my-3">
                    <div class="col-7 border-bottom text-danger my-2">
                        SUBTOTAL
                    </div>
                    <div class="col-5 text-right border-bottom my-2">
                        R$ <?= $eventos->getPrecoNormal() ?>.00
                    </div>
                    <div class="col-7 border-bottom text-danger my-2">
                        FRETE
                    </div>
                    <div class="col-5 text-right border-bottom my-2">
                        R$ 0,00
                    </div>
                    <div class="col-7 font-weight-bold text-danger my-2">
                        TOTAL
                    </div>
                    <div class="col-5 text-right font-weight-bold my-2">
                        R$ <?= $eventos->getPrecoNormal() ?>.00
                    </div>
                    <button type="submit" class="btn btn-danger col-12" onclick="window.location.href='compra-finalizada.php?id=<?= $eventos->getId() ?>'">FINALIZAR COMPRA</button>
                </div>
                
                <small class="form-text text-muted"></small>
                
                <p class="text-danger my-3">  </p>
                
               
            </div>
            
            </div>
        </div><!--container-->
                
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