<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\CarrinhoHasEvento;
use App\Base;

class CarrinhoHasEvento extends Base
{
    const FIELD_CARRINHO_ID = "carrinho_id";
    const FIELD_EVENTO_ID = "evento_id";
    const FEILD_PRECO = "preco";
    const FIELD_TOTAL_ITEM = "total_item";
    const FIELD_QTD = "qtd";

    /**
     * @return int Carrinho ID
     */
    public function getCarrinhoId() : int
    {
        return (int)$this->data[self::FIELD_CARRINHO_ID];
    }

    /**
     * @param int $carrinhoId
     */
    public function setCarrinhoId(int $carrinhoId) : void
    {
        $this->data[self::FIELD_CARRINHO_ID] = $carrinhoId;
    }

    /**
     * @return int Evento Id
     */
    public function getEventoId () : int
    {
        return (int)$this->data[self::FIELD_EVENTO_ID];
    }

    /**
     * @param int $eventoId
     */
    public function setEventoId (int $eventoId) : void
    {
        $this->data[self::FIELD_EVENTO_ID] = $eventoId;
    }

    /**
     * @return float Preco
     */
    public function getPreco () : float
    {
        return (float)$this->data[self::FEILD_PRECO];
    }

    /**
     * @param float $preco
     */
    public function setPreco (float $preco) : void
    {
        $this->data[self::FEILD_PRECO] = $preco;
    }

    /**
     * @return float Subtotal
     */
    public function getTotalItem (): float
    {
        return (float)$this->data[self::FIELD_TOTAL_ITEM];
    }

    /**
     * @param float $totalItem
     */
    public function setTotalItem(float $totalItem) : void
    {
        $this->data[self::FIELD_TOTAL_ITEM] = $totalItem;
    }

    /**
     * @return int quantidade
     */
    public function getQtd() : int
    {
        return (int)$this->data[self::FIELD_QTD];
    }

    /**
     * @param int $qtd
     */
    public function setQtd(int $qtd) : void
    {
        $this->data[self::FIELD_QTD] = $qtd;
    }
}