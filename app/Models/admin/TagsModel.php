<?php

namespace App\Models\admin;

use App\Models\Database;
use PDO;

class TagsModel
{
    public function getTags()
    {
        $db = Database::connect();
        $query = $db->prepare("SELECT * FROM tag");
        $query->execute();

        $db = null;
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteTags($id)
    {
        $db = Database::connect();
        $query = $db->prepare(" DELETE FROM tag  WHERE tag_id=? ");

        return   $query->execute([$id]);

        $db = null;
    }
    public function updateTags($tag, $id)
    {
        $db = Database::connect();
        $query = $db->prepare("UPDATE tag  set tag_name=?  tag_id =? ");

        return   $query->execute([$tag, $id]);

        $db = null;
    }
}
