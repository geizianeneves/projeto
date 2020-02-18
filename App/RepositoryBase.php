<?php

/**
 * @strinct_types faz com que o php realize uma tipagem forte
 * */
declare(strict_types=1);

namespace App\Model;

abstract class RepositoryBase
{
    /**
     * @var string atributo que representa nome da tabela no banco de dados
     */
    protected $table;

    /**
     * @var string atributo que representa da chave primária da tabela do banco de dados
     */
    protected $primaryKey;

    /**
     * @var array $requiredFields atributo que representa o nome das colunas obrigatórios do banco
     */
    protected $requiredFields;

    /**
     * @var mysqli $databaseLink atributo que representa um objeto de conexão com o banco MySQL
     */
    protected $databaseLink;

    /**
     * @var array $fields atributo que representa os campos das entidades do banco de dados
     */
    protected $fields;

    /**
     * @var string $baseClass
     */
    protected $baseClass;

    /**
     * Constantes que representam os tipos de operação no banco [inserir, atualizar]
     */
    const OPERATION_TYPE_INSERT = 1;
    const OPERATION_TYPE_UPDATE = 2;

    /**
     * Construtor base que realiza a conexão com o banco de dados
     * @throws Error
     */
    public function __construct()
    {
        $this->databaseLink = mysqli_connect(
            DB_SERVER,
            DB_USERNAME,
            DB_PASSWORD,
            DB_NAME
        );

        if ($this->databaseLink === false) {
            throw new \Error("Falha na conexão com o banco");
        }
    }

    /**
     * @param Base $object
     * função que inserir valores no banco
     * @return bool
     */
    public function insert(Base $object): bool
    {
        $values = $object->getData();
        if ($this->validateRequiredFields($values, self::OPERATION_TYPE_INSERT)) {
            $sql = "INSERT INTO " . $this->table . " (" . $this->getFields(array_keys($values)) .
                ") VALUES (" . $this->bindValues($values) . ")";
            if ($stmt = mysqli_prepare($this->databaseLink, $sql)) {
                return (bool)mysqli_stmt_execute($stmt);
            }
        }
        return false;
    }

    /**
     * @param Base $object
     * @param array $conditions
     * função que atualiza os items no banco de dados
     * @return bool
     */
    public function update(Base $object, array $conditions): bool
    {
        $values = $object->getData();
        if ($this->validateRequiredFields($values, self::OPERATION_TYPE_UPDATE)) {
            $sql = "UPDATE " . $this->table;
            $i = 0;
            foreach ($values as $key => $value) {
                if ($value != null) {
                    if ($i > 0) {
                        $sql .= ", ";
                    } else {
                        $sql .= " SET ";
                    }

                    if ($this->fields[$key] === "string") {
                        $sql .= $key . ' = "' . $value . '"';
                    } else {
                        $sql .= $key . ' = ' . $value;
                    }
                    $i++;
                }
            }

            $i = 0;
            if (count($conditions) > 0) {
                $sql .= " WHERE ";
                foreach ($conditions as $condition) {
                    if ($i > 0) {
                        $sql .= " AND ";
                    }

                    if ($this->fields[$condition["field"]] === "string") {
                        $sql .= $condition["field"] . ' ' . $condition["condition"] . ' "' . $condition["value"] . '"';
                    } else {
                        $sql .= $condition["field"] . ' ' . $condition["condition"] . ' ' . $condition["value"];
                    }
                    $i++;
                }

            }
            if ($stmt = mysqli_prepare($this->databaseLink, $sql)) {
                return mysqli_stmt_execute($stmt);
            }
        }
        return false;
    }

    /**
     * @param array $conditions
     * função que deleta os items do banco de dados
     * @return bool
     */
    public function delete(array $conditions): bool
    {
        if (!count($conditions) > 0) {
            return false;
        }

        $sql = "DELETE FROM " . $this->table . " WHERE ";
        $i = 0;
        foreach ($conditions as $condition) {
            if ($i > 0) {
                $sql .= " AND ";
            }
            if ($this->fields[$condition["field"]] === "string") {
                $sql .= $condition["field"] . ' ' . $condition["condition"] . ' "' . $condition["value"] . '"';
            } else {
                $sql .= $condition["field"] . ' ' . $condition["condition"] . ' ' . $condition["value"];
            }
            $i++;
        }

        if ($stmt = mysqli_prepare($this->databaseLink, $sql)) {
            return mysqli_stmt_execute($stmt);
        }
    }

    /**
     * @param int $id
     * obtem os valores da tabela pela chave primária
     * @return Base
     */
    public function getById(int $id): Base
    {
        /**
         * @var $newObject Base
         */
        $newObject = new $this->baseClass();
        $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->primaryKey . " = " . $id;
        if ($result = mysqli_query($this->databaseLink, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $newObject->setData($row);
                    break;
                }
            }
        }
        return $newObject;
    }

    /**
     * @param array $conditions
     * @param array $fields
     * @param $returnArray bool
     * função que retorna um array ou objeto dos itens do banco de dados
     * @return array
     */
    public function getList(array $conditions, array $fields, bool $returnArray = false): array
    {
        $sql = "SELECT " . $this->getFields($fields) . " FROM " . $this->table;
        $i = 0;
        if (count($conditions) > 0) {
            $sql .= " WHERE ";
            foreach ($conditions as $condition) {
                if ($i > 0) {
                    $sql .= " AND ";
                }
                if ($this->fields[$condition["field"]] === "string") {
                    $sql .= $condition["field"] . ' ' . $condition["condition"] . ' "' . $condition["value"] . '"';
                } else {
                    $sql .= $condition["field"] . ' ' . $condition["condition"] . ' ' . $condition["value"];
                }
                $i++;
            }
        }

        $items = [];
        if ($result = mysqli_query($this->databaseLink, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (!$returnArray) {
                        /**
                         * @var $newObject Base
                         */
                        $newObject = new $this->baseClass();
                        $newObject->setData($row);
                        $items[] = $newObject;
                    } else {
                        $items[] = $row;
                    }
                }
            }
        }

        return $items;
    }

    /**
     * @param array $values
     * @param int $operationType
     * função que valida cada um dos atributos obrigatórios perante seu tipo de operação
     * @return bool
     */
    protected function validateRequiredFields(array $values, int $operationType): bool
    {
        if ($operationType === self::OPERATION_TYPE_INSERT) {
            foreach ($this->requiredFields as $requiredField) {
                if (!isset($values[$requiredField])) {
                    die($requiredField);
                    return false;
                }
            }
            return true;
        } else {
            foreach ($values as $key => $value) {
                if ($value != null && (string)$value === "") {
                    die($value);
                    return false;
                }
            }
            return true;
        }
    }

    /**
     * @param array $fields
     * função que obtem os valores dos campos
     * @return string
     */
    protected function getFields(array $fields): string
    {
        $finalString = "";
        foreach ($fields as $field) {
            if ($finalString === "") {
                $finalString = $field;
            } else {
                $finalString .= ", " . $field;
            }
        }
        return $finalString;
    }

    /**
     * @param array $values
     * função que retorna a string final dos valores para a inserção em uma tabela no banco de dados
     * @return string
     */
    protected function bindValues(array $values): string
    {
        $finalSql = "";
        foreach ($values as $key => $value) {
            if ($this->fields[$key] === "string") {
                if ($finalSql === "") {
                    $finalSql = '"' . $value . '"';
                } else {
                    $finalSql .= ', "' . $value . '"';
                }
            } else {
                if ($finalSql === "") {
                    $finalSql = $value;
                } else {
                    $finalSql .= ', ' . $value;
                }
            }
        }
        return $finalSql;
    }
}
