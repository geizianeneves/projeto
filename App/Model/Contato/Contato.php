<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Contato;

use App\Model\User\User;

class Contato extends User
{
    const FIELD_CPF = "cpf";
    const FIELD_CELULAR = "celular";
    const FIELD_INSTITUICAO_ID = "instituicao_id";

    /**
     * @return string CPF
     */
    public function getCPF () : string
    {
        return (string)$this->data[self::FIELD_CPF];
    }

    /**
     * @param string $cpf
     */
    public function setCPF(string $cpf) : void
    {
        $this->data[self::FIELD_CPF] = $cpf;
    }

    /**
     * @return string CELULAR
     */
    public function getCelular() : string
    {
        return (string)$this->data[self::FIELD_CELULAR];
    }

    /**
     * @param string $celular
     */
    public function setCelular(string $celular) : void
    {
        $this->data[self::FIELD_CELULAR] = $celular;
    }

    /**
     * @return int Instituição Id
     */
    public function getInstituicaoId() : int
    {
        return (int) $this->data[self::FIELD_INSTITUICAO_ID];
    }

    /**
     * @param int $instituicaoId
     */
    public function setIstituicaoId (int $instituicaoId) : void
    {
        $this->data[self::FIELD_INSTITUICAO_ID]= $instituicaoId;
    }
}