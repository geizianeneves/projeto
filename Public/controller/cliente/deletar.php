<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Cliente\ClienteRepository;
use App\Model\Cliente\Cliente;

$params = $_POST;

$clienteRepository = new ClienteRepository();


$clienteDelete = new Cliente();
$clienteDelete->setData($params);


$result = $clienteRepository->delete([
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $_SESSION['dados']['id']
    ]
]);

if ($result) {
    session_destroy();
    header('Location: ' . BASE_URL . 'login.php?mensagem=' . urlencode("Cliente Removido com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'cliente/user-edit-account.php?mensagem=' . urlencode("NAO REMOVEU!"));
}
