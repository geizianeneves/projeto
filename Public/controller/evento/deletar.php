<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Evento\EventoRepository;
use App\Model\Evento\Evento;

//request pega GET ou POST
$params = $_REQUEST;

$eventoRepository = new EventoRepository();


$eventoDelete = new Evento();
$eventoDelete->setData($params);


$result = $eventoRepository->delete([
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $params["id"]
    ]
]);

if ($result) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-produto.php?mensagem=' . urlencode("Evento Removido com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'evento/edit-evento.php?mensagem=' . urlencode("NAO REMOVEU!"));
}
