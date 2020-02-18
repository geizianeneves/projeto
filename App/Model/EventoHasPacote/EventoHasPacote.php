<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\EventoHasPacote;
use App\Base;

class EventoHasPacote extends Base
{
    const FIELD_EVENTO_ID = "evento_id";
    const  FIELD_PACOTE_ID = "pacote_id";

    /**
     * @return int Evento id
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
        return $this->data[self::FIELD_EVENTO_ID] = $eventoId;
    }

    /**
     * @return int Pacote Id
     */
    public function getPacoteId() : int
    {
        return (int)$this->data[self::FIELD_PACOTE_ID];
    }

    /**
     * @param int $pacoteId
     */
    public function setPacoteId(int $pacoteId) : void
    {
        $this->data[self::FIELD_PACOTE_ID] = $pacoteId;
    }
}