<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Evento;
use App\Model\RepositoryBase;

class EventoRepository extends RepositoryBase
{
    /**
     * EventoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "evento";
        $this->requiredFields = [
            "id",
            "nome",
            "descricao",
            "local",
            "cep",
            "logradouro",
            "numero",
            "bairro",
            "fone",
            "email",
            "preco_meia",
            "preco_geral",
            "vagas_meia",
            "vagas_geral",
            "data_evento",
            "horario",
            "img_evento",
            "atividade_id",
            "instituicao_id",
            "cidade_id"
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string",
            "descricao" => "string",
            "local" => "string",
            "cep" => "string",
            "logradouro" => "string",
            "numero" => "string",
            "bairro" => "string",
            "fone" => "string",
            "email" => "string",
            "preco_meia" => "float",
            "preco_geral" => "float",
            "vagas_meia" => "int",
            "vagas_geral" => "int",
            "data_evento" => "string",
            "horario" => "string",
            "img_evento" => "string",
            "banner" => "string",
            "qtd_ocup" => "int",
            "atividade_id" => "string",
            "instituicao_id" => "string",
            "cidade_id" => "string",
            "url" => "string",
            "status_evento" => "string"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Evento::class;
        parent::__construct();
    }
}