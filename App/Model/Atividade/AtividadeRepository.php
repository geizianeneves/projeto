<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Atividade;
use App\Model\RepositoryBase;

class AtividadeRepository extends RepositoryBase
{
    /**
     * AtividadeRepository constructor.
     */
    public function __construct()
    {
        $this->table = "atividade";
        $this->requiredFields = [
            "id",
            "nome",
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Atividade::class;
        parent::__construct();
    }

    /**
     * @param int $atividade_id
     * @return string Nome da Atividade
     */
    public function mostraNomeAtividade(int $atividade_id) : string
    {
        $atividade = $this->getById($atividade_id);

        return $atividade->getNome();
    }
}