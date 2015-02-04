<?php

class DB
{

    /**
     * @param string $query
     * @return PDOStatement
     */
    public static function query($query)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=phpunit_db', 'phpunit_user', 'phpunit_password');

            $result = $pdo->query($query);

            return $result;

        } catch (PDOException $e) {
            // Do nothing
        }

    }

}