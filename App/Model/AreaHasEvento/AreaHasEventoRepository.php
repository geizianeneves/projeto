<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\AreaHasEvento;
use App\Model\RepositoryBase;
class AreaHasEventoRepository extends RepositoryBase
{
    /**
     * AreaHasEventoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "area_has_evento";
        $this->requiredFields = [
            "area_id",
            "evento_id",
        ];
        $this->fields = [
            "area_id" => "int",
            "evento_id" => "int"
        ];
        $this->baseClass = AreaHasEvento::class;
        parent::__construct();
    }
}