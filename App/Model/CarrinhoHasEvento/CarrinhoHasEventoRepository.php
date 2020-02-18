<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\CarrinhoHasEvento;
use App\Model\RepositoryBase;

class CarrinhoHasEventoRepository extends RepositoryBase
{
    /**
     * CarrinhoHasEventoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "carrinho_has_evento";
        $this->requiredFields = [
            "carrinho_id",
            "evento_id",
            "preco",
            "total_item",
            "qtd"
        ];
        $this->fields = [
            "carrinho_id" => "int",
            "evento_id" => "int",
            "preco" => "float",
            "total_item" => "float",
            "qtd" => "int"
        ];
        $this->baseClass = CarrinhoHasEvento::class;
        parent::__construct();
    }
}