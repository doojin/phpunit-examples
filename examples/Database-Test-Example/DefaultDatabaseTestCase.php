<?php

abstract class DefaultDatabaseTestCase extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    final protected function getConnection()
    {
        $pdo = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PWD']);
        return $this->createDefaultDBConnection($pdo, 'mysql');
    }
}