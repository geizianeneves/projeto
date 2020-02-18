<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Cidade;
use App\Model\RepositoryBase;

class CidadeRepository extends RepositoryBase
{
    /**
     * CidadeRepository constructor.
     */
    public function __construct()
    {
        $this->table = "cidade";
        $this->requiredFields = [
            "id",
            "nome",
            "estado_id"
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string",
            "estado_id" => "int"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Cidade::class;
        parent::__construct();
    }

    /**
     * @param int $cidade_id
     * @return string Nome da Cidade
     */
    public function mostraNomeCidade(int $cidade_id) : string
    {
        $cidade = $this->getById($cidade_id);
        return $cidade->getNome();
    }
}