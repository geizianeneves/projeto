<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Instituicao\InstituicaoRepository;
use App\Model\Instituicao\Instituicao;

$params = $_POST;


/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bAtualizaInstituicao"]);
unset($params["estado"]);

$instituicaoRepository = new InstituicaoRepository();

if ($params["senha"] !== "" || $params["conf_senha"] !== "") {

    if ($params["senha"] !== $params["conf_senha"]) {
        header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("SENHAS DIVERGENTES!"));
        return;
    }
}
unset($params["conf_senha"]);


if (!$instituicaoRepository->isValidPhone($params["fone"])) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("TELEFONE INVÁLIDO!"));
    //nao preciso do return pq o header ja vai me redirecionar para outra pagina, nao vai executar o codigo abaixo
    return;
}

if (!filter_var($params["email"], FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("E-MAIL INVÁLIDO!"));
    return;
}

if (!$instituicaoRepository->isValidCep($params["cep"])) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("CEP INVÁLIDO!"));
    return;
}

if (!$instituicaoRepository->isvalidCnpj($params["cnpj"])) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("CNPJ INVÁLIDO!"));
    return;
}

//count conta quantos itens existem dentro do array
$emails = $instituicaoRepository->getList([
    [
        'field' => 'email',
        'condition' => 'LIKE',
        'value' => $params["email"]
    ],
    [
        'field' => 'id',
        'condition' => '!=',
        'value' => $params['id']
    ]
], ['id']);
if (count($emails) > 0) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("EMAIL JÁ CADASTRADO!"));
    return;
}

if (count($instituicaoRepository->getList([
        [
            'field' => 'cnpj',
            'condition' => 'LIKE',
            'value' => $params["cnpj"]
        ],
        [
            'field' => 'id',
            'condition' => '!=',
            'value' => $params['id']
        ]
    ], ['id'])) > 0) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("CNPJ JÁ CADASTRADO!"));
    return;
}

$instituicaoAtualizada = new \App\Model\Instituicao\Instituicao();
$instituicaoAtualizada->setData($params);

$result = $instituicaoRepository->update($instituicaoAtualizada, [
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $params['id']
    ]
]);
if ($result) {
    $id = $params['id'];
    if ($_SESSION['tipo'] == 1) {
        $instituicaoAtualizada->setInstStatus((int) $_SESSION['dados']['inst_status']);
        $_SESSION['dados'] = $instituicaoAtualizada->getData();
    }
    $params['id'] = $id;
    if ($_SESSION['tipo'] == 3) {
        header('Location: ' . BASE_URL . 'admin/instituicao-edit-account-admin.php?mensagem=' . urlencode("Instituicao Atualizada com Sucesso!") . '&id=' . $params['id']);
    } else {
        header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("Instituicao Atualizada com Sucesso!"));
    }
} else {
    if ($_SESSION['tipo'] == 3) {
        header('Location: ' . BASE_URL . 'admin/instituicao-edit-account-admin.php?mensagem=' . urlencode("NAO ATUALIZOU!") . '&id=' . $params['id']);
    } else {
        header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("NAO ATUALIZOU!"));
    }
}
