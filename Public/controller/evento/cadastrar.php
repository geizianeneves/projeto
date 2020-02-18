<?php

declare(strict_types=1);

require_once('./../../../vendor/autoload.php');

use App\Model\Evento\EventoRepository;
use App\Model\Evento\Evento;

$params = $_POST;

$allowedImagesTypes = ["jpg","jpeg","png","gif"];

if (array_key_exists('banner', $_FILES)) {
    $filename = $_FILES['banner']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowedImagesTypes)) {
        header('Location: ' . BASE_URL . 'evento/add-evento.php?mensagem=' . urlencode("Tipo de Arquivo de Banner Inválido!"));
    } else {
        $destino = BASE_PATH . 'public_html/media/banners/' . $_FILES['banner']['name'];
        $arquivo_tmp = $_FILES['banner']['tmp_name'];
        move_uploaded_file($arquivo_tmp, $destino);
    }
}

$filename = $_FILES['ticket']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowedImagesTypes)) {
    header('Location: ' . BASE_URL . 'evento/add-evento.php?mensagem=' . urlencode("Tipo de Arquivo de Ticket Inválido!"));
} else {
    $destino = BASE_PATH . 'public_html/media/tickets/' . $_FILES['ticket']['name'];
    $arquivo_tmp = $_FILES['ticket']['tmp_name'];
    move_uploaded_file($arquivo_tmp, $destino);
}

/**
 * Remove valores que nao vao ser utilizados e que vieram do formulario
 */
unset($params["bRegistraEvento"]);
unset($params["estado"]);

$eventoRepository = new EventoRepository();


if (!$eventoRepository->isValidCep($params["cep"])) {
    header('Location: ' . BASE_URL . 'evento/add-evento.php?mensagem=' . urlencode("CEP INVÁLIDO!"));
    return;
}


$novoEvento = new Evento();
$novoEvento->setData($params);
//so vou salvar o nome do arquivo no objeto
if (array_key_exists('banner', $_FILES)) {
    $novoEvento->setBanner($_FILES['banner']['name']);
}
$novoEvento->setTicket($_FILES['ticket']['name']);

$novoEvento->setInstituicaoId((int)$_SESSION['dados']['id']);

$result = $eventoRepository->insert($novoEvento);

if ($result) {
    header('Location: ' . BASE_URL . 'instituicao/instituicao-produto.php?mensagem=' . urlencode("Evento Cadastrado com Sucesso!"));
} else {
    header('Location: ' . BASE_URL . 'evento/add-evento.php?mensagem=' . urlencode("NAO CADASTROU!"));
}
