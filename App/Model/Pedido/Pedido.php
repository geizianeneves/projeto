<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Pedido;
use App\Base;

class Pedido extends Base
{
    const FIELD_ID = "id";
    const FIELD_DATA_PEDIDO = "data_pedido";
    const FIELD_TOTAL = "total";
    const FIELD_STATUS_PEDIDO = "status_pedido";
    const FIELD_CLIENTE_ID = "cliente_id";

    /**
     * @return int id do Pedido
     */
    public function getId() : int
    {
        return (int)$this->data[self::FIELD_ID];
    }

    /**
     * @param int $id
     */
    public function setId(int $id) : void
    {
        $this->data[self::FIELD_ID] = $id;
    }

    /**
     * @return string Data do Pedido
     */
    public function getDataPedido () : string
    {
        return (string)$this->data[self::FIELD_DATA_PEDIDO];
    }

    /**
     * @param string $dataPedido
     */
    public function setDataPedido(string $dataPedido) : void
    {
        $this->data[self::FIELD_DATA_PEDIDO] = $dataPedido;
    }

    /**
     * @return float Total do pedido
     */
    public function getTotal () : float
    {
        return (float)$this->data[self::FIELD_TOTAL];
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total) : void
    {
        $this->data[self::FIELD_TOTAL] = $total;
    }

    /**
     * @return string Status do Pedido
     */
    public function getStatusPedido() : string
    {
        return (string)$this->data[self::FIELD_STATUS_PEDIDO];
    }

    /**
     * @param string $statusPedido
     */
    public function setStatusPedido(string $statusPedido) : void
    {
        $this->data[self::FIELD_STATUS_PEDIDO] = $statusPedido;
    }

    /**
     * @return int id do cliente
     */
    public function getClienteId() : int
    {
        return (int)$this->data[self::FIELD_CLIENTE_ID];
    }

    /**
     * @param int $clienteId
     */
    public function setClienteId(int $clienteId) : void
    {
        $this->data[self::FIELD_CLIENTE_ID] = $clienteId;
    }
}