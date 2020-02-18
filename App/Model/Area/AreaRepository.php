<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Area;
use App\Model\RepositoryBase;

class AreaRepository extends RepositoryBase
{
    /**
     * AreaRepository constructor.
     */
    public function __construct()
    {
        $this->table = "area";
        $this->requiredFields = [
            "id",
            "nome",
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Area::class;
        parent::__construct();
    }

    /**
     * @param int $area_id
     * @return string
     */
    public function mostraNomeArea(int $area_id) : string
    {
        $area = $this->getById($area_id);
        return $area->getNome();
    }
}