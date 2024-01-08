<?php

namespace App\Models;

use App\Models\DataBase;
use PDO;
use Symfony\Component\VarDumper\Cloner\Data;

class Autontification
{

    public function register($user_name, $email, $password)
    {

        $db = DataBase::connect();
        $query = $db->prepare('INSERT INTO users(username,email,password,role) values(?,?,?,"author")');
        $query->execute([$user_name, $email, $password]);
        Database::close();
        return $query;
    }



    public static function login($user_name, $password)
    {
        $db = DataBase::connect();
        $query = $db->prepare("SELECT * FROM users WHERE username = ?");
        $query->execute([$user_name]);

        $user = $query->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct
            return $user;
        } else {
            // Invalid username or password
            return false;
        }

        DataBase::close();
    }
}
