<?php


class DataBase
{
    private static $hostName = "localhost";
    private static $dbName = "phpoopproject";
    private static $userName = "root";
    private static $password = "";

    public static function getConnection()
    {
        try {
            $connection = new PDO(
                "mysql:host=" . self::$hostName . ";dbname=" . self::$dbName,
                self::$userName, self::$password
            );
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }
}