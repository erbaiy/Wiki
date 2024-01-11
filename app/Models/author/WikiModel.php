<?php

namespace App\Models\author;

use App\Models\Database;
use PDO;

class WikiModel
{
    public function selectWiki()
    {
        $db =  Database::connect();
        $query = $db->prepare('SELECT * FROM wiki ');
        // $query = $db->prepare('SELECT * FROM wiki inner JOIN category on wiki.author_id=category.category_id INNER JOIN users on users.user_id=wiki.author_id INNER JOIN wiki_tag on wiki_tag.wiki_id=wiki.wiki_id INNER JOIN tag on tag.tag_id=wiki_tag.tag_id');
        // $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function selectTags()
    {
        $db =  Database::connect();
        $query = $db->prepare('SELECT * FROM tag');
        $query->execute();
        $tags = $query->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }
    public function selectCategory()
    {
        $db =  Database::connect();
        $query = $db->prepare('SELECT * FROM category');
        $query->execute();
        $category = $query->fetchAll(PDO::FETCH_ASSOC);
        return $category;
    }
    public function addWiki($wiki_title, $wiki_content, $date_create, $author_id, $category_id)
    {

        $db = Database::connect();
        $query = $db->prepare("INSERT INTO `wiki` (`wiki_title`, `wiki_content`, `date_create`, `author_id`, `category_id`) VALUES (?, ?, ?, ?, ?)");
        $result = $query->execute([$wiki_title, $wiki_content, $date_create, $author_id, $category_id]);
        $db = null;
        return $result;
    }
}
