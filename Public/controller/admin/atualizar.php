<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Cliente\ClienteRepository;
use App\Model\Cliente\Cliente;

$params = $_POST;


/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bAtualizaAdmin"]);

$adminRepository = new \App\Model\Admin\AdminRepository();

if ($params["senha"] !== "" || $params["conf_senha"] !== "") {

    if ($params["senha"] !== $params["conf_senha"]) {
        header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("SENHAS DIVERGENTES!"));
        return;
    }
}
unset($params["conf_senha"]);



if (!filter_var($params["email"], FILTER_VALIDATE_EMAIL)) {
    header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("E-MAIL INVÁLIDO!"));
    return;
}


if (!$adminRepository->isvalidCPF($params["cpf"])) {
    header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("CPF INVÁLIDO!"));
    return;
}

//count conta quantos itens existem dentro do array
$emails = $adminRepository->getList([
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
    header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("EMAIL JÁ CADASTRADO!"));
    return;
}

if (count($adminRepository->getList([
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
    header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("CPF JÁ CADASTRADO!"));
    return;
}

$adminAtualizado = new \App\Model\Admin\Admin();
$adminAtualizado->setData($params);

$result = $adminRepository->update($adminAtualizado, [
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $_SESSION['dados']['id']
    ]
]);

if ($result) {
    $id = $_SESSION['dados']['id'];
    $_SESSION['dados'] = $adminAtualizado->getData();
    $_SESSION['dados']['id'] = $id;
    header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("Administrador Atualizado com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("NAO ATUALIZOU!"));
}
