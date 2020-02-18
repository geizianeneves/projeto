<?php
include "template/header.php";
/*$cidade = new \App\Model\Cidade\CidadeRepository();
$cidades = $cidade->getList([], ["id", "nome", "estado_id"], true);
*/
?>
<script>
    /*var cidades = <= json_encode($cidades) ?>;

    function mudaEstado(componenteEstado, componenteCidade) {
        var estadoId = componenteEstado.value;

        /**
         * Remover todos os options do select de cidade
         */
        //document.getElementById(componenteCidade).innerHTML = "";

        /**
         * Adicionar value default
         */
        //var opt = document.createElement('option');
        //opt.value = "";
        //opt.innerHTML = "Selecione";
        //document.getElementById(componenteCidade).appendChild(opt);

        //for (var index in cidades) {
            //var cidade = cidades[index];
            //if (cidade.estado_id == estadoId) {
                //var opt = document.createElement('option');
                //opt.value = cidade.id;
                //opt.innerHTML = cidade.nome;
                //document.getElementById(componenteCidade).appendChild(opt);
       //     }
       // }
    //}*/
</script>
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
<!--REGISTER FORM 1 Cliente -->
                    <div class="card border-0">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="showForm('collapseOne')">Cadastro de Usuário</button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionlogin">
                            <div class="card-body">
<!-- form-->               <form class="mb-5" action="<?= BASE_URL . "controller/cliente/cadastrar.php" ?>" method="POST" id="form_cliente">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" name="nome" class="form-control" id="nome" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="usuario">Usuário</label>
                                        <input type="text" name="usuario" class="form-control" id="usuario" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fone">Telefone</label>
                                        <input type="text" class="form-control" name="fone" id="fone" required>
                                    </div>
                                    <div class="form-group">
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" name="cep" id="cep" required>
                                    </div>
                                        <label for="logradouro">Endereço</label>
                                        <input type="text" class="form-control" name="logradouro" id="logradouro" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control"  name="numero" id="numero" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="clienteEstado">Selecione um Estado</label>
                                            <!-- <php
                                                $estadoRepository = new \App\Model\Estado\EstadoRepository();
                                                $estados = $estadoRepository->getList([], ["id", "sigla"]);
                                            > -->
                                            <select name="estado" id="id_estadoCli" class="form-control" onchange="mudaEstado(this,'id_cidadeCli')" required>
                                                <option value="0" selected="selected">Estados</option>
                                                <?php
                                                /**
                                                 * @var $estado \App\Model\Estado\Estado
                                                 */
                                                ?>
                                                <?php foreach($estados as $key => $estado) {?>
                                                <option value='<?= $estado->getId() ?>'><?= $estado->getSigla() ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                            <div class="form-group col-6">
                                                <label for="clienteCidade">Selecione uma Cidade</label>
                                                <select name="cidade_id" id="id_cidadeCli" class="form-control" required>
                                                </select>
                                            </div>
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
                                    <div class="form-group">
                                        <label id="lbl_politica_privacidade" for="politica_privacidade">
                                            <input id="politica_privacidade" type="checkbox" required>
                                            Li e concordo com a <a class="btn_link_politica_privacidade" href="termos_uso.php" target="_blank">Politica de Privacidade</a>
                                        </label>
                                    </div>
                                    <button type="submit" name="bRegistraCliente" class="btn btn-primary">Registrar</button>
<!-- FIM FORM -->                 </form>
                            </div>
                        </div>
                    </div>
<!--END of REGISTER FORM 1-->
<!--REGISTER FORM 2-->
                    <div class="card border-0">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick="showForm('collapseTwo')">Cadastro de Instituição</button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionlogin">
                            <div class="card-body">
<!-- Inicio do form-->               <form class="mb-5"  action="<?= BASE_URL . "controller/instituicao/cadastrar.php" ?>" method="POST" id="form_instituicao">
                                    <div class="form-group">
                                        <label for="nome">Nome da Instituição</label>
                                        <input type="text" class="form-control" name="nome" id="nome" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="usuario">Usuário</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="fone">Telefone</label>
                                        <input type="text" class="form-control" name="fone" id="fone" required>
                                    </div>
                                    <div class="form-group">
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" name="cep" id="cep" required>
                                    </div>
                                        <label for="logradouro">Endereço</label>
                                        <input type="text" class="form-control" name="logradouro" id="logradouro" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" name="numero" id="numero" required>
                                    </div>
                               <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="InstituicaoEstado">Selecione um Estado</label>
                                            <select name="estado" id="id_estadoCli_instituicao" class="form-control" onchange="mudaEstado(this, 'id_cidadeCli_instituicao')" required>
                                                <option value="0" selected="selected">Estados</option>
                                                <?php
                                                /**
                                                 * @var $estado \App\Model\Estado\Estado
                                                 */
                                                ?>
                                                <?php foreach($estados as $key => $estado) {?>
                                                    <option value='<?= $estado->getId() ?>'><?= $estado->getSigla() ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                       <div class="form-group col-6">
                                           <label for="clienteCidade">Selecione uma Cidade</label>
                                           <select name="cidade_id" id="id_cidadeCli_instituicao" class="form-control" required>
                                           </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnpj">CNPJ</label>
                                        <input type="text" class="form-control" name="cnpj" id="cnpj" required>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@email.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="senha">Senha</label>
                                        <input type="password" class="form-control" name="senha" id=senha" placeholder="********" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="conf_senha">Confirme a senha</label>
                                        <input type="password" class="form-control" name="conf_senha" id="conf_senha" placeholder="Repetir senha" required>
                                    </div>
                                    <hr/>
                                    <h6 style="text-align: center"> Instituição Contato</h6>
                                    <hr/>
                                    <div class="form-group">
                                        <label for="con_nome">Nome</label>
                                        <input type="text" class="form-control" id="con_nome" name="con_nome" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome">Sobrenome</label>
                                        <input type="text" class="form-control" name="sobrenome" id="sobrenome" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" name="cpf" id="cpf" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control" name="celular" id="celular" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl_politica_privacidade" for="politica_privacidade">
                                            <input id="politica_privacidade" type="checkbox" required>
                                            Li e concordo com a <a class="btn_link_politica_privacidade" href="termos_uso.php" target="_blank">Politica de Privacidade</a>
                                        </label>
                                    </div>
                                    <button type="submit" name="bRegistraInstituicao" class="btn btn-primary">Registrar</button>
   <!-- fim form-->             </form>
                            </div>
                        </div>
                    </div>
<!--END of REGISTER FORM 2-->
                </div>
            </div>
        </div><!--End row-->
    </div><!--END of class="container"-->
    </main>
<?php

include "template/footer.php";

/*if ($_SESSION['tipo'] === 1) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao.php');
}
else if ($_SESSION['tipo'] === 2) {
    header('Location: ' . BASE_URL . 'cliente/user.php');
}
else if ($_SESSION['tipo'] === 3) {
    header('Location: ' . BASE_URL . 'admin/admin.php');
}*/
?>