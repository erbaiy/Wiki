<?php

namespace App\Models;

use PDO;

class DataBase
{
    public static $db;
    public static  function connection()
    {
        self::$db = new PDO('mysql:host=localhsot;user=root;dbname=brief');
        return self::$db;
    }
    public static function close()
    {
        self::$db = null;
    }
}
