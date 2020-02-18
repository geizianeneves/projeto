<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Pacote;
use App\Model\RepositoryBase;

class PacoteRepository extends RepositoryBase
{
    /**
     * PacoteRepository constructor.
     */
    public function __construct()
    {
        $this->table = "pacote";
        $this->requiredFields = [
            "id",
            "nome",
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Pacote::class;
        parent::__construct();
    }

    /**
     * @param int $pacote_id
     * @return string
     */
    public function mostraNomePacote(int $pacote_id) : string
    {
        $pacote = $this->getById($pacote_id);
        return $pacote->getNome();
    }
}