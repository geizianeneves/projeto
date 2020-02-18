<?php
include "../template/header2.php";
?>
    <div class="container-fluid">
        <div class="row">
            <div class="container col-md-3 bg-light-blue mt-5 pt-5">
                <div class="row"><!-- ROW 2-->
                    <div class="col-12 text-center text-white py-3">
                        <!--<h2>< $_SESSION['dados']['nome']?></h2>-->
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="admin.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-edit-account.php">Editar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Cadastrar Instituições</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="instituicoes.php">Aprovar Instituições</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Cadastrar Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="eventos.php">Aprovar Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Cadastrar Atividades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Cadastrar Areas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Cadastrar Cidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">Cadastrar Cliente</a>
                        </li>
                    </ul>
                </div><!-- FIM DIV ROW 2-->
            </div>
            <div class="container col-md-9 mt-5 pt-3">
                <div class="row">
                    <table class="table table-hover m-5 py-3">
                        <tbody>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Usuário:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Nome:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">Sobrenome:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">CPF:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold w-25" scope="row">E-mail:</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- FIM <div class="container col-md-9 mt-5 pt-3"> -->
        </div>
    </div>
<?php
include "../template/footer.php";
?>