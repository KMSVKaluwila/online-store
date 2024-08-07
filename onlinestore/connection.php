<?php

class Database
{

    public static $connection;

    public static function setuConnection()
    {

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "983422349Vseaways!", "online_db", "3306");
        }
    }

    public static function iud($q)
    {

        Database::setuConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {

        Database::setuConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
