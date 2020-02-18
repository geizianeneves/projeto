<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);

namespace App\Model\Pedido;
use App\Model\RepositoryBase;

class PedidoRepository extends RepositoryBase
{
    /**
     * PedidoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "pedido";
        $this->requiredFields = [
            "id",
            "data_pedido",
            "total",
            "cliente_id"
        ];
        $this->fields = [
            "id" => "int",
            "data_pedido" => "string",
            "total" => "float",
            "status_pedido" => "string",
            "cliente_id" => "int"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Pedido::class;
        parent::__construct();
    }
}