<?php

namespace App\Models;


// use PDO;

// class DataBase
// {
//     public static $db;
//     public static  function connection()
//     {
//         self::$db = new PDO('mysql:host=localhsot;user=root;dbname=brief');
//         return self::$db;
//     }
//     public static function close()
//     {
//         self::$db = null;
//     }
// }
namespace App\Models;

class Database
{
    public static $db;

    public static function connect()
    {
        try {
            self::$db = new \PDO("mysql:host={$_ENV['HOST']};user={$_ENV['USER']};dbname={$_ENV['DB_NAME']}");
            return self::$db;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function close()
    {
        self::$db = NULL;
    }
}
