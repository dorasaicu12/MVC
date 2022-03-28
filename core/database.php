<?php

class Database
{
    private $__conn;
    //Kết nối database
    function __construct()
    {
        global $db_config;
        $this->__conn = Connection::getInstance($db_config);
    }

    public function pdo_query($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        $statement = $this->__conn->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
        return $statement->fetchAll($fetchStyle);
    }
    public function pdo_query_one($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        $statement = $this->pdo_query($sql, $data, $fetchStyle);
        if ($statement != NULL)
            return $statement[0];
    }
    public function pdo_query_value($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        $statement = $this->pdo_query_one($sql, $data, $fetchStyle);
        if ($statement != NULL) {
            $statemen = array_values($statement);
            return $statemen[0];
        }
    }
    public function insert($table, $data)
    {
        $keys = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table($keys) VALUES($values)";
        $statement = $this->__conn->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }
    public function update($table, $data, $cond)
    {
        $updateKeys = NULL;
        foreach ($data as $key => $value) {
            $updateKeys .= "$key=:$key,";
        }
        $updateKeys = rtrim($updateKeys, ",");
        $sql = "UPDATE $table SET $updateKeys WHERE $cond";
        $statement = $this->__conn->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }
    public function delete($table, $cond, $limit = 1)
    {
        $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
        return $this->__conn->exec($sql);
    }
    public function affectedRows($sql, $username, $password)
    {
        $statement = $this->__conn->prepare($sql);
        $statement->execute(array($username, $password));
        return $statement->rowCount();
    }
    public function selectUser($sql, $username, $password)
    {
        $statement = $this->__conn->prepare($sql);
        $statement->execute(array($username, $password));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function lastInsertId()
    {
        return $this->__conn->lastInsertId();
    }
    function pdo_execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = $this->__conn->prepare($sql);
            $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }
}