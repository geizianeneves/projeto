<?php
 include "template/header.php";
?>
    <div class="container mt-8">
        <!--Search Form-->
        <form class="col-lg12 center" method="post" action="">
                <div class="form-row text-center">
                    <div class="form-group col-md-2">
                        <select class="form-control" id="area" name="opcoes">
                            <option value="opcao1">opcao1</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <select class="form-control" id="atividade" name="atividade" aria-multiselectable="true">
                            <option value="opcao1"> opcao1</option>
                            <option value="opcao2">opcao2</option>
                            <option value="opcao3">opcao3</option>
                            <option value="opcao4">opcao4</option>
                            <option value="opcao5">opcao5</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="search" class="form-control" placeholder="Nome do Evento">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="search" class="form-control" placeholder="busca por cidade">
                    </div>
                    <div class="form-group col-md-2">
                        <select id="inputState" class="form-control">
                            <option value="">busca por data</option>
                            <option>Todas as datas</option>
                            <option>Hoje</option>
                            <option>Amanhã</option>
                            <option>Esta semana</option>
                            <option>Este Mês</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary">BUSCAR</button>
                    </div>
                </div>
        </form>
        <!--END of Search Form-->
        <!--Categories-->
        <div class="row col-lg-12 mt-5 pt-5">
            <div class="card center col-xl-2 col-md-4 col-6 border-0">
                <a href="categorias/economia.php">
                <img src="web/img/icones/economia.png" class="card-img-top rounded-circle mx-auto d-block" alt="..."
                     style="width: 150px; height:auto;">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-center">Economia</h5>
                </div>
            </div>

            <div class="card center col-xl-2 col-md-4 col-6 border-0">
                <a href="categorias/agro.php">
                <img src="web/img/icones/agro.png" class="card-img-top rounded-circle mx-auto d-block" alt="..."
                     style="width: 150px; height:auto;">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-center">Agronomia</h5>
                </div>
            </div>

            <div class="card center col-xl-2 col-md-4 col-6 border-0">
                <a href="categorias/engenharia.php">
                <img src="web/img/icones/engenharia.png" class="card-img-top rounded-circle mx-auto d-block" alt="..."
                     style="width: 150px; height:auto;">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-center">Engenharia</h5>
                </div>
            </div>

            <div class="card center col-xl-2 col-md-4 col-6 border-0">
                <a href="categorias/medicina.php">
                <img src="web/img/icones/medicina.png" class="card-img-top rounded-circle mx-auto d-block" alt="..."
                     style="width: 150px; height:auto;">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-center">Saúde</h5>
                </div>
            </div>

            <div class="card center col-xl-2 col-md-4 col-6 border-0">
                <a href="categorias/sistemas.php">
                <img src="web/img/icones/sistemas.png" class="card-img-top rounded-circle mx-auto d-block" alt="..."
                     style="width: 150px; height:auto;">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-center">Tecnologia</h5>
                </div>
            </div>
        </div>
        <!--END of Categories-->
    </div><!--container-->

    <div class="container-fluid">
        <div class="row my-5">

            <!--Feature Event-->
            <div class="slidefuture col-12 pt-2">
                <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <picture>
                                <img srcset="web/img/feature-slide/1.jpg" alt="responsive image" class="d-block w-100">
                            </picture>
                        </div>

                        <div class="carousel-item">
                            <picture>
                                <img srcset="web/img/feature-slide/2.jpg" alt="responsive image" class="d-block w-100">
                            </picture>
                        </div>

                        <div class="carousel-item">
                            <picture>
                                <img srcset="web/img/feature-slide/3.jpg" alt="responsive image" class="d-block w-100">
                            </picture>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
            <!--END of Feature Event-->
        </div>
    </div><!--container-->

    <!--Tickets for sale-->
    <div class="container pb-5">
        <div class="row my-5">
            <div class="col-md-6 col-lg-4 p-3">
                <div class="card">
                    <img src="web/img/ticket/1.png" class="card-img-top" alt="unoest">
                    <div class="card-body">
                        <h5 class="card-title">ENGENHARIA ELÉTRICA</h5>
                        <p class="card-text">Mini-curso de Engenharia Elétrica.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">UNOESTE</li>
                        <li class="list-group-item">PRESIDENTE PRUDENTE</li>
                        <li class="list-group-item">Data: 08/01/2020</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 p-3">
                <div class="card">
                    <img src="web/img/ticket/2.png" class="card-img-top" alt="unoest">
                    <div class="card-body">
                        <h5 class="card-title">MEDICINA CORPORATIVA</h5>
                        <p class="card-text">Mini-curso de Medicina Corporativa.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">USP</li>
                        <li class="list-group-item">SÃO PAULO</li>
                        <li class="list-group-item">Data: 12/01/2020</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 p-3">
                <div class="card">
                    <img src="web/img/ticket/3.png" class="card-img-top" alt="unoest">
                    <div class="card-body">
                        <h5 class="card-title">REDES E TOPOLOGIA</h5>
                        <p class="card-text">Palestra de Redes e Topologia.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">FATEC</li>
                        <li class="list-group-item">ADAMANTINA</li>
                        <li class="list-group-item"> Data: 17/01/2020</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 p-3">
                <div class="card">
                    <img src="web/img/ticket/1.png" class="card-img-top" alt="unoest">
                    <div class="card-body">
                        <h5 class="card-title">ENGENHARIA CIVIL</h5>
                        <p class="card-text">Mini-curso de Engenharia Civil.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">UNOESTE</li>
                        <li class="list-group-item">PRESIDENTE PRUDENTE</li>
                        <li class="list-group-item"> Data: 24/01/2020</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 p-3">
                <div class="card">
                    <img src="web/img/ticket/2.png" class="card-img-top" alt="unoest">
                    <div class="card-body">
                        <h5 class="card-title">AGRONOMIA</h5>
                        <p class="card-text">Palestra de Agronomia. </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">USP</li>
                        <li class="list-group-item">SÃO PAULO</li>
                        <li class="list-group-item"> Data: 07/02/2020</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 p-3">
                <div class="card">
                    <img src="web/img/ticket/3.png" class="card-img-top" alt="unoest">
                    <div class="card-body">
                        <h5 class="card-title">BANCO DE DADOS</h5>
                        <p class="card-text">Curso de Banco de Dados.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">FATEC</li>
                        <li class="list-group-item">PRESIDENTE PRUDENTE</li>
                        <li class="list-group-item"> Data: 13/02/2020</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">MAIS INFORMAÇÕES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include "template/footer.php";
?>