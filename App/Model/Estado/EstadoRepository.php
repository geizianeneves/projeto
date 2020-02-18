<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Estado;
use App\Model\RepositoryBase;

class EstadoRepository extends RepositoryBase
{
    /**
     * EstadoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "estado";
        $this->requiredFields = [
            "id",
            "nome",
            "sigla"
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string",
            "sigla" => "string"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Estado::class;
        parent::__construct();
    }

    /**
     * @param int $cidadeId
     * @return string Nome do Estado
     */
    public function getEstadoNome(int $cidadeId) : string
    {
        $cidadeRepository = new CidadeRepository();
        $cidade = $cidadeRepository->getById($cidadeId);
        $estadoId =  $cidade->getEstadoId();
        $estado = $this->getById($estadoId);
        return $estado->getNome();
    }
}