<?php require_once('./../vendor/autoload.php'); ?>

<?php


$clienteRepository = new \App\Model\Cliente\ClienteRepository();

if(!$clienteRepository->isValidCep("1901R-040")){
    echo "CEP INVALIDO!";
}
else {
    echo "CEP VALIDO";
}


?>