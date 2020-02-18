<?php

declare(strict_types = 1);

require_once('./../../../vendor/autoload.php');

use App\Model\Instituicao\InstituicaoRepository;
use App\Model\Instituicao\Instituicao;

$params = $_POST;
/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bRegistraInstituicao"]);
unset($params["estado"]);

$instituicaoRepository = new InstituicaoRepository();

if ($params["senha"] !== $params["conf_senha"]) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("SENHAS DIVERGENTES!"));
    return;
} else { //O campo conf_senha nao eh salvo no banco, podemos remover
    unset($params["conf_senha"]);
}
if (!$instituicaoRepository->isValidPhone($params["fone"])){
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("TELEFONE INVÁLIDO!"));
    return;
}

if (!filter_var($params["email"], FILTER_VALIDATE_EMAIL))
{
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("E-MAIL INVÁLIDO!"));
    return;
}

if (!$instituicaoRepository->isValidCep($params["cep"])) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("CEP INVÁLIDO!"));
    return;
}

if (!$instituicaoRepository->isvalidCNPJ($params["cnpj"])) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("CNPJ INVÁLIDO!"));
    return;
}

//count conta quantos itens existem dentro do array
$emails = $instituicaoRepository->getList([
    [
        'field' => 'email',
        'condition' => 'LIKE',
        'value' => $params["email"]
    ]
], ['id']);
if (count($emails) > 0) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("EMAIL JÁ CADASTRADO!"));
    return;
}

if (count($instituicaoRepository->getList([
        [
            'field' => 'cnpj',
            'condition' => 'LIKE',
            'value' => $params["cnpj"]
        ]
    ], ['id'])) > 0) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("CNPJ JÁ CADASTRADO!"));
    return;
}



$novaInstituicao = new Instituicao();
$novaInstituicao->setData($params);


$result = $instituicaoRepository->insert($novaInstituicao);

if ($result) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("Instituicao Cadastrada com Sucesso!"));
} else {
    echo "NAO CADASTROU";
}
