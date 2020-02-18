<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Carrinho;
use App\Base;

class Carrinho extends Base
{
    const FIELD_ID = "id";
    const FIELD_DATA_CRIACAO = "data_criacao";
    const FIELD_DATA_ATUAL = "data_Atual";
    const FIELD_TOTAL = "total";
    const FIELD_CLIENTE_ID = "cliente_id";

    /**
     * @return int Id
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
     * @return string Data de Criação
     */
    public function getDataCriacao () : string
    {
        return (string)$this->data[self::FIELD_DATA_CRIACAO];
    }

    /**
     * @param string $dataCriacao
     */
    public function setDataCriacao (string $dataCriacao) : void
    {
        $this->data[self::FIELD_DATA_CRIACAO] = $dataCriacao;
    }

    /**
     * @return string Data Atual
     */
    public function getDataAtual () : string
    {
       return (string) $this->data[self::FIELD_DATA_ATUAL];
    }

    /**
     * @return float Total
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
     * @return int CLiente Id
     */
    public function getClienteId() : int
    {
        return (int)$this->data[self::FIELD_CLIENTE_ID];
    }

    public function setClienteId (int $clienteId) : void
    {
        $this->data[self::FIELD_CLIENTE_ID] = $clienteId;
    }
}