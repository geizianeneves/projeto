<?php

declare(strict_types = 1);

require_once('./../../../vendor/autoload.php');

use App\Model\Cliente\ClienteRepository;
use App\Model\Cliente\Cliente;

$params = $_POST;


/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bRegistraAdmin"]);

$adminRepository = new \App\Model\Admin\AdminRepository();

if ($params["senha"] !== $params["conf_senha"]) {
    header('Location: ' . BASE_URL . 'admin/login-admin.php?mensagem='.urlencode("SENHAS DIVERGENTES!"));
    return;
} else { //O campo conf_senha nao eh salvo no banco, podemos remover
    unset($params["conf_senha"]);
}


if (!filter_var($params["email"], FILTER_VALIDATE_EMAIL))
{
    header('Location: ' . BASE_URL . 'admin/login-admin.php?mensagem='.urlencode("E-MAIL INVÁLIDO!"));
    return;
}


if (!$adminRepository->isvalidCPF($params["cpf"])) {
    header('Location: ' . BASE_URL . 'admin/login-admin.php?mensagem='.urlencode("CPF INVÁLIDO!"));
    return;
}

//count conta quantos itens existem dentro do array
$emails = $adminRepository->getList([
    [
        'field' => 'email',
        'condition' => 'LIKE',
        'value' => $params["email"]
    ]
], ['id']);
if (count($emails) > 0) {
    header('Location: ' . BASE_URL . 'admin/login-admin.php?mensagem='.urlencode("EMAIL JÁ CADASTRADO!"));
    return;
}

if (count($adminRepository->getList([
        [
            'field' => 'cpf',
            'condition' => 'LIKE',
            'value' => $params["cpf"]
        ]
    ], ['id'])) > 0) {
    header('Location: ' . BASE_URL . 'admin/login-admin.php?mensagem='.urlencode("CPF JÁ CADASTRADO!"));
    return;
}

$novoAdmin = new \App\Model\Admin\Admin();
$novoAdmin->setData($params);

$result = $adminRepository->insert($novoAdmin);

if ($result) {
    header('Location: ' . BASE_URL . '/admin/login-admin.php?mensagem='.urlencode("Administrador Cadastrado com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . '/admin/login-admin.php?mensagem='.urlencode("NAO CADASTROU!"));
}
