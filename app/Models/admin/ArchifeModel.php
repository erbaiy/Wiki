<?php

namespace App\Models\admin;

use App\Models\Database;
use PDO;

class  ArchifeModel
{

    public function selectArchifier()
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT * from wiki');
        $query->execute();
        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);


        return $fetch;
    }
    public function archifier($id)
    {
        $db = Database::connect();
        $query = $db->prepare('UPDATE wiki set date_delete="2024-01-01" where wiki_id=?');
        $query->execute([$id]);
        return true;
    }
}
