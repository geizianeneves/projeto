<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Cliente\ClienteRepository;
use App\Model\Cliente\Cliente;

$params = $_POST;


/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bAtualizaCliente"]);
unset($params["estado"]);

$clienteRepository = new ClienteRepository();

if ($params["senha"] !== "" || $params["conf_senha"] !== "") {

    if ($params["senha"] !== $params["conf_senha"]) {
        header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("SENHAS DIVERGENTES!"));
        return;
    }
}
unset($params["conf_senha"]);


if (!$clienteRepository->isValidPhone($params["fone"])) {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("TELEFONE INVÁLIDO!"));
    //nao preciso do return pq o header ja vai me redirecionar para outra pagina, nao vai executar o codigo abaixo
    return;
}

if (!filter_var($params["email"], FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("E-MAIL INVÁLIDO!"));
    return;
}

if (!$clienteRepository->isValidCep($params["cep"])) {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("CEP INVÁLIDO!"));
    return;
}

if (!$clienteRepository->isvalidCPF($params["cpf"])) {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("CPF INVÁLIDO!"));
    return;
}

//count conta quantos itens existem dentro do array
$emails = $clienteRepository->getList([
    [
        'field' => 'email',
        'condition' => 'LIKE',
        'value' => $params["email"]
    ],
    [
        'field' => 'id',
        'condition' => '!=',
        'value' => $_SESSION['dados']['id']
    ]
], ['id']);
if (count($emails) > 0) {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("EMAIL JÁ CADASTRADO!"));
    return;
}

if (count($clienteRepository->getList([
        [
            'field' => 'cpf',
            'condition' => 'LIKE',
            'value' => $params["cpf"]
        ],
        [
            'field' => 'id',
            'condition' => '!=',
            'value' => $_SESSION['dados']['id']
        ]
    ], ['id'])) > 0) {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("CPF JÁ CADASTRADO!"));
    return;
}

$clienteAtualizado = new Cliente();
$clienteAtualizado->setData($params);

$result = $clienteRepository->update($clienteAtualizado, [
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $_SESSION['dados']['id']
    ]
]);

if ($result) {
    $id = $_SESSION['dados']['id'];
    $_SESSION['dados'] = $clienteAtualizado->getData();
    $_SESSION['dados']['id'] = $id;
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("Cliente Atualizado com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("NAO ATUALIZOU!"));
}
