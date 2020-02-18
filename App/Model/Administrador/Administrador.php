<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);

namespace App\Model\Administrador;

use App\Model\User\User;

class Administrador extends User
{
    const FIELD_CPF = "cpf";
    /**
     * @return string
     */
    public function getCpf() : string
    {
        return (string) $this->data[self::FIELD_CPF];
    }

    /**
     * @param string $cpf
     */
    public function setCpf (string $cpf) : void
    {
        $this->data[self::FIELD_CPF] = $cpf;
    }
}