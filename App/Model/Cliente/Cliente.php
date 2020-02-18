<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);

namespace App\Model\Cliente;
use App\Model\User\User;

class Cliente extends User
{
    const FIELD_CPF = "cpf";
    const FIELD_FONE = "fone";
    const FIELD_CEP = "cep";
    const FIELD_LOGRADOURO = "logradouro";
    const FIELD_BAIRRO = "bairro";
    const FIELD_NUMERO = "numero";
    const FIELD_CIDADE_ID = "cidade_id";

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

    /**
     * @return string Fone
     */
    public function getFone() : string
    {
        return (string) $this->data[self::FIELD_FONE];
    }

    /**
     * @param string $fone
     */
    public function setFone(string $fone) : void
    {
        $this->data[self::FIELD_FONE] = $fone;
    }

    /**
     * @return string CPF
     */
    public function getCEP() : string
    {
        return (string) $this->data[self::FIELD_CEP];
    }

    /**
     * @param string $cep
     */
    public function setCEP(string $cep) : void
    {
        $this->data[self::FIELD_CEP] = $cep;
    }

    /**
     * @return string Logradouro
     */
    public function getLogradouro() : string
    {
        return (string)$this->data[self::FIELD_LOGRADOURO];
    }

    /**
     * @param string $logradouro
     */
    public function setLogradouro(string $logradouro) : void
    {
        $this->data[self::FIELD_LOGRADOURO] = $logradouro;
    }

    /**
     * @return string Bairro
     */
    public function getBairro() : string
    {
        return (string)$this->data[self::FIELD_BAIRRO];
    }

    /**
     * @param string $bairro
     */
    public function setBairro(string $bairro): void
    {
        $this->data[self::FIELD_BAIRRO] = $bairro;
    }

    /**
     * @return string Número
     */
    public function getNumero() : string
    {
        return (string)$this->data[self::FIELD_NUMERO];
    }

    /**
     * @param string $numero
     */
    public function setNumero(string $numero): void
    {
        $this->data[self::FIELD_NUMERO] = $numero;
    }

    /**
     * @return int cidade Id
     */
    public function getCidadeId() : int
    {
        return (int)$this->data[self::FIELD_CIDADE_ID];
    }

    /**
     * @param int $cidadeId
     */
    public function setCidadeId(int $cidadeId): void
    {
        $this->data[self::FIELD_CIDADE_ID] = $cidadeId;
    }
}