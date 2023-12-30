<?php

namespace Fulll\Infra;

use PDO;

/**
 * MySQLConnection represents a connection to a MySQL database.
 */
class MySQLConnection
{
    private static ?PDO $instance = null;

    private function __construct()
    {
    }

    /**
     * Gets the instance of the MySQL connection.
     *
     * @return PDO The instance of the MySQL connection.
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $dsn = 'mysql:host=mysql;dbname=fleet_management';
            $username = 'user';
            $password = 'password';

            self::$instance = new PDO($dsn, $username, $password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}
