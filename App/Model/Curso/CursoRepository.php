<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Curso;
use App\Model\RepositoryBase;

class CursoRepository extends RepositoryBase
{
    /**
     * CursoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "curso";
        $this->requiredFields = [
            "id",
            "nome",
            "area_id"
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string",
            "area_id" => "int"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Curso::class;
        parent::__construct();
    }
}