<?php

class Db
{
    static function getConnection()
    {
        $dbp = include "config/db_param.php";
        try {
            $dsn="mysql:host={$dbp['host']};dbname={$dbp['dbname']}";
            $db = new PDO($dsn, $dbp['user'],$dbp['pass']);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $db;
    }
}