<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Ingresso;
use App\Model\RepositoryBase;

class IngressoRepository extends RepositoryBase
{
    /**
     * IngressoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "ingresso";
        $this->requiredFields = [
            "evento_id",
            "pedido_id",
            "preco_item",
            "inscrito_id"
        ];
        $this->fields = [
            "evento_id" => "int",
            "pedido_id" => "int",
            "preco_item" => "float",
            "status_ingresso" => "string",
            "inscrito_id" => "int"
        ];
        $this->baseClass = Ingresso::class;
        parent::__construct();
    }
}