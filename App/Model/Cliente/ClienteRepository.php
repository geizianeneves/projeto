<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Cliente;
use App\Model\RepositoryBase;

class ClienteRepository extends RepositoryBase
{
    /**
     * ClienteRepository constructor.
     */
    public function __construct()
    {
        $this->table = "cliente";
        $this->requiredFields = [
            "id",
            "nome",
            "sobrenome",
            "cpf",
            "usuario",
            "email",
            "senha",
            "celular",
            "cep",
            "logradouro",
            "numero",
            "bairro",
            "cidade_id"
        ];
        $this->fields = [
            "id" => "int",
            "nome" => "string",
            "sobrenome" => "string",
            "cpf" => "string",
            "usuario" => "string",
            "email" => "string",
            "senha" => "string",
            "celular" => "string",
            "cep" => "string",
            "logradouro" => "string",
            "numero" => "string",
            "bairro" => "string",
            "cidade_id" => "int",
            "fone" => "string"
        ];
        $this->primaryKey = "id";
        $this->baseClass = Cliente::class;
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
     * @param null $cpf
     * @return bool
     */
    public function isvalidCPF($cpf = null) : bool
    {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }
}