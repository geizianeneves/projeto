<?php
/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);

namespace App\Model\User;

use App\Base;

abstract class User extends Base
{
    const FIELD_ID = "id";
    const FIELD_NOME = "nome";
    const FIELD_SOBRENOME = "sobrenome";
    const FIELD_USUARIO = "usuario";
    const FIELD_EMAIL = "email";
    const FIELD_SENHA = "senha";
    /**
     * @return int id
    */
    public function getId() : int
    {
        return (int) $this->data[self::FIELD_ID];
    }

    /**
     * @param int $id
     */
    public function setId (int $id) : void
    {
        $this->data[self::FIELD_ID] = $id;
    }

    /**
     * @return string
     */
    public function getNome() : string
    {
        return (string) $this->data[self::FIELD_NOME];
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome) : void
    {
        $this->data[self::FIELD_NOME] = $nome;
    }

    /**
     * @return string
     */
    public function getSobrenome() : string
    {
        return (string) $this->data[self::FIELD_SOBRENOME];
    }

    /**
     * @param string $sobrenome
     */
    public function setSobrenome(string $sobrenome) : void
    {
        $this->data[self::FIELD_SOBRENOME] = $sobrenome;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return (string) $this->data[self::FIELD_EMAIL];
    }

    /**
     * @param string $email
     */
    public function setEmail (string $email) : void
    {
        $this->data[self::FIELD_EMAIL] = $email;
    }

    /**
     * @return string
     */
    public function getUsuario() : string
    {
        return (string) $this->data[self::FIELD_USUARIO];
    }

    /**
     * @param string $usuario
     */
    public function setUsuario(string $usuario) : void
    {
        $this->data[self::FIELD_USUARIO] = $usuario;
    }

    /**
     * @return string
     */
    public function getSenha () : string
    {
        return (string)$this->data[self::FIELD_SENHA];
    }

    /**
     * @param string $senha
     */
    public function setSenha(string $senha) : void
    {
        $this->data[self::FIELD_SENHA] = $senha;
    }
}