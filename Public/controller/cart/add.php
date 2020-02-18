<?php

declare(strict_types = 1);

require_once('./../../../vendor/autoload.php');

use App\Model\Cart\CartRepository;
use App\Model\Cart\Cart;

$params = $_POST;

$cartRepository = new CartRepository();

//verifica se ja existe carrinho para o cliente
$carts = $cartRepository->getList([[
        'field' => 'cliente_id',
        'condition' => '=',
        'value' => $_SESSION["dados"]["id"]

],[
        'field' => 'status',
        'condition' => '=',
        'value' => 0
]],["id", "data_criacao", "data_atualizacao", "total", "cliente_id", "status"]);

if(count($carts)>0){
    //tem carrinho ativo
    $cart = $carts[0];
}
else {
    $cart = new App\Model\Cart\Cart();
    $cart->setData([
        'data_criacao' => date("Y-m-d"),
        'data_atualizacao' => date("Y-m-d"),
        'total' => 0,
        'cliente_id' => (int)$_SESSION["dados"]["id"],
        'status' => 0
    ]);
    $result = $cartRepository->insert($cart);
}
die(var_dump($cart));

