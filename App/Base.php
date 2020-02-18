<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types = 1);

namespace App;

abstract class Base
{
    /**
     * @var array
     */
    protected $data;

    /**
     * Base constructor
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @param array $data
     */
    public function setData(array $data) : void {
        $this->data = $data;
    }

    /**
     * @return array $data
     */
    public function getData() : array
    {
        return $this->data;
    }
}
