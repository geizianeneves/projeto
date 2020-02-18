<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);
namespace App\Model\EventoHasPacote;
use App\Model\RepositoryBase;

class EventoHasPacoteRepository extends RepositoryBase
{
    /**
     * EventoHasPacoteRepository constructor.
     */
    public function __construct()
    {
        $this->table = "evento_has_pacote";
        $this->requiredFields = [
            "evento_id",
            "pacote_id"
        ];
        $this->fields = [
            "evento_id" => "int",
            "pacote_id" => "int"
        ];
        $this->baseClass = EventoHasPacote::class;
        parent::__construct();
    }
}