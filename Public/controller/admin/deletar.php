<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Cliente\ClienteRepository;
use App\Model\Cliente\Cliente;

$params = $_POST;

$adminRepository = new \App\Model\Admin\AdminRepository();


$adminDelete = new \App\Model\Admin\Admin();
$adminDelete->setData($params);


$result = $adminRepository->delete([
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $_SESSION['dados']['id']
    ]
]);

if ($result) {
    session_destroy();
    header('Location: ' . BASE_URL . 'admin/login-admin.php?mensagem=' . urlencode("Administrador Removido com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'admin/admin-edit-account.php?mensagem=' . urlencode("NAO REMOVEU!"));
}
