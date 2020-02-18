<?php

declare(strict_types = 1);

require_once('./../../../vendor/autoload.php');

use App\Model\Cliente\ClienteRepository;
use App\Model\Cliente\Cliente;

$params = $_POST;


/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bRegistraCliente"]);
unset($params["estado"]);

$clienteRepository = new ClienteRepository();

if ($params["senha"] !== $params["conf_senha"]) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("SENHAS DIVERGENTES!"));
    return;
} else { //O campo conf_senha nao eh salvo no banco, podemos remover
    unset($params["conf_senha"]);
}

if (!$clienteRepository->isValidPhone($params["fone"])){
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("TELEFONE INVÁLIDO!"));
    //nao preciso do return pq o header ja vai me redirecionar para outra pagina, nao vai executar o codigo abaixo
    return;
}

if (!filter_var($params["email"], FILTER_VALIDATE_EMAIL))
{
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("E-MAIL INVÁLIDO!"));
    return;
}

if (!$clienteRepository->isValidCep($params["cep"])) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("CEP INVÁLIDO!"));
    return;
}

if (!$clienteRepository->isvalidCPF($params["cpf"])) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("CPF INVÁLIDO!"));
    return;
}

//count conta quantos itens existem dentro do array
$emails = $clienteRepository->getList([
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

if (count($clienteRepository->getList([
        [
            'field' => 'cpf',
            'condition' => 'LIKE',
            'value' => $params["cpf"]
        ]
    ], ['id'])) > 0) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("CPF JÁ CADASTRADO!"));
    return;
}

$novoCliente = new Cliente();
$novoCliente->setData($params);

$result = $clienteRepository->insert($novoCliente);

if ($result) {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("Cliente Cadastrado com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("NAO CADASTROU!"));
}
