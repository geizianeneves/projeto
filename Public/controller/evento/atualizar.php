<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Evento\EventoRepository;
use App\Model\Evento\Evento;

$params = $_POST;

$allowedImagesTypes = ["jpg", "jpeg", "png", "gif"];

if (isset($_FILES['banner'])) {
    $filename = $_FILES['banner']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowedImagesTypes)) {
        header('Location: ' . BASE_URL . 'evento/edit-evento.php?mensagem=' . urlencode("Tipo de Arquivo de Banner Inválido!"));
    } else {
        $destino = BASE_PATH . 'public_html/media/banners/' . $_FILES['banner']['name'];
        $arquivo_tmp = $_FILES['banner']['tmp_name'];
        move_uploaded_file($arquivo_tmp, $destino);
    }
}

if (isset($_FILES['ticket'])) {
    $filename = $_FILES['ticket']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowedImagesTypes)) {
        header('Location: ' . BASE_URL . 'evento/edit-evento.php?mensagem=' . urlencode("Tipo de Arquivo de Ticket Inválido!"));
    } else {
        $destino = BASE_PATH . 'public_html/media/tickets/' . $_FILES['ticket']['name'];
        $arquivo_tmp = $_FILES['ticket']['tmp_name'];
        move_uploaded_file($arquivo_tmp, $destino);
    }
}

/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bAtualizaEvento"]);
unset($params["estado"]);

$eventoRepository = new EventoRepository();

if (!$eventoRepository->isValidCep($params["cep"])) {
    header('Location: ' . BASE_URL . 'evento/edit-evento.php?mensagem=' . urlencode("CEP INVÁLIDO!"));
    return;
}

$eventoAtualizado = new Evento();
$eventoAtualizado->setData($params);

//so vou salvar o nome do arquivo no objeto
if (array_key_exists('banner', $_FILES)) {
    $eventoAtualizado->setBanner($_FILES['banner']['name']);
}
if (array_key_exists('ticket', $_FILES)) {
    $eventoAtualizado->setTicket($_FILES['ticket']['name']);
}

$result = $eventoRepository->update($eventoAtualizado, [
    [
        'field' => 'id',
        'condition' => '=',
        'value' => $params['id']
    ]
]);

if ($result) {
    if ($_SESSION['tipo'] == 3) {
        header('Location: ' . BASE_URL . 'admin/edit-evento-admin.php?mensagem=' . urlencode("Evento Atualizado com Sucesso!") . '&id=' . $params['id']);
    } else {
        header('Location: ' . BASE_URL . 'evento/edit-evento.php?mensagem=' . urlencode("Evento Atualizado com Sucesso!"). '&id=' . $params['id']);
    }
} else {
    if ($_SESSION['tipo'] == 3) {
        header('Location: ' . BASE_URL . 'admin/edit-evento-admin.php?mensagem=' . urlencode("NAO ATUALIZOU!") . '&id=' . $params['id']);
    } else {
        header('Location: ' . BASE_URL . 'evento/edit-evento.php?mensagem=' . urlencode("NAO ATUALIZOU!"). '&id=' . $params['id']);
    }
}

