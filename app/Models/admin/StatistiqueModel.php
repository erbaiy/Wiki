<?php

namespace App\Models\admin;

use App\Models\Database;
use PDO;

class StatistiqueModel
{
    public static function  countWiki()
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT COUNT(*) FROM `wiki`');
        $query->execute();
        $result =  $query->fetchColumn();
        return $result;
    }
    public static function  countTag()
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT COUNT(*) FROM `tag`');
        $query->execute();
        $result =  $query->fetchColumn();
        return $result;
    }
    public static function  countCategory()
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT COUNT(*) FROM category');
        $query->execute();
        $result =  $query->fetchColumn();

        return $result;
    }
    public static function  countwikiArchifier()
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT COUNT(*) FROM wiki where date_delete is not null');
        $query->execute();
        $result =  $query->fetchColumn();

        return $result;
    }
    public static function  countwikiNonArchifier()
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT COUNT(*) FROM wiki where date_delete is  null');
        $query->execute();
        $result =  $query->fetchColumn();

        return $result;
    }
}
