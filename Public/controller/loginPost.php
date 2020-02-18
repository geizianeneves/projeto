<?php

declare(strict_types = 1);

require_once('./../../vendor/autoload.php');

use App\Model\Instituicao\InstituicaoRepository;
use App\Model\Cliente\ClienteRepository;
use App\Model\Admin\AdminRepository;

$params = $_POST;


$instituicaoRepository = new InstituicaoRepository();


$clienteRepository = new ClienteRepository();

$adminRepository = new AdminRepository();

$instituicoes = $instituicaoRepository->getList([
    [
        'field' => 'usuario',
        'condition' => 'LIKE',
        'value' => $params["usuario"]
    ],
    [
        'field' => 'senha',
        'condition' => 'LIKE',
        'value' => $params["senha"]

    ]
], ['id', 'nome','usuario','email','cnpj','fone','cep','logradouro','bairro','numero', 'cidade_id','inst_status'],true);

$clientes = $clienteRepository->getList([
    [
        'field' => 'usuario',
        'condition' => 'LIKE',
        'value' => $params["usuario"]
    ],
    [
        'field' => 'senha',
        'condition' => 'LIKE',
        'value' => $params["senha"]

    ]
], ['id', 'usuario','nome','cpf','email','fone','cep','logradouro','bairro','numero', 'cidade_id'], true);

$administradores = $adminRepository->getList([
    [
        'field' => 'usuario',
        'condition' => 'LIKE',
        'value' => $params["usuario"]
    ],
    [
        'field' => 'senha',
        'condition' => 'LIKE',
        'value' => $params["senha"]

    ]
], ['id', 'nome','sobrenome','cpf','usuario','email'], true);

if (count($instituicoes) > 0) {
    session_start();
    $_SESSION['tipo'] = 1;
    $_SESSION['dados'] = $instituicoes[0];
    header('Location: ' . BASE_URL . 'instituicao/instituicao.php');
    exit;
}
else if (count($clientes) > 0) {
    session_start();
    $_SESSION['tipo'] = 2;
    $_SESSION['dados'] = $clientes[0];
    header('Location: ' . BASE_URL . 'cliente/user.php');
    exit;
}

else if (count($administradores) > 0) {
    session_start();
    $_SESSION['tipo'] = 3;
    $_SESSION['dados'] = $administradores[0];
    header('Location: ' . BASE_URL . 'admin/admin.php');
    exit;
}

else {
    header('Location: ' . BASE_URL . 'login.php?mensagem='.urlencode("Usuário Nao Cadastrado!"));
    exit;
}

