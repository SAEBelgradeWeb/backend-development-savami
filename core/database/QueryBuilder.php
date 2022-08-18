<?php

namespace App\Core\Database;

class QueryBuilder
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function update($query, $filters)
    {
        $query = $this->pdo->prepare($query);
        $query->execute($filters);
    }

    public function sql($query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function count($table)
    {
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM {$table}");
        $statement->execute();

        return $statement->fetchColumn();
    }

    public function select($table, $filters)
    {
        $preparedFilters = array_map(function ($filter) {
            return $filter . "=:" . $filter;
        }, array_keys($filters));

        $sql = sprintf(
            'SELECT * FROM %s WHERE %s',
            $table,
            implode(', ', $preparedFilters)
        );

        $query = $this->pdo->prepare($sql);
        $query->execute($filters);

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    public function selectJoin($query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    public function selectEmails()
    {
        $statement = $this->pdo->prepare("SELECT users.email FROM users");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function insert($table, $parameters)
    {
        $query = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function insertListing($data)
    {
        $sql = "INSERT INTO listings (user_id, title, description) VALUES (?, ?, ?)";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($data);
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }
}