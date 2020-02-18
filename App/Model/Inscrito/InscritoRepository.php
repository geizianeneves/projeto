<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);

namespace App\Model\Inscrito;
use App\Model\RepositoryBase;

class InscritoRepository extends RepositoryBase
{
    /**
     * InscritoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "inscrito";
        $this->requiredFields = [
            "id",
            "nome",
            "sobrenome",
            "cpf",
            "celular",
            "email"
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string",
            "sobrenome" => "string",
            "cpf" => "string",
            "celular" => "string",
            "email" => "string",
            "ra" => "string"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Inscrito::class;
        parent::__construct();
    }
}