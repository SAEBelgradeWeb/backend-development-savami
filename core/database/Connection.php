<?php

namespace App\Core\Database;

class Connection
{
    public static function connect($db_config)
    {
        try {
            return new \PDO(
                "{$db_config['db_engine']}:host={$db_config['host']};dbname={$db_config['database_name']}",
                $db_config['user'],
                $db_config['password'],
                $db_config['options']);
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }
}