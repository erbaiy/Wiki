<?php

namespace App\Models\admin;

use App\Models\Database;
use PDO;

class CategoryModel
{
    public function selectData()
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM category');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        Database::close();
        return $result;
    }
    public function  addCategory($category)
    {
        $db = Database::connect();
        $query = $db->prepare('INSERT INTO category(name) values(?)');
        return $query->execute([$category]);
    }
    public function  deleteCategory($id)
    {
        $db = Database::connect();
        $query = $db->prepare('DELETE FROM  category WHERE category_id=? ');
        return $query->execute([$id]);
    }
    public function  selectCategoryName($id)
    {
        $db = Database::connect();
        $query = $db->prepare('SELECT * FROM  category WHERE category_id=? ');
        $query->execute([$id]);
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}
