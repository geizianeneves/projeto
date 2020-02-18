<?php require_once('./../../vendor/autoload.php'); ?>
<?php
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
 <div class="container mt-8">
<!--Search Form-->               
            <form class="col-lg12 center">
                <div class="form-row text-center">
                    <div class="form-group col-md-3">
                        <input type="search" class="form-control" placeholder="busca por evento">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="search" class="form-control" placeholder="busca por cidade">
                    </div>
                    <div class="form-group col-md-3">
                        <select id="inputState" class="form-control">
                            <option value="">busca por data</option>
                            <option>Todas as datas</option>
                            <option>Hoje</option>
                            <option>Amanhã</option>
                            <option>Esta semana</option>
                            <option>Este Mês</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary">BUSCAR</button>
                    </div>
                </div>
            </form>
     <br> <br>
     <h1 align="center"> ENGENHARIA </h1>
	  <div class="row col-lg-12 mt-5 pt-5">   
                <div class="card center col-xl-2 col-md-4 col-6 border-0">
					<a href="economia.php">
                        <img src="../web/img/icones/economia.png" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height:auto;">
					</a>
                    <div class="card-body">
                        <h5 class ="card-title text-center">Economia</h5>
                    </div>
                </div>

                <div class="card center col-xl-2 col-md-4 col-6 border-0">
					<a href="agro.php">
                        <img src="../web/img/icones/agro.png" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height:auto;">
					</a>
                    <div class="card-body">
                        <h5 class ="card-title text-center">Agronomia</h5>
                    </div>
                </div>

                <div class="card center col-xl-2 col-md-4 col-6 border-0">
					<a href="engenharia.php">
                        <img src="../web/img/icones/engenharia.png" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height:auto;">
					</a>
                    <div class="card-body">
                        <h5 class ="card-title text-center">Engenharia</h5>
                    </div>
                </div>

                <div class="card center col-xl-2 col-md-4 col-6 border-0">
					<a href="medicina.php">
                        <img src="../web/img/icones/medicina.png" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height:auto;">
					</a>
                    <div class="card-body">
                        <h5 class ="card-title text-center">Saúde</h5>
                    </div>
                </div>

                <div class="card center col-xl-2 col-md-4 col-6 border-0">
					<a href="sistemas.php">
                        <img src="../web/img/icones/sistemas.png" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height:auto;">
					</a>
                    <div class="card-body">
                        <h5 class ="card-title text-center">Tecnologia</h5>
                    </div>
                </div>
            </div>
	 
		
		
        <div class="container mt-5 pt-3">
            <div class="row col-12 p-5">
                 <div class="container pb-5">
            <div class="row my-5">

                <div class="col-md-6 col-lg-4 p-3">  
                    <div class="card">
                        <img src="../web/img/filtro/engenharia1.jpg" class="card-img-top" alt="unoest">
                        <div class="card-body">
                            <h5 class="card-title">ENGENHARIA AGRÍCOLA</h5>
                            <p class="card-text">Mini-curso de Engenharia Agrícola.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">FATEC</li>
                            <li class="list-group-item">PRESIDENTE PRUDENTE</li>
                            <li class="list-group-item">Data: 21/12/2019</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-3">  
                    <div class="card">
                        <img src="../web/img/filtro/engenharia1.jpg" class="card-img-top" alt="unoest">
                        <div class="card-body">
                            <h5 class="card-title">ENGENHARIA CIVIL</h5>
                            <p class="card-text">Palestra de Engenharia Civil.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">USP</li>
                            <li class="list-group-item">SÃO PAULO</li>
                            <li class="list-group-item">Data: 07/01/2020</li>
                        </ul>
                        <div class="card-body">
                              <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-3">  
                    <div class="card">
                        <img src="../web/img/filtro/engenharia1.jpg" class="card-img-top" alt="unoest">
                        <div class="card-body">
                            <h5 class="card-title">ENGENHARIA ELÉTRICA</h5>
                            <p class="card-text">Palestra de Engenharia Elétrica.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">FATEC</li>
                            <li class="list-group-item">SÃO PAULO</li>
                            <li class="list-group-item"> Data: 18/01/2020</li>
                        </ul>
                        <div class="card-body">
                              <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-3">  
                    <div class="card">
                         <img src="../web/img/filtro/engenharia1.jpg" class="card-img-top" alt="unoest">
                        <div class="card-body">
                            <h5 class="card-title">ENGENHARIA MECANICA</h5>
                            <p class="card-text">Curso de Engenharia Mecanica.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">UNOESTE</li>
                            <li class="list-group-item">PRESIDENTE PRUDENTE</li>
                            <li class="list-group-item"> Data: 29/01/2020</li>
                        </ul>
                        <div class="card-body">
                              <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-3">  
                    <div class="card">
                        <img src="../web/img/filtro/engenharia1.jpg" class="card-img-top" alt="unoest">
                        <div class="card-body">
                            <h5 class="card-title">ENGENHARIA CIVIL</h5>
                            <p class="card-text">Mini-curso de Engenharia Civil. </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">UNIP</li>
                            <li class="list-group-item">ASSIS</li>
                            <li class="list-group-item"> Data: 09/02/2020</li>
                        </ul>
                        <div class="card-body">
                              <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                        </div>
 					</div>
                   </div>

                <div class="col-md-6 col-lg-4 p-3">  
                    <div class="card">
                        <img src="../web/img/filtro/engenharia1.jpg" class="card-img-top" alt="unoest">
                        <div class="card-body">
                            <h5 class="card-title">ENGENHARIA TÉCNICA</h5>
                            <p class="card-text">Mini-curso de Engenharia Técnica.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">FATEC</li>
                            <li class="list-group-item">PRESIDENTE PRUDENTE</li>
                            <li class="list-group-item"> Data: 15/02/2020</li>
                        </ul>
                        <div class="card-body">
                              <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                        </div>
                    </div>
                </div>		
                    </div>
            
            </div>
        </div><!--container-->
				
				

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