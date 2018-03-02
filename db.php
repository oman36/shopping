<?php

class DB extends \PDO
{
    /**
     * @param string $table
     * @param array $data
     * @return int
     */
    public function insert(string $table, array $data): int
    {
        $sql = "INSERT INTO `{$table}` (" .
            implode(",", array_keys($data)) .
            ") VALUES ('" .
            implode("','", array_values($data)) . "')";

        $res = $this->exec($sql);

        if ($this->errorCode() != 0) {
            var_dump($this->errorInfo());
        }

        return $res;
    }

    /**
     * @param string $table
     * @param array $data
     * @return int
     */
    public function update(string $table, array $data, array $where): int
    {
        $sql = "UPDATE `{$table}` SET ";

        foreach ($data as $field => $value) {
            $sql .= " `{$field}` = '{$value}'";
        }

        $sql .= ' WHERE 1 ';

        foreach ($where as $field => $value) {
            $sql .= " AND `{$field}` = '{$value}'";
        }


        $res = $this->exec($sql);

        if ($this->errorCode() != 0) {
            var_dump($this->errorInfo());
        }

        return $res;
    }

    /**
     * @param string $query
     * @return array
     */
    public function selectAll(string $query): array
    {
        return $this->query($query)->fetchAll(self::FETCH_ASSOC);
    }    /**
     * @param string $query
     * @return array
     */
    public function selectOne(string $query): array
    {
        return $this->query($query)->fetch(self::FETCH_ASSOC);
    }
}