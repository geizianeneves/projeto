<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\Inscrito;
use App\Model\User\User;

class Inscrito extends User
{
    const FIELD_CPF = "cpf";
    const FIELD_CELULAR = "celular";
    const FIELD_RA = "ra";

    /**
     * @return string CPF
     */
    public function getCPF() : string
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
        return (string) $this->data[self::FIELD_CELULAR];
    }

    /**
     * @param string $celular
     */
    public function setCelular(string $celular) : void
    {
        $this->data[self::FIELD_CELULAR] = $celular;
    }

    /**
     * @return string RA
     */
    public function getRa() : string
    {
        return (string)$this->data[self::FIELD_RA];
    }

    /**
     * @param strign $ra
     */
    public function setRa(strign $ra): void
    {
        $this->data[self::FIELD_RA] = $ra;
    }
}