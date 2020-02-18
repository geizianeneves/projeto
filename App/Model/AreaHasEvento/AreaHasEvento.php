<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\AreaHasEvento;
use App\Base;

class AreaHasEvento extends Base
{
    const FIELD_AREA_ID = "area_id";
    const FIELD_EVENTO_ID = "evento_id";

    /**
     * @return int id da area
     */
    public function getAreaId() : int
    {
        return (int)$this->data[self::FIELD_AREA_ID];
    }

    /**
     * @param int $areaId
     */
    public function setAreaId(int $areaId) : void
    {
        $this->data[self::FIELD_AREA_ID] = $areaId;
    }

    /**
     * @return int id do evento
     */
    public function getEventoId() : int
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
}