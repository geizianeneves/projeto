<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);

namespace App\Model\Ingresso;
use App\Base;

class Ingresso extends Base
{
    const FIELD_EVENTO_ID = "evento_id";
    const FIELD_PEDIDO_ID = "pedido_id";
    const FIELD_PRECO_ITEM = "preco_item";
    const FIELD_STATUS_INGRESSO = "status_ingresso";
    const FIELD_INSCRITO_ID = "inscrito_id";

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
    public function setEventoId(int $eventoId) : void
    {
        $this->data[self::FIELD_EVENTO_ID] = $eventoId;
    }

    /**
     * @return int Pedido Id
     */
    public function getPedidoId() : int
    {
        return (int)$this->data[self::FIELD_PEDIDO_ID];
    }

    /**
     * @param int $pedidoId
     */
    public function setPedidoId(int $pedidoId) : void
    {
        $this->data[self::FIELD_PEDIDO_ID] = $pedidoId;
    }

    /**
     * @return float Preco do Item
     */
    public  function getPrecoItem() : float
    {
        return (float) $this->data[self::FIELD_PRECO_ITEM];
    }

    /**
     * @param float $precoItem
     */
    public function setPrecoItem(float $precoItem) : void
    {
        $this->data[self::FIELD_PRECO_ITEM] = $precoItem;
    }

    /**
     * @return string Status do Ingresso
     */
    public function getStatusIngresso() : string
    {
        return (string)$this->data[self::FIELD_STATUS_INGRESSO];
    }

    /**
     * @param string $statusIngresso
     */
    public function setStatusIngresso(string $statusIngresso): void
    {
        $this->data[self::FIELD_STATUS_INGRESSO] = $statusIngresso;
    }

    /**
     * @return int Inscrito Id
     */
    public function getInscritoId() : int
    {
        return (int)$this->data[self::FIELD_INSCRITO_ID];
    }

    /**
     * @param int $inscritoId
     */
    public function setInscritoId(int $inscritoId): void
    {
        $this->data[self::FIELD_INSCRITO_ID] = $inscritoId;
    }
}