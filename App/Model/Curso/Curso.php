<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Curso;
use App\Base;

class Curso extends Base
{
    const FIELD_ID = "id";
    const FIELD_NOME = "nome";
    const FIELD_AREA_ID  = "area_id";
    /**
     * @return int Id
     */
    public  function getId () : int
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
     * @return string Nome
     */
    public function getNome() : string
    {
        return (string) $this->data[self::FIELD_NOME];
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome) : void
    {
        $this->data[self::FIELD_NOME] = $nome;
    }

    /**
     * @return int id da Area
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
        $this->data[self::FIELD_AREA_ID]= $areaId;
    }
}