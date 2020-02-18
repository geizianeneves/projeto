<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Instituicao;
use App\Model\RepositoryBase;

class InstituicaoRepository extends RepositoryBase
{
    /**
     * InstituicaoRepository constructor.
     */
    public function __construct()
    {
        $this->table = "instituicao";
        $this->requiredFields = [
            "id",
            "nome",
            "cnpj",
            "usuario",
            "senha",
            "email",
            "fone",
            "cep",
            "logradouro",
            "numero",
            "bairro",
            "cidade_id"
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string",
            "cnpj" => "string",
            "usuario" => "string",
            "senha" => "string",
            "email" => "string",
            "fone" => "string",
            "cep" => "string",
            "logradouro" => "string",
            "numero" => "string",
            "bairro" => "string",
            "status_int" => "string",
            "cidade_id" => "int",
        ];
        $this->primaryKey = "id";
        $this->baseClass = Instituicao::class;
        parent::__construct();
    }

    /**
     * @param string $fone
     * @return bool
     */
    public function isValidPhone(string $fone) : bool
    {
        if (preg_match('/(\(?\d{2}\)?) ?9?\d{4}-?\d{4}/', $fone)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $cep
     * @return bool
     */
    public function isValidCep(string $cep) : bool
    {
        // retira espacos em branco
        $cep = trim($cep);
        // expressao regular para avaliar o cep
        if (preg_match("/^(\d){5}-(\d){3}$/", $cep))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $cnpj
     * @return bool
     */
    public function isvalidCNPJ($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    /**
     * @param int $instituicao_id
     * @return string Nome da Instituicao
     */
    public function mostraNomeInstituicao(int $instituicao_id) : string
    {
        $instituicao = $this->getById($instituicao_id);
        return $instituicao->getNome();
    }

}