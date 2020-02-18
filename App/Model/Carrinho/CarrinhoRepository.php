<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Carrinho;
use App\Model\RepositoryBase;

class CarrinhoRepository extends RepositoryBase
{
    /**
     * CarrinhoRepository constructor.
     */
    public function __construct()
    {
        $this->table ="carrinho";
        $this->requiredFields = [
            "id",
            "data_criacao",
            "data_atual",
            "cliente_id",
            "total"
        ];
        $this->fields = [
            "id" => "int",
            "data_criacao" => "string",
            "data_atual" => "string",
            "cliente_id" => "int",
            "total" => "float"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Carrinho::class;
        parent::__construct();
    }


}