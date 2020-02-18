<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Instituicao\InstituicaoRepository;
use App\Model\Instituicao\Instituicao;

$params = $_POST;

$instituicaoRepository = new InstituicaoRepository();


$instituicaoDelete = new \App\Model\Instituicao\Instituicao();
$instituicaoDelete->setData($params);


$result = $instituicaoRepository->delete([
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $_SESSION['dados']['id']
    ]
]);

if ($result) {
    session_destroy();
    header('Location: ' . BASE_URL . 'login.php?mensagem=' . urlencode("Instituicao Removida com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-edit-account.php?mensagem=' . urlencode("NAO REMOVEU!"));
}
